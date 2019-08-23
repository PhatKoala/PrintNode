<?php
declare(strict_types=1);

namespace Bigstylee\PrintNode\Request;

use Bigstylee\PrintNode\Response\DeleteConfirmationResponse;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class PrintersDeleteRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class PrintersDeleteRequest extends AbstractRequest
{
    /**
     * @param null|int|array $printers
     * @return DeleteConfirmationResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getResponse($printers = null)
    {
        $response = null;

        if (is_null($printers)) {
            $response = $this->request->request('DELETE', sprintf($this->url, 'printers'));
        }
        else if (is_int($printers) || (is_string($printers) && ctype_digit($printers))) {
            $response = $this->request->request('DELETE', sprintf($this->url, sprintf('printers/%d', $printers)));
        }
        else if (is_array($printers)) {
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
