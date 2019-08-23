<?php

namespace Bigstylee\PrintNode\Response;

/**
 * Class PrintersResponse
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class PrintersResponse extends AbstractResponse implements \ArrayAccess, \Iterator
{
    /**
     * @var array
     */
    private $printers = [ ];

    /**
     * PrintersResponse constructor.
     * @param iterable $response
     * @param iterable|null $headers
     */
    public function __construct(iterable $response, iterable $headers = null)
    {
        if (is_iterable($headers)) {
            $this->headers = new ResponseHeaders($headers);
        }

        foreach ($response as $printer) {
            $this->printers[] = new PrinterResponse($printer);
        }
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->printers[] = $value;
        } else {
            $this->printers[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->printers[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->printers[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->printers[$offset]) ? $this->printers[$offset] : null;
    }

    public function rewind()
    {
        reset($this->printers);
    }

    public function current()
    {
        return current($this->printers);
    }

    public function key()
    {
        return key($this->printers);
    }

    public function next()
    {
        return next($this->printers);
    }

    public function valid()
    {
        $key = key($this->printers);
        return ($key !== null && $key !== false);
    }
}