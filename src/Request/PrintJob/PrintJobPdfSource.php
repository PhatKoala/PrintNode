<?php

namespace PhatKoala\PrintNode\Request\PrintJob;

use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class PrintJobPdfSource extends AbstractPrintJob implements PrintJobInterface
{
    /**
     * @var string
     */
    protected $type = 'pdf_base64';

    /**
     * @throws TransportExceptionInterface
     */
    public function send(string $pdfSource): ResponseInterface
    {
        $response = $this->request->request('POST', sprintf($this->url, 'printjobs'), [
            'body' => json_encode(
                array_merge([
                    'contentType' => $this->type,
                    'content' => base64_encode($pdfSource),
                ], $this->buildRequest())
            )
        ]);

        return $response;
    }
}
