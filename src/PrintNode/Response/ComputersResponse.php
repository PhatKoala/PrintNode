<?php

namespace Bigstylee\PrintNode\Response;

/**
 * Class ComputersResponse
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class ComputersResponse extends AbstractResponse
{
    /**
     * @var array
     */
    private $computers = [ ];

    /**
     * AbstractResponse constructor.
     * @param iterable $headers
     * @param iterable $response
     */
    public function __construct(iterable $response, iterable $headers = null)
    {
        if (is_iterable($headers)) {
            $this->headers = new ResponseHeaders($headers);
        }

        foreach ($response as $computer) {
            $this->computers[] = new ComputerResponse($computer);
        }
    }
}
