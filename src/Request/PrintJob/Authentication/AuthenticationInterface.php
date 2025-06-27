<?php

namespace PhatKoala\PrintNode\Request\PrintJob\Authentication;

/**
 * Interface AuthenticationInterface
 * @author Stewart Walter <code@phatkoala.uk>
 */
interface AuthenticationInterface
{
    /**
     * @return array
     */
    public function buildRequest(): array;
}
