<?php

namespace App\Models;

class Ip
{
    const REGEX_IPv4 = '/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/';
    const REGEX_IPv6 = '/^(([0-9a-fA-F]{1,4}:){7,7}[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,7}:|([0-9a-fA-F]{1,4}:){1,6}:[0-9a-fA-F]{1,4}|([0-9a-fA-F]{1,4}:){1,5}(:[0-9a-fA-F]{1,4}){1,2}|([0-9a-fA-F]{1,4}:){1,4}(:[0-9a-fA-F]{1,4}){1,3}|([0-9a-fA-F]{1,4}:){1,3}(:[0-9a-fA-F]{1,4}){1,4}|([0-9a-fA-F]{1,4}:){1,2}(:[0-9a-fA-F]{1,4}){1,5}|[0-9a-fA-F]{1,4}:((:[0-9a-fA-F]{1,4}){1,6})|:((:[0-9a-fA-F]{1,4}){1,7}|:))$/';
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
        return preg_match(self::REGEX_IPv4, $this->getName());
    }

    public function isV6(): bool
    {
        return preg_match(self::REGEX_IPv6, $this->getName());
    }

    public function isValid(): bool
    {
        return ($this->isV4() || $this->isV6());
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
