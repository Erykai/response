<?php

namespace Erykai\Response;

/**
 * resource class response
 */
class Resource
{
    /**
     * @var object
     */
    protected object $response;
    /**
     * @return object
     */
    public function getResponse(): object
    {
        return $this->response;
    }
    /**
     * @param object $response
     */
    public function setResponse(object $response): void
    {
        $this->response = $response;
    }
}