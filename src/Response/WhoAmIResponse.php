<?php

namespace PhatKoala\PrintNode\Response;

/**
 * Class WhoAmIResponse
 * @author Stewart Walter <code@phatkoala.uk>
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
     * @var null|string
     */
    private $creatorRef;

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
     * @param int $id
     * @return self
     */
    protected function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $firstname
     * @return self
     */
    protected function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @param string $lastname
     * @return self
     */
    protected function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @param string $email
     * @return self
     */
    protected function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param bool $canCreateSubAccounts
     * @return self
     */
    protected function setCanCreateSubAccounts(bool $canCreateSubAccounts): self
    {
        $this->canCreateSubAccounts = $canCreateSubAccounts;

        return $this;
    }

    /**
     * @param string|null $creatorEmail
     * @return self
     */
    protected function setCreatorEmail(?string $creatorEmail): self
    {
        $this->creatorEmail = $creatorEmail;

        return $this;
    }

    /**
     * @param string|null $creatorRef
     * @return self
     */
    public function setCreatorRef(?string $creatorRef)
    {
        $this->creatorRef = $creatorRef;

        return $this;
    }

    /**
     * @param array $childAccounts
     * @return self
     */
    protected function setChildAccounts(array $childAccounts): self
    {
        $this->childAccounts = $childAccounts;

        return $this;
    }

    /**
     * @param int|null $credits
     * @return self
     */
    protected function setCredits(?int $credits): self
    {
        $this->credits = $credits;

        return $this;
    }

    /**
     * @param int $numComputers
     * @return self
     */
    protected function setNumComputers(int $numComputers): self
    {
        $this->numComputers = $numComputers;

        return $this;
    }

    /**
     * @param int $totalPrints
     * @return self
     */
    protected function setTotalPrints(int $totalPrints): self
    {
        $this->totalPrints = $totalPrints;

        return $this;
    }

    /**
     * @param array $versions
     * @return self
     */
    protected function setVersions(array $versions): self
    {
        $this->versions = $versions;

        return $this;
    }

    /**
     * @param array $connected
     * @return self
     */
    protected function setConnected(array $connected): self
    {
        $this->connected = $connected;

        return $this;
    }

    /**
     * @param array $tags
     * @return self
     */
    protected function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @param string $state
     * @return self
     */
    protected function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @param array $permissions
     * @return self
     */
    protected function setPermissions(array $permissions): self
    {
        $this->permissions = $permissions;

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
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return bool
     */
    public function isCanCreateSubAccounts(): bool
    {
        return $this->canCreateSubAccounts;
    }

    /**
     * @return string|null
     */
    public function getCreatorEmail(): ?string
    {
        return $this->creatorEmail;
    }

    /**
     * @return string|null
     */
    public function getCreatorRef(): ?string
    {
        return $this->creatorRef;
    }

    /**
     * @return array
     */
    public function getChildAccounts(): array
    {
        return $this->childAccounts;
    }

    /**
     * @return int|null
     */
    public function getCredits(): ?int
    {
        return $this->credits;
    }

    /**
     * @return int
     */
    public function getNumComputers(): int
    {
        return $this->numComputers;
    }

    /**
     * @return int
     */
    public function getTotalPrints(): int
    {
        return $this->totalPrints;
    }

    /**
     * @return array
     */
    public function getVersions(): array
    {
        return $this->versions;
    }

    /**
     * @return array
     */
    public function getConnected(): array
    {
        return $this->connected;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return array
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }
}
