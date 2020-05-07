<?php

namespace PhatKoala\PrintNode\Response;

use DateTime;
use DateTimeInterface;

/**
 * Class PrintJobResponse
 * @author Stewart Walter <code@phatkoala.uk>
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
     * @param int $id
     * @return PrintJobResponse
     */
    protected function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $title
     * @return PrintJobResponse
     */
    protected function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $contentType
     * @return PrintJobResponse
     */
    protected function setContentType(string $contentType): self
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * @param string $source
     * @return PrintJobResponse
     */
    protected function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @param DateTimeInterface|null $expireAt
     * @return PrintJobResponse
     */
    protected function setExpireAt($expireAt): self
    {
        if (is_string($expireAt)) {
            $expireAt = DateTime::createFromFormat($expireAt, 'c');

            if (false === $expireAt) {
                $expireAt = null;
            }
        }

        $this->expireAt = $expireAt;

        return $this;
    }

    /**
     * @param DateTimeInterface $createTimestamp
     * @return PrintJobResponse
     */
    protected function setCreateTimestamp($createTimestamp): self
    {
        if (is_string($createTimestamp)) {
            $createTimestamp = DateTime::createFromFormat($createTimestamp, 'c');

            if (false === $createTimestamp) {
                $createTimestamp = null;
            }
        }

        $this->createTimestamp = $createTimestamp;

        return $this;
    }

    /**
     * @param string $state
     * @return PrintJobResponse
     */
    protected function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @param PrinterResponse|array $printer
     * @return PrintJobResponse
     */
    protected function setPrinter($printer): self
    {
        if (is_array($printer)) {
            $printer = new PrinterResponse($printer);
        }

        $this->printer = $printer;

        return $this;
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
