<?php

namespace App\Models;

use RuntimeException;

class Whois
{

    const REGEX_ABUSE_MAIL = '/abuse-mailbox:[\s]*([^\s]*)/im';

    private string $data;

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getAbuseMail(): string
    {
        preg_match(self::REGEX_ABUSE_MAIL, $this->getData(), $matches);

        if (!isset($matches[1])) {
            throw new RuntimeException('can not find abuse mail in whois information');
        }

        return trim($matches[1]);
    }
}
