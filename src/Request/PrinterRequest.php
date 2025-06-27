<?php

declare(strict_types=1);

namespace PhatKoala\PrintNode\Request;

use PhatKoala\PrintNode\Response\PrinterResponse;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class PrinterRequest
 * @author Stewart Walter <code@phatkoala.uk>
 */
class PrinterRequest extends AbstractRequest
{
    /**
     * @param integer $printer
     * @return PrinterResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getResponse(int $printer)
    {
        $response = $this->request->request('GET', sprintf($this->url, sprintf('printers/%d', $printer)));

        return new PrinterResponse(
            $response->toArray()[0],
            $response->getHeaders()
        );
    }
}
