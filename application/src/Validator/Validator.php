<?php

namespace Devstorage\Validator;

class Validator
{
    private static ?self $instance = null;

    public static function getInstance(): self
    {
        if (static::$instance === null) {
            static::$instance = new self();
        }

        return static::$instance;
    }

    private IpAddressValidator $ipAddressValidator;

    private function __construct()
    {
        $this->ipAddressValidator = new IpAddressValidator();
    }

    public function getIpAddressValidator(): IpAddressValidator
    {
        return $this->ipAddressValidator;
    }
}