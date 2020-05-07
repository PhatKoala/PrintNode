<?php
declare(strict_types=1);

namespace PhatKoala\PrintNode\Request;

use PhatKoala\PrintNode\Response\DeleteConfirmationResponse;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class ComputersDeleteRequest
 * @author Stewart Walter <code@phatkoala.uk>
 */
class ComputersDeleteRequest extends AbstractRequest
{
    /**
     * @param null|int|array $computers
     * @return DeleteConfirmationResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getResponse($computers = null)
    {
        $response = null;

        if (is_null($computers)) {
            $response = $this->request->request('DELETE', sprintf($this->url, 'computers'));
        }
        else if (is_int($computers) || (is_string($computers) && ctype_digit($computers))) {
            $response = $this->request->request('DELETE', sprintf($this->url, sprintf('computers/%d', (int) $computers)));
        }
        else if (is_array($computers)) {
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
