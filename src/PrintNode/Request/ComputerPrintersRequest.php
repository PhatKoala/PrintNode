<?php

namespace Bigstylee\PrintNode\Request;

use Bigstylee\PrintNode\Response\PrintersResponse;

/**
 * Class ComputerPrintersRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class ComputerPrintersRequest extends AbstractRequest
{
    /**
     * @param integer $computer
     * @return PrintersResponse
     */
    public function getResponse(int $computer)
    {
        $response = $this->request->request('GET', sprintf($this->url, sprintf('computers/%d/printers', $computer)));

        return new PrintersResponse(
            $response->toArray(), $response->getHeaders()
        );
    }
}
