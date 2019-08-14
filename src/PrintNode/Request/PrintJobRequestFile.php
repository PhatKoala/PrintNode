<?php

namespace Bigstylee\PrintNode\Request;

/**
 * Class PrintJobRequestFile
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class PrintJobRequestFile extends AbstractPrintJobRequest
{
    public function send($file)
    {
        return $this->request->request('POST', sprintf($this->url, 'printjobs'), [
            'body' => json_encode([
                'printer' => $this->getPrinter(),
                'title' => $this->getTitle(),
                'contentType' => 'pdf_base64',
                'content' => base64_encode(file_get_contents($file)),
                'source' => $this->getSource(),
//                'options' => $this->getOptions(),
            ])
        ]);
    }
}
