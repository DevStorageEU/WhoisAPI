<?php

namespace Devstorage\Validator;

class IpAddressValidator
{
    public function isValid(string $ip): bool
    {
        if ($this->isIpV4($ip) || $this->isIpV6($ip)) {
            return true;
        }

        return false;
    }

    public function isIpV4(string $ip): bool
    {
        return preg_match(Regex::IPv4, $ip);
    }

    public function isIpV6(string $ip): bool
    {
        return preg_match(Regex::IPv6, $ip);
    }
}