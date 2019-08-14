<?php

namespace Bigstylee\PrintNode\Request;

use Bigstylee\PrintNode\Response\ComputersResponse;

/**
 * Class ComputersRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class ComputersRequest extends AbstractRequest
{
    /**
     * @return ComputersResponse
     */
    public function getResponse()
    {
        $response = $this->request->request('GET', sprintf($this->url, 'computers'));

//        echo "<pre>"; var_dump($response->getContent());
//        echo "<pre>"; var_dump($response->toArray());
//        die;

        return new ComputersResponse(
            $response->toArray(), $response->getHeaders()
        );
    }
}
