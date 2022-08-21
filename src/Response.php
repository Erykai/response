<?php

namespace Erykai\Response;

/**
 * return data in json, array and object
 */
class Response extends Resource
{
    /**
     * @param object $data
     * @return $this
     */
    public function data(object $data): static
    {
        $data = array_filter((array) $data);
        $data = (object) $data;
        $this->setResponse($data);
        return $this;
    }
    /**
     * @return string
     */
    public function json(): string
    {
        header('Content-Type: application/json; charset=utf-8');
        return json_encode($this->getResponse());
    }
    /**
     * @return array
     */
    public function array(): array
    {
        return json_decode(json_encode($this->getResponse()));
    }

    /**
     * @return object
     */
    public function object(): object
    {
        return $this->getResponse();
    }
}