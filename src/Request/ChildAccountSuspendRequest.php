<?php
declare(strict_types=1);

namespace PhatKoala\PrintNode\Request;

use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class ChildAccountSuspendRequest
 * @author Stewart Walter <code@phatkoala.uk>
 */
class ChildAccountSuspendRequest extends AbstractRequest
{
    /**
     * @throws TransportExceptionInterface
     */
    public function getResponse(): void
    {
        $this->request->request('PUT', sprintf($this->url, 'account/state'), [
            'body' => 'active',
        ]);
    }
}
