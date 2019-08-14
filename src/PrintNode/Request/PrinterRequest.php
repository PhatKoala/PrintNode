<?php

namespace Bigstylee\PrintNode\Request;

use Bigstylee\PrintNode\Response\PrinterResponse;

/**
 * Class PrinterRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class PrinterRequest extends AbstractRequest
{
    /**
     * @param integer $printer
     * @return PrinterResponse
     */
    public function getResponse(int $printer)
    {
        $response = $this->request->request('GET', sprintf($this->url, sprintf('printers/%d', $printer)));

        return new PrinterResponse(
            $response->toArray()[0], $response->getHeaders()
        );
    }
}
