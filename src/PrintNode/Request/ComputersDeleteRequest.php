<?php

namespace Bigstylee\PrintNode\Request;

use Bigstylee\PrintNode\Response\DeleteConfirmationResponse;

/**
 * Class ComputersDeleteRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class ComputersDeleteRequest extends AbstractRequest
{
    /**
     * @param null|integer|array $computers
     * @return DeleteConfirmationResponse
     */
    public function getResponse($computers = null)
    {
        $response = null;

        if (is_null($computers)) {
            $response = $this->request->request('DELETE', sprintf($this->url, 'computers'));
        }

        if (is_numeric($computers)) {
            $response = $this->request->request('DELETE', sprintf($this->url, sprintf('computers/%d', $computers)));
        }

        if (is_array($computers)) {
            $computers = implode(',', array_filter(array_map('intval', $computers)));
            if (!empty($computers)) {
                $response = $this->request->request('DELETE', sprintf($this->url, sprintf('computers/%s', $computers)));
            }
        }

        if (!is_null($response)) {
            return new DeleteConfirmationResponse(
                $response->toArray(), $response->getHeaders()
            );
        }

        throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be null, an integer or an array of integers.', __METHOD__));
    }
}
