<?php

namespace Bigstylee\PrintNode\Response;

/**
 * Class DeleteConfirmationResponse
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class DeleteConfirmationResponse extends AbstractResponse
{
    /**
     * @var array
     */
    private $confirmed = [ ];

    /**
     * DeleteConfirmationResponse constructor.
     * @param array $response
     * @param array|null $headers
     */
    public function __construct(iterable $response, iterable $headers = null)
    {
        if (is_iterable($headers)) {
            $this->headers = new ResponseHeaders($headers);
        }

        $this->confirmed = $response;
    }

    /**
     * @return array
     */
    public function getConfirmed(): array
    {
        return $this->confirmed;
    }

    /**
     * @param array $confirmed
     * @return DeleteConfirmationResponse
     */
    protected function setConfirmed(array $confirmed)
    {
        $this->confirmed = $confirmed;

        return $this;
    }
}
