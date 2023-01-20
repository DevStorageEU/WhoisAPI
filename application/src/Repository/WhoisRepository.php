<?php

namespace Devstorage\Repository;

use Devstorage\Exception\ParserException;
use Devstorage\Model\IpAddress;
use Devstorage\Model\Whois;
use Devstorage\Parser\AbuseMailParser;
use RuntimeException;

class WhoisRepository
{
    /**
     * @throws ParserException
     */
    public function getInformation(IpAddress $ipAddress): Whois
    {
        $serverToRequest = $this->getServer($ipAddress);
        $whoisRaw = $this->getInformationByServer($ipAddress, $serverToRequest);

        $abuseMailParser = new AbuseMailParser();
        $abuseMail = $abuseMailParser->parse($whoisRaw);

        $whois = new Whois();
        $whois->setIp($ipAddress->getName());
        $whois->setAbuseMail($abuseMail);

        return $whois;
    }

    private function getServer(IpAddress $ipAddress): string
    {
        $dnsEntries = $this->getDnsRecord($ipAddress, DNS_TXT);
        $explodedDnsEntries = explode('|', $dnsEntries[0]['txt']);
        $registrar = trim($explodedDnsEntries[3]);

        return match ($registrar) {
            "ripencc" => "whois.ripe.net",
            "apnic" => "whois.apnic.net",
            "arin" => "whois.arin.net",
            "lacnic" => "whois.lacnic.net",
            "afrinic" => "whois.afrinic.net",
            default => throw new RuntimeException('can not get a whois server for ip ' . $ipAddress->getName()),
        };
    }

    private function getDnsRecord(IpAddress $ipAddress, int $type): array
    {
        if ($ipAddress->isV4()) {
            return dns_get_record($ipAddress->getReverse() . '.origin.asn.cymru.com', $type);
        }

        return dns_get_record($ipAddress->getReverse() . '.origin6.asn.cymru.com', $type);
    }

    private function getInformationByServer(IpAddress $ipAddress, string $serverToRequest): string
    {
        $request = fsockopen($serverToRequest, 43, $errorCode, $errorMessage, 10);

        if (!$request) {
            throw new RuntimeException('can not request server ' . $serverToRequest);
        }

        fputs($request, $ipAddress->getName() . "\r\n");
        $response = '';

        while (!feof($request)) {
            $response .= fgets($request, 128);
        }

        fclose($request);

        return trim($response);
    }
}