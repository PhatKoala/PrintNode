<?php

namespace Bigstylee\PrintNode\Request;

use Bigstylee\PrintNode\Response\DeleteConfirmationResponse;

/**
 * Class ComputerPrintersDeleteRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class ComputerPrintersDeleteRequest extends AbstractRequest
{
    /**
     * @param integer $computer
     * @param null|integer|iterable $printers
     * @return DeleteConfirmationResponse
     */
    public function getResponse(int $computer, $printers = null)
    {
        $response = null;

        if (is_null($printers)) {
            $response = $this->request->request('DELETE', sprintf($this->url, sprintf('computers/%d/printers', $computer)));
        }

        if (is_numeric($printers)) {
            $response = $this->request->request('DELETE', sprintf($this->url, sprintf('computers/%d/printers/%d', $computer, $printers)));
        }

        if (is_iterable($printers)) {
            $printers = implode(',', array_filter(array_map('intval', $printers)));
            if (!empty($printers)) {
                $response = $this->request->request('DELETE', sprintf($this->url, sprintf('computers/%d/printers/%s', $computer, $printers)));
            }
        }

        if (!is_null($response)) {
            return new DeleteConfirmationResponse(
                $response->toArray(), $response->getHeaders()
            );
        }

        throw new \InvalidArgumentException(sprintf('Argument 1 passed to %s must be null, an integer or an iterable type of integers.', __METHOD__));
    }
}
