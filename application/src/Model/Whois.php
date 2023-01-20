<?php

namespace Devstorage\Model;

use JsonSerializable;

class Whois implements JsonSerializable
{
    private ?string $ip = null;
    private ?string $abuseMail = null;

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): void
    {
        $this->ip = $ip;
    }

    public function getAbuseMail(): ?string
    {
        return $this->abuseMail;
    }

    public function setAbuseMail(?string $abuseMail): void
    {
        $this->abuseMail = $abuseMail;
    }

    public function jsonSerialize(): array
    {
        return [
            'ip' => $this->getIp(),
            'abuse-mail' => $this->getAbuseMail(),
        ];
    }
}