<?php

namespace Erykai\Response;

/**
 * resource class response
 */
abstract class Resource
{
    /**
     * @var object
     */
    protected object $response;
    /**
     * @return object
     */
    protected function getResponse(): object
    {
        return $this->response;
    }
    /**
     * @param object $response
     */
    protected function setResponse(object $response): void
    {
        $this->response = $response;
    }
}