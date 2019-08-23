<?php

namespace Bigstylee\PrintNode\Request\PrintJob\Authentication;

/**
 * Interface AuthenticationInterface
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
interface AuthenticationInterface
{
    /**
     * @return array
     */
    public function buildRequest(): array;
}