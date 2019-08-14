<?php

namespace Bigstylee\PrintNode\Request;

use Bigstylee\PrintNode\Response\PrintersResponse;

/**
 * Class PrintersRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class PrintersRequest extends AbstractRequest
{
    /**
     * @return PrintersResponse
     */
    public function getResponse()
    {
        $response = $this->request->request('GET', sprintf($this->url, 'printers'));

        return new PrintersResponse(
            $response->toArray(), $response->getHeaders()
        );
    }
}
