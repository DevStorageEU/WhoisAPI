<?php

namespace Devstorage\Parser;

use Devstorage\Exception\ParserException;

class AbuseMailParser
{

    const REGEX_ABUSE_MAIL = '/abuse-mailbox:[\s]*([^\s]*)/im';

    /**
     * @throws ParserException
     */
    public function parse(string $whoisRaw): string
    {
        preg_match(self::REGEX_ABUSE_MAIL, $whoisRaw, $matches);

        if (!isset($matches[1])) {
            throw new ParserException('can not parse abuse email from whois raw data.');
        }

        return trim($matches[1]);
    }

}