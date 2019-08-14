<?php

namespace Bigstylee\PrintNode\Response;

/**
 * Class WhoAmIResponse
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class WhoAmIResponse extends AbstractResponse
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $canCreateSubAccounts;

    /**
     * @var null|string
     */
    private $creatorEmail;

    /**
     * @var array
     */
    private $childAccounts = [ ];

    /**
     * @var null|integer
     */
    private $credits;

    /**
     * @var integer
     */
    private $numComputers;

    /**
     * @var integer
     */
    private $totalPrints;

    /**
     * @var array
     */
    private $versions = [ ];

    /**
     * @var array
     */
    private $connected = [ ];

    /**
     * @var array
     */
    private $tags = [ ];

    /**
     * @var string
     */
    private $state;

    /**
     * @var array
     */
    private $permissions = [ ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return WhoAmIResponse
     */
    protected function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return WhoAmIResponse
     */
    protected function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return WhoAmIResponse
     */
    protected function setLastname(string $lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return WhoAmIResponse
     */
    protected function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanCreateSubAccounts(): bool
    {
        return $this->canCreateSubAccounts;
    }

    /**
     * @param bool $canCreateSubAccounts
     * @return WhoAmIResponse
     */
    protected function setCanCreateSubAccounts(bool $canCreateSubAccounts)
    {
        $this->canCreateSubAccounts = $canCreateSubAccounts;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreatorEmail(): ?string
    {
        return $this->creatorEmail;
    }

    /**
     * @param string|null $creatorEmail
     * @return WhoAmIResponse
     */
    protected function setCreatorEmail(?string $creatorEmail)
    {
        $this->creatorEmail = $creatorEmail;

        return $this;
    }

    /**
     * @return array
     */
    public function getChildAccounts(): array
    {
        return $this->childAccounts;
    }

    /**
     * @param array $childAccounts
     * @return WhoAmIResponse
     */
    protected function setChildAccounts(array $childAccounts)
    {
        $this->childAccounts = $childAccounts;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCredits(): ?int
    {
        return $this->credits;
    }

    /**
     * @param int|null $credits
     * @return WhoAmIResponse
     */
    protected function setCredits(?int $credits)
    {
        $this->credits = $credits;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumComputers(): int
    {
        return $this->numComputers;
    }

    /**
     * @param int $numComputers
     * @return WhoAmIResponse
     */
    protected function setNumComputers(int $numComputers)
    {
        $this->numComputers = $numComputers;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalPrints(): int
    {
        return $this->totalPrints;
    }

    /**
     * @param int $totalPrints
     * @return WhoAmIResponse
     */
    protected function setTotalPrints(int $totalPrints)
    {
        $this->totalPrints = $totalPrints;

        return $this;
    }

    /**
     * @return array
     */
    public function getVersions(): array
    {
        return $this->versions;
    }

    /**
     * @param array $versions
     * @return WhoAmIResponse
     */
    protected function setVersions(array $versions)
    {
        $this->versions = $versions;

        return $this;
    }

    /**
     * @return array
     */
    public function getConnected(): array
    {
        return $this->connected;
    }

    /**
     * @param array $connected
     * @return WhoAmIResponse
     */
    protected function setConnected(array $connected)
    {
        $this->connected = $connected;

        return $this;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return WhoAmIResponse
     */
    protected function setTags(array $tags)
    {
        $this->tags = $tags;

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
     * @return WhoAmIResponse
     */
    protected function setState(string $state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return array
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * @param array $permissions
     * @return WhoAmIResponse
     */
    protected function setPermissions(array $permissions)
    {
        $this->permissions = $permissions;

        return $this;
    }
}