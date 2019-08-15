<?php

namespace Bigstylee\PrintNode\Response;

use DateTime;
use DateTimeInterface;

/**
 * Class PrinterResponse
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class PrinterResponse extends AbstractResponse
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var ComputerResponse
     */
    private $computer;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var null|PrinterCapabilitiesResponse
     */
    private $capabilities;

    /**
     * @var null|string
     */
    private $default;

    /**
     * @var DateTimeInterface
     */
    private $createTimestamp;

    /**
     * @var string
     */
    private $state;

    /**
     * @param int $id
     * @return PrinterResponse
     */
    protected function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param ComputerResponse|array $computer
     * @return PrinterResponse
     */
    protected function setComputer($computer): self
    {
        if (is_array($computer)) {
            $computer = new ComputerResponse($computer);
        }

        $this->computer = $computer;

        return $this;
    }

    /**
     * @param string $name
     * @return PrinterResponse
     */
    protected function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $description
     * @return PrinterResponse
     */
    protected function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param PrinterCapabilitiesResponse|array $capabilities
     * @return PrinterResponse
     */
    protected function setCapabilities($capabilities): self
    {
        if (is_array($capabilities)) {
            $capabilities = new PrinterCapabilitiesResponse($capabilities);
        }

        $this->capabilities = $capabilities;

        return $this;
    }

    /**
     * @param string|null $default
     * @return PrinterResponse
     */
    protected function setDefault(?string $default): self
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @param DateTimeInterface $createTimestamp
     * @return PrinterResponse
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
     * @return PrinterResponse
     */
    protected function setState(string $state): self
    {
        $this->state = $state;

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
     * @return ComputerResponse
     */
    public function getComputer(): ComputerResponse
    {
        return $this->computer;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return PrinterCapabilitiesResponse|null
     */
    public function getCapabilities(): ?PrinterCapabilitiesResponse
    {
        return $this->capabilities;
    }

    /**
     * @return string|null
     */
    public function getDefault(): ?string
    {
        return $this->default;
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
}
