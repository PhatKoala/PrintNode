<?php
declare(strict_types=1);

namespace PhatKoala\PrintNode\Request;

use Symfony\Component\HttpClient\CurlHttpClient;

/**
 * Class AbstractRequest
 * @author Stewart Walter <code@phatkoala.uk>
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
     *
     * @param string $auth
     * @param RequestHeadersInterface $headers
     */
    public function __construct(string $auth, RequestHeadersInterface $headers)
    {
        $this->request = new CurlHttpClient([
            'auth_basic' => $auth,
            'headers' => $headers->getHeaders(),
        ]);
    }
}
