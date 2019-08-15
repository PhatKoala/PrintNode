<?php

namespace Bigstylee\PrintNode\Response;

use DateTimeInterface;

/**
 * Class PrintJobResponse
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class PrintJobResponse extends AbstractResponse
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $contentType;

    /**
     * @var string
     */
    private $source;

    /**
     * @var DateTimeInterface|null
     */
    private $expireAt;

    /**
     * @var DateTimeInterface
     */
    private $createTimestamp;

    /**
     * @var string
     */
    private $state;

    /**
     * @var PrinterResponse
     */
    private $printer;

    /**
     * @return ResponseHeaders|null
     */
    public function getHeaders(): ?ResponseHeaders
    {
        return $this->headers;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getExpireAt(): ?DateTimeInterface
    {
        return $this->expireAt;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreateTimestamp(): DateTimeInterface
    {
        return $this->createTimestamp;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return PrinterResponse
     */
    public function getPrinter(): PrinterResponse
    {
        return $this->printer;
    }
}
