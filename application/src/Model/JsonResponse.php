<?php

namespace Devstorage\Model;

use JsonSerializable;

class JsonResponse implements JsonSerializable
{
    private ?JsonSerializable $data = null;

    public function addResponseObject(JsonSerializable $object): void
    {
        $this->data = $object;
    }

    public function getData(): ?JsonSerializable
    {
        return $this->data;
    }

    public function jsonSerialize(): array
    {
        return [
            'information' => [
                'status' => 'ok',
                'message' => 'request is ok',
                'time' => time()
            ],
            'data' => $this->getData()
        ];
    }
}