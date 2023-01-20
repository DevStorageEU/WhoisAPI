<?php

namespace Devstorage\Controller;

use Devstorage\Attribute\Route;
use Devstorage\Exception\ParserException;
use Devstorage\Exception\ValidationException;
use Devstorage\Model\IpAddress;
use Devstorage\Model\JsonResponse;
use Devstorage\Repository\WhoisRepository;
use Devstorage\Validator\Validator;

class WhoisController
{
    /**
     * @throws ValidationException
     * @throws ParserException
     */
    #[Route('/v1/{ip}')]
    public function get(string $ip): void
    {
        $validator = Validator::getInstance();

        if (!$validator->getIpAddressValidator()->isValid($ip)) {
            throw new ValidationException('no valid ip: ' . $ip);
        }

        $ipAddress = new IpAddress($ip);

        $whoisRepository = new WhoisRepository();
        $whois = $whoisRepository->getInformation($ipAddress);

        $jsonResponse = new JsonResponse();
        $jsonResponse->addResponseObject($whois);

        header("Content-Type: application/json");
        echo json_encode($jsonResponse, JSON_PRETTY_PRINT);
    }
}