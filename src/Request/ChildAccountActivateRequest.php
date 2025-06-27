<?php

declare(strict_types=1);

namespace PhatKoala\PrintNode\Request;

use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class ChildAccountActivateRequest
 * @author Stewart Walter <code@phatkoala.uk>
 */
class ChildAccountActivateRequest extends AbstractRequest
{
    /**
     * @throws TransportExceptionInterface
     */
    public function getResponse(): void
    {
        $this->request->request('PUT', sprintf($this->url, 'account/state'), [
            'body' => 'suspended',
        ]);
    }
}
