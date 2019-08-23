<?php
declare(strict_types=1);

namespace Bigstylee\PrintNode\Request;

use Bigstylee\PrintNode\Response\WhoAmIResponse;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class WhoAmIRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class WhoAmIRequest extends AbstractRequest
{
    /**
     * @return WhoAmIResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getResponse()
    {
        $response = $this->request->request('GET', sprintf($this->url, 'whoami'));

        return new WhoAmIResponse(
            $response->toArray(), $response->getHeaders()
        );
    }
}
