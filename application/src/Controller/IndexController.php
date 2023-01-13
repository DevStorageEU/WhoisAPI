<?php

namespace Devstorage\Controller;

use Devstorage\Attribute\Route;

class IndexController
{
    #[Route('/v1/{ip}', name: 'v1', methods: ['GET'])]
    public function get(string $ip)
    {
        echo $ip;
    }
}