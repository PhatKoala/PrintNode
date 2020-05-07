<?php
declare(strict_types=1);

namespace PhatKoala\PrintNode\Request;

/**
 * Interface RequestHeadersInterface
 * @author Stewart Walter <code@phatkoala.uk>
 */
interface RequestHeadersInterface
{
    /**
     * @return array
     */
    public function getHeaders(): array;

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