<?php

namespace Bigstylee\PrintNode\Request;

use Bigstylee\PrintNode\Response\PrinterResponse;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class ComputerPrinterRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class ComputerPrinterRequest extends AbstractRequest
{
    /**
     * @param int $computer
     * @param int $printer
     * @return PrinterResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getResponse(int $computer, int $printer)
    {
        $response = $this->request->request('GET', sprintf($this->url, sprintf('computers/%d/printers/%d', $computer, $printer)));

        return new PrinterResponse(
            $response->toArray()[0], $response->getHeaders()
        );
    }
}
