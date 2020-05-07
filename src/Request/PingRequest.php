<?php
declare(strict_types=1);

namespace PhatKoala\PrintNode\Request;

use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class PingRequest
 * @author Stewart Walter <code@phatkoala.uk>
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
