<?php

namespace Bigstylee\PrintNode\Response;

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
     * @var \DateTime
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
     * @return ComputerResponse
     */
    protected function setId(int $id)
    {
        $this->id = $id;

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
     * @return ComputerResponse
     */
    protected function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInet()
    {
        return $this->inet;
    }

    /**
     * @param mixed $inet
     * @return ComputerResponse
     */
    protected function setInet($inet)
    {
        $this->inet = $inet;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInet6()
    {
        return $this->inet6;
    }

    /**
     * @param mixed $inet6
     * @return ComputerResponse
     */
    protected function setInet6($inet6)
    {
        $this->inet6 = $inet6;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getHostname(): ?string
    {
        return $this->hostname;
    }

    /**
     * @param string|null $hostname
     * @return ComputerResponse
     */
    protected function setHostname(?string $hostname)
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @param string|null $version
     * @return ComputerResponse
     */
    protected function setVersion(?string $version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getJre(): ?string
    {
        return $this->jre;
    }

    /**
     * @param string|null $jre
     * @return ComputerResponse
     */
    protected function setJre(?string $jre)
    {
        $this->jre = $jre;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreateTimestamp(): ?\DateTime
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
     * @return ComputerResponse
     */
    protected function setState(string $state)
    {
        $this->state = $state;

        return $this;
    }
}
