<?php

namespace Bigstylee\PrintNode\Request;

/**
 * Class PrintJobRequestUrl
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class PrintJobRequestUrl extends AbstractPrintJobRequest
{
    public function send($url)
    {
        $response = $this->request->request('POST', sprintf($this->url, 'printjobs'), [
            'body' => json_encode([
                'printer' => $this->getPrinter(),
                'title' => $this->getTitle(),
                'contentType' => 'pdf_uri',
                'content' => $url,
                'source' => $this->getSource(),
//                'options' => $this->getOptions(),
            ])
        ]);

        return $response;
    }
}
