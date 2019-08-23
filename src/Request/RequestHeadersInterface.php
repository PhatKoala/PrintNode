<?php
declare(strict_types=1);

namespace Bigstylee\PrintNode\Request;

/**
 * Interface RequestHeadersInterface
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
interface RequestHeadersInterface
{
    /**
     * @param $name
     * @param $value
     * @return self
     */
    public function addHeader($name, $value);

    /**
     * @param $name
     * @return self
     */
    public function removeHeader($name);
}