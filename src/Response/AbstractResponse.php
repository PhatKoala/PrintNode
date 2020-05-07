<?php

namespace PhatKoala\PrintNode\Response;

/**
 * Class AbstractResponse
 * @author Stewart Walter <code@phatkoala.uk>
 */
abstract class AbstractResponse
{
    /**
     * @var null|ResponseHeaders
     */
    protected $headers;

    /**
     * AbstractResponse constructor.
     * @param array $response
     * @param array|null $headers
     */
    public function __construct(iterable $response, iterable $headers = null)
    {
        if (is_iterable($headers)) {
            $this->headers = new ResponseHeaders($headers);
        }

        $this->setFromArray($response);
    }

    /**
     * @param iterable $response
     */
    protected function setFromArray(iterable $response)
    {
        foreach ($response as $name => $value) {
            $method = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $name)));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return null|ResponseHeaders
     */
    public function getHeaders(): ?ResponseHeaders
    {
        return $this->headers;
    }
}
