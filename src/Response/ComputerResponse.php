<?php

namespace Bigstylee\PrintNode\Response;

use DateTime;
use DateTimeInterface;
use Exception;

/**
 * Class ComputerResponse
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class ComputerResponse extends AbstractResponse
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var mixed
     */
    private $inet;

    /**
     * @var mixed
     */
    private $inet6;

    /**
     * @var null|string
     */
    private $hostname;

    /**
     * @var null|string
     */
    private $version;

    /**
     * @var null|string
     */
    private $jre;

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
     * @return ComputerResponse
     */
    protected function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $name
     * @return ComputerResponse
     */
    protected function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param mixed $inet
     * @return ComputerResponse
     */
    protected function setInet($inet): self
    {
        $this->inet = $inet;

        return $this;
    }

    /**
     * @param mixed $inet6
     * @return ComputerResponse
     */
    protected function setInet6($inet6): self
    {
        $this->inet6 = $inet6;

        return $this;
    }

    /**
     * @param string|null $hostname
     * @return ComputerResponse
     */
    protected function setHostname(?string $hostname): self
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * @param string|null $version
     * @return ComputerResponse
     */
    protected function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @param string|null $jre
     * @return ComputerResponse
     */
    protected function setJre(?string $jre): self
    {
        $this->jre = $jre;

        return $this;
    }

    /**
     * @param DateTimeInterface|string $createTimestamp
     * @return ComputerResponse
     */
    protected function setCreateTimestamp($createTimestamp): self
    {
        if (is_string($createTimestamp)) {
            $createTimestamp = DateTime::createFromFormat('Y-m-d\TH:i:s.v\Z', $createTimestamp);

            if (false === $createTimestamp) {
                $createTimestamp = null;
            }
        }

        $this->createTimestamp = $createTimestamp;

        return $this;
    }

    /**
     * @param string $state
     * @return ComputerResponse
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getInet()
    {
        return $this->inet;
    }

    /**
     * @return mixed
     */
    public function getInet6()
    {
        return $this->inet6;
    }

    /**
     * @return string|null
     */
    public function getHostname(): ?string
    {
        return $this->hostname;
    }

    /**
     * @return string|null
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @return string|null
     */
    public function getJre(): ?string
    {
        return $this->jre;
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
