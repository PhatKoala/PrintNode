<?php

namespace PhatKoala\PrintNode\Request\PrintJob;

use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Class PrintJobUrl
 * @author Stewart Walter <code@phatkoala.uk>
 */
class PrintJobUrl extends AbstractPrintJob implements PrintJobInterface
{
    /**
     * @var string
     */
    protected $type = 'pdf_uri';

    /**
     * @param string $url
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function send(string $url): ResponseInterface
    {
        $response = $this->request->request('POST', sprintf($this->url, 'printjobs'), [
            'body' => json_encode(
                array_merge([
                    'contentType' => $this->type,
                    'content' => $url,
                ], $this->buildRequest())
            )
        ]);

        return $response;
    }
}
