<?php

namespace Bigstylee\PrintNode\Request;

use Bigstylee\PrintNode\Response\DeleteConfirmationResponse;

/**
 * Class PrintersDeleteRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class PrintersDeleteRequest extends AbstractRequest
{
    /**
     * @param null|integer|iterable $printers
     * @return DeleteConfirmationResponse
     */
    public function getResponse($printers = null)
    {
        $response = null;

        if (is_null($printers)) {
            $response = $this->request->request('DELETE', sprintf($this->url, 'printers'));
        }

        if (is_numeric($printers)) {
            $response = $this->request->request('DELETE', sprintf($this->url, sprintf('printers/%d', $printers)));
        }

        if (is_iterable($printers)) {
            $printers = implode(',', array_filter(array_map('intval', $printers)));
            if (!empty($printers)) {
                $response = $this->request->request('DELETE', sprintf($this->url, sprintf('printers/%s', $printers)));
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
