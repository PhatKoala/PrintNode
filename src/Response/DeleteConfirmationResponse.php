<?php

namespace PhatKoala\PrintNode\Response;

/**
 * Class DeleteConfirmationResponse
 * @author Stewart Walter <code@phatkoala.uk>
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
    public function __construct(iterable $response, ?iterable $headers = null)
    {
        if (is_iterable($headers)) {
            $this->headers = new ResponseHeaders($headers);
        }

        $this->confirmed = $response;
    }

    /**
     * @param array $confirmed
     * @return DeleteConfirmationResponse
     */
    protected function setConfirmed(array $confirmed): self
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    /**
     * @return array
     */
    public function getConfirmed(): array
    {
        return $this->confirmed;
    }
}
