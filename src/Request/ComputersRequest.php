<?php

declare(strict_types=1);

namespace PhatKoala\PrintNode\Request;

use PhatKoala\PrintNode\Response\ComputersResponse;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class ComputersRequest
 * @author Stewart Walter <code@phatkoala.uk>
 */
class ComputersRequest extends AbstractRequest
{
    /**
     * @return ComputersResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getResponse()
    {
        $response = $this->request->request('GET', sprintf($this->url, 'computers'));

        return new ComputersResponse(
            $response->toArray(),
            $response->getHeaders()
        );
    }
}
