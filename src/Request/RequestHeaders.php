<?php
declare(strict_types=1);

namespace PhatKoala\PrintNode\Request;

use Iterator;

/**
 * Class PrintersRequest
 * @author Stewart Walter <code@phatkoala.uk>
 */
class RequestHeaders implements RequestHeadersInterface, Iterator
{
    /**
     * @var array
     */
    private $headers = [
        'Content-Type' => 'application/json'
    ];

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param $name
     * @param $value
     * @return self
     */
    public function addHeader($name, $value): self
    {
        $this->headers[$name] = $value;

        return $this;
    }

    /**
     * @param $name
     * @return self
     */
    public function removeHeader($name): self
    {
        if (isset($this->headers[$name])) {
            unset($this->headers[$name]);
        }

        return $this;
    }

    public function offsetExists($offset)
    {
        return isset($this->headers[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->headers[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->headers[$offset]) ? $this->headers[$offset] : null;
    }

    public function rewind()
    {
        reset($this->headers);
    }

    public function current()
    {
        return current($this->headers);
    }

    public function key()
    {
        return key($this->headers);
    }

    public function next()
    {
        return next($this->headers);
    }

    public function valid()
    {
        $key = key($this->headers);
        return ($key !== null && $key !== false);
    }
}
