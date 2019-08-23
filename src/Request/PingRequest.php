<?php

namespace Bigstylee\PrintNode\Request;

use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class PingRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class PingRequest
{
    /**
     * @var string
     */
    protected $url = 'https://api.printnode.com/%s';

    /**
     * @var CurlHttpClient
     */
    protected $request;

    /**
     * AbstractRequest constructor.
     * @param array $headers
     */
    public function __construct()
    {
        $this->request = new CurlHttpClient();
    }

    /**
     * @return bool
     * @throws TransportExceptionInterface
     */
    public function getResponse()
    {
        $response = $this->request->request('GET', sprintf($this->url, 'ping'));

        return (200 === $response->getStatusCode()) ? true : false;
    }
}
