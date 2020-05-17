<?php

namespace Github\Api;

/**
 * A trait to make sure we add accept headers on all requests.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
trait AcceptHeaderTrait
{
    protected $acceptHeaderValue;

    public function get($path, array $parameters = [], array $requestHeaders = [])
    {
        return parent::get($path, $parameters, $this->mergeHeaders($requestHeaders));
    }

    public function head($path, array $parameters = [], array $requestHeaders = [])
    {
        return parent::head($path, $parameters, $this->mergeHeaders($requestHeaders));
    }

    public function post($path, array $parameters = [], array $requestHeaders = [])
    {
        return parent::post($path, $parameters, $this->mergeHeaders($requestHeaders));
    }

    public function postRaw($path, $body, array $requestHeaders = [])
    {
        return parent::postRaw($path, $body, $this->mergeHeaders($requestHeaders));
    }

    public function patch($path, array $parameters = [], array $requestHeaders = [])
    {
        return parent::patch($path, $parameters, $this->mergeHeaders($requestHeaders));
    }

    public function put($path, array $parameters = [], array $requestHeaders = [])
    {
        return parent::put($path, $parameters, $this->mergeHeaders($requestHeaders));
    }

    public function delete($path, array $parameters = [], array $requestHeaders = [])
    {
        return parent::delete($path, $parameters, $this->mergeHeaders($requestHeaders));
    }

    /**
     * Append a new accept header on all requests.
     *
     * @return array
     */
    private function mergeHeaders(array $headers = [])
    {
        $default = [];
        if ($this->acceptHeaderValue) {
            $default = ['Accept' => $this->acceptHeaderValue];
        }

        return array_merge($default, $headers);
    }
}
