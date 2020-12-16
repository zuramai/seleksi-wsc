<?php

namespace WorldSkills\Trade17\Tests\Helper\Http;

class Client
{
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Perform a request
     */
    public function request(string $method, string $url, array $options = [])
    {
        $ch = curl_init();
        $responseHeaders = [];

        curl_setopt($ch, CURLOPT_URL, $this->config['base_url'].$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADERFUNCTION, function ($curl, $header) use (&$responseHeaders) {
                $len = strlen($header);
                $header = explode(':', $header, 2);
                // ignore invalid headers
                if (count($header) < 2) {
                    return $len;
                }

                $name = strtolower(trim($header[0]));
                if (!array_key_exists($name, $responseHeaders)) {
                    $responseHeaders[$name] = [];
                }

                $values = explode(';', trim($header[1]));
                foreach ($values as $value) {
                    $responseHeaders[$name][] = trim($value);
                }

                return $len;
            }
        );

        if ($this->config['basic_auth_user'] && $this->config['basic_auth_pw']) {
            curl_setopt($ch, CURLOPT_USERPWD, $this->config['basic_auth_user'].':'.$this->config['basic_auth_pw']);
        }

        $headers = array_merge([], $this->config['headers']);

        if (isset($options['json'])) {
            $json = json_encode($options['json']);
            $headers['Content-Type'] = 'application/json';
            $headers['Content-Length'] = strlen($json);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->convertHeaders($headers));

        $body = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $res = new Response($statusCode, $responseHeaders, $body);

        curl_close($ch);

        return $res;
    }

    /**
     * Perform a GET request
     */
    public function get(string $url, array $options = [])
    {
        return $this->request('GET', $url, $options);
    }

    /**
     * Perform a POST request
     */
    public function post(string $url, array $options = [])
    {
        return $this->request('POST', $url, $options);
    }

    /**
     * Perform a PUT request
     */
    public function put(string $url, array $options = [])
    {
        return $this->request('PUT', $url, $options);
    }

    /**
     * Convert a key => value array of headers to the curl format
     */
    private function convertHeaders(array $headers)
    {
        $curlHeaders = [];

        foreach ($headers as $key => $header) {
            $curlHeaders[] = $key.': '.$header;
        }

        return $curlHeaders;
    }
}
