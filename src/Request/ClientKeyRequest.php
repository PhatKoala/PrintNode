<?php
declare(strict_types=1);

namespace PhatKoala\PrintNode\Request;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class ClientKeyRequest
 * @author Stewart Walter <code@phatkoala.uk>
 */
class ClientKeyRequest extends AbstractRequest
{
    /**
     * @param string $uuid
     * @param string $edition
     * @param string $version
     * @return string
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getResponse(string $uuid, string $edition, string $version): string
    {
        $response = $this->request->request('GET', sprintf($this->url, sprintf('client/key/%s?edition=%s&version=%s', $uuid, $edition, $version)));

        return $response->getContent();
    }
}
