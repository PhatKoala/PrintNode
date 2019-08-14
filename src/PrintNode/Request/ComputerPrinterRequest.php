<?php

namespace Bigstylee\PrintNode\Request;

use Bigstylee\PrintNode\Response\PrinterResponse;

/**
 * Class ComputerPrinterRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class ComputerPrinterRequest extends AbstractRequest
{
    /**
     * @param integer $computer
     * @param integer $printer
     * @return PrinterResponse
     */
    public function getResponse(int $computer, int $printer)
    {
        $response = $this->request->request('GET', sprintf($this->url, sprintf('computers/%d/printers/%d', $computer, $printer)));

        return new PrinterResponse(
            $response->toArray()[0], $response->getHeaders()
        );
    }
}
