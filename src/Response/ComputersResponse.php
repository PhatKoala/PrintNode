<?php

namespace PhatKoala\PrintNode\Response;

/**
 * Class ComputersResponse
 * @author Stewart Walter <code@phatkoala.uk>
 */
class ComputersResponse extends AbstractResponse implements \ArrayAccess, \Iterator
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
    public function __construct(iterable $response, ?iterable $headers = null)
    {
        if (is_iterable($headers)) {
            $this->headers = new ResponseHeaders($headers);
        }

        foreach ($response as $computer) {
            $this->computers[] = new ComputerResponse($computer);
        }
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->computers[] = $value;
        } else {
            $this->computers[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->computers[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->computers[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->computers[$offset]) ? $this->computers[$offset] : null;
    }

    public function rewind()
    {
        reset($this->computers);
    }

    public function current()
    {
        return current($this->computers);
    }

    public function key()
    {
        return key($this->computers);
    }

    public function next()
    {
        return next($this->computers);
    }

    public function valid()
    {
        $key = key($this->computers);
        return ($key !== null && $key !== false);
    }
}
