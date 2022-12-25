<?php

namespace App\Http\Controllers;

use App\Models\Ip;
use App\Models\Whois;
use App\Service\WhoisService;
use Illuminate\Http\JsonResponse;
use RuntimeException;

class WhoisController extends Controller
{
    private function getWhoisInformation(string $ipAddress): Whois
    {
        $ip = new Ip($ipAddress);

        if (!$ip->isValid()) {
            throw new RuntimeException('no valid ip address ' . $ip->getName());
        }

        $whoisService = new WhoisService($ip);
        return $whoisService->getInformation();
    }

    public function getWhois(string $ipAddress): JsonResponse
    {
        try {
            $whoisRaw = $this->getWhoisInformation($ipAddress);

            return response()->json([
                'information' => [
                    'status' => 200,
                    'message' => null,
                ],
                'data' => $whoisRaw->getData()
            ]);
        } catch (RuntimeException $exception) {
            return response()->json([
                'information' => [
                    'status' => 500,
                    'message' => $exception->getMessage(),
                ],
                'data' => null
            ], 500);
        }
    }

    public function getAbuseMail(string $ipAddress): JsonResponse
    {
        try {
            $whoisRaw = $this->getWhoisInformation($ipAddress);
            $abuseMail = $whoisRaw->getAbuseMail();

            return response()->json([
                'information' => [
                    'status' => 200,
                    'message' => null,
                ],
                'data' => [
                    'abuseMail' => $abuseMail
                ]
            ]);
        } catch (RuntimeException $exception) {
            return response()->json([
                'information' => [
                    'status' => 500,
                    'message' => $exception->getMessage(),
                ],
                'data' => null
            ], 500);
        }
    }

}
