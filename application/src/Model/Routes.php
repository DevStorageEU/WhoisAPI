<?php

namespace Devstorage\Model;

interface Routes
{
    const API_VERSION_PREFIX = '/v1/';
    const API_ABUSE_MAIL = self::API_VERSION_PREFIX . 'abuse-mail/{ip}';
}