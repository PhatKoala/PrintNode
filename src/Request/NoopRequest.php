<?php

declare(strict_types=1);

namespace PhatKoala\PrintNode\Request;

use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class NoopRequest
 * @author Stewart Walter <code@phatkoala.uk>
 */
class NoopRequest extends AbstractRequest
{
    /**
     * @return bool
     * @throws TransportExceptionInterface
     */
    public function getResponse()
    {
        $response = $this->request->request('GET', sprintf($this->url, 'noop'));

        return (200 === $response->getStatusCode()) ? true : false;
    }
}
