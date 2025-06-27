<?php

declare(strict_types=1);

namespace PhatKoala\PrintNode\Request;

use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class ChildAccountDeleteRequest
 * @author Stewart Walter <code@phatkoala.uk>
 */
class ChildAccountDeleteRequest extends AbstractRequest
{
    /**
     * @throws TransportExceptionInterface
     */
    public function getResponse(): void
    {
        $this->request->request('DELETE', sprintf($this->url, 'account'));
    }

}
