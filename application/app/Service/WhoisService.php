<?php

namespace App\Service;

use App\Models\Ip;
use App\Models\Whois;
use RuntimeException;

class WhoisService
{

    private Ip $ip;

    public function __construct(Ip $ip)
    {
        $this->ip = $ip;
    }

    public function getIp(): Ip
    {
        return $this->ip;
    }

    public function getInformation(): Whois
    {
        $serverToRequest = $this->getServer();
        $whoisRaw = $this->getInformationByServer($serverToRequest);

        return new Whois($whoisRaw);
    }

    private function getServer(): string
    {
        $dnsEntries = $this->getDnsRecord(DNS_TXT);
        $explodedDnsEntries = explode('|', $dnsEntries[0]['txt']);
        $registrar = trim($explodedDnsEntries[3]);

        return match ($registrar) {
            "ripencc" => "whois.ripe.net",
            "apnic" => "whois.apnic.net",
            "arin" => "whois.arin.net",
            "lacnic" => "whois.lacnic.net",
            "afrinic" => "whois.afrinic.net",
            default => throw new RuntimeException('can not get a whois server for ip ' . $this->getIp()->getName()),
        };
    }

    private function getDnsRecord(int $type): array
    {
        $ip = $this->getIp();

        if ($ip->isV4()) {
            return dns_get_record($ip->getReverse() . '.origin.asn.cymru.com', $type);
        }

        return dns_get_record($ip->getReverse() . '.origin6.asn.cymru.com', $type);
    }

    private function getInformationByServer(string $serverToRequest): string
    {
        $request = fsockopen($serverToRequest, 43, $errorCode, $errorMessage, 10);

        if (!$request) {
            throw new RuntimeException('can not request server ' . $serverToRequest);
        }

        fputs($request, $this->getIp()->getName() . "\r\n");
        $response = '';

        while (!feof($request)) {
            $response .= fgets($request, 128);
        }

        fclose($request);

        return trim($response);
    }
}
