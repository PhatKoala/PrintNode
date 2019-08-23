<?php

namespace Bigstylee\PrintNode\Request;

use Symfony\Component\HttpClient\CurlHttpClient;

/**
 * Class AbstractRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
abstract class AbstractRequest
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
     * @param $auth
     * @param array $headers
     */
    public function __construct($auth, iterable $headers = [])
    {
        $this->request = new CurlHttpClient([
            'auth_basic' => $auth,
            'headers' => $headers,
        ]);
    }

    /**
     * @return CurlHttpClient
     */
    public function getRequest(): CurlHttpClient
    {
        return $this->request;
    }
}
