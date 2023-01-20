<?php

namespace Devstorage\Model;

use Devstorage\Validator\Regex;

class IpAddress
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isV4(): bool
    {
        return preg_match(Regex::IPv4, $this->getName());
    }

    public function isV6(): bool
    {
        return preg_match(Regex::IPv6, $this->getName());
    }

    public function getReverse(): string
    {
        if ($this->isV4()) {
            $ipAddress = explode('.', $this->getName());
            return $ipAddress[3] . '.' . $ipAddress[2] . '.' . $ipAddress[1] . '.' . $ipAddress[0];
        }

        $address = inet_pton($this->getName());
        $unpackedAddress = unpack('H*hex', $address);
        $addressHex = $unpackedAddress['hex'];

        return implode('.', array_reverse(str_split($addressHex)));
    }
}