<?php

namespace Bigstylee\PrintNode\Request;

use Bigstylee\PrintNode\Response\ComputerResponse;

/**
 * Class ComputerRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class ComputerRequest extends AbstractRequest
{
    /**
     * @param integer $computer
     * @return ComputerResponse
     */
    public function getResponse(int $computer)
    {
        $response = $this->request->request('GET', sprintf($this->url, sprintf('computers/%d', $computer)));

        return new ComputerResponse(
            $response->toArray(), $response->getHeaders()
        );
    }
}
