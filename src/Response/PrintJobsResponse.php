<?php

namespace PhatKoala\PrintNode\Response;

/**
 * Class PrintJobsResponse
 * @author Stewart Walter <code@phatkoala.uk>
 */
class PrintJobsResponse extends AbstractResponse implements \ArrayAccess, \Iterator
{
    /**
     * @var array
     */
    private $printJobs = [ ];

    /**
     * PrintJobsResponse constructor.
     * @param iterable $response
     * @param iterable|null $headers
     */
    public function __construct(iterable $response, ?iterable $headers = null)
    {
        if (is_iterable($headers)) {
            $this->headers = new ResponseHeaders($headers);
        }

        foreach ($response as $printJob) {
            $this->printJobs[] = new PrintJobResponse($printJob);
        }
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->printJobs[] = $value;
        } else {
            $this->printJobs[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->printJobs[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->printJobs[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->printJobs[$offset]) ? $this->printJobs[$offset] : null;
    }

    public function rewind()
    {
        reset($this->printJobs);
    }

    public function current()
    {
        return current($this->printJobs);
    }

    public function key()
    {
        return key($this->printJobs);
    }

    public function next()
    {
        return next($this->printJobs);
    }

    public function valid()
    {
        $key = key($this->printJobs);
        return ($key !== null && $key !== false);
    }
}
