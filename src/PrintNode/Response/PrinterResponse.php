<?php

namespace Bigstylee\PrintNode\Response;

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
     * @var \DateTimeInterface
     */
    private $createTimestamp;

    /**
     * @var string
     */
    private $state;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return PrinterResponse
     */
    protected function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return ComputerResponse
     */
    public function getComputer(): ComputerResponse
    {
        return $this->computer;
    }

    /**
     * @param ComputerResponse $computer
     * @return PrinterResponse
     */
    protected function setComputer($computer)
    {
        if (is_array($computer)) {
            $computer = new ComputerResponse($computer);
        }

        $this->computer = $computer;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return PrinterResponse
     */
    protected function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return PrinterResponse
     */
    protected function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return PrinterCapabilitiesResponse|null
     */
    public function getCapabilities(): ?PrinterCapabilitiesResponse
    {
        return $this->capabilities;
    }

    /**
     * @param PrinterCapabilitiesResponse|null $capabilities
     * @return PrinterResponse
     */
    protected function setCapabilities($capabilities)
    {
        if (is_array($capabilities)) {
            $capabilities = new PrinterCapabilitiesResponse($capabilities);
        }

        $this->capabilities = $capabilities;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDefault(): ?string
    {
        return $this->default;
    }

    /**
     * @param string|null $default
     * @return PrinterResponse
     */
    protected function setDefault(?string $default)
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreateTimestamp(): \DateTimeInterface
    {
        return $this->createTimestamp;
    }

    /**
     * @param $createTimestamp
     * @return $this
     * @throws \Exception
     */
    protected function setCreateTimestamp($createTimestamp)
    {
        if (is_string($createTimestamp)) {
            $createTimestamp = new \DateTime($createTimestamp);
        }

        $this->createTimestamp = $createTimestamp;

        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return PrinterResponse
     */
    protected function setState(string $state)
    {
        $this->state = $state;

        return $this;
    }
}
