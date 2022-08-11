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
        $this->setDynamic();
        if(!empty($data->dynamic)){
            $this->setDynamic($data->dynamic);
            unset($data->dynamic);
        }
        $this->setResponse($data);
        return $this;
    }

    /**
     * @param string|null $lang
     * @return $this
     */
    public function lang(?string $lang = null): static
    {
        $this->setLang($lang);
        $this->setResponse($this->translate($this->getResponse()));
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