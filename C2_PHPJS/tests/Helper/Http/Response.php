<?php

namespace WorldSkills\Trade17\Tests\Helper\Http;

class Response
{
    private $statusCode;
    private $headers;
    private $body;

    public function __construct($statusCode, $headers, $body)
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     * Get the response code
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Get all response headers
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Get a single response header
     */
    public function getHeader(string $key)
    {
        return $this->headers[$key];
    }

    /**
     * Get the whole body as a string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Parse the body and return it as a json array
     */
    public function getJson()
    {
        return json_decode($this->getBody(), true);
    }
}
