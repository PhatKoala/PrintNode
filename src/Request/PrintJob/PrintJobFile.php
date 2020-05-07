<?php

namespace PhatKoala\PrintNode\Request\PrintJob;

use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * Class PrintJobFile
 * @author Stewart Walter <code@phatkoala.uk>
 */
class PrintJobFile extends AbstractPrintJob implements PrintJobInterface
{
    /**
     * @var string
     */
    protected $type = 'pdf_base64';

    /**
     * @param string $file
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function send(string $file): ResponseInterface
    {
        if (!file_exists($file)) {
            throw new \Exception(
                sprintf('File "%s" could not be found.', $file)
            );
        }

        $response = $this->request->request('POST', sprintf($this->url, 'printjobs'), [
            'body' => json_encode(
                array_merge([
                    'contentType' => $this->type,
                    'content' => base64_encode(file_get_contents($file)),
                ], $this->buildRequest())
            )
        ]);

        return $response;
    }
}
