<?php

namespace PhatKoala\PrintNode\Response;

/**
 * Class ChildAccountResponse
 * @author Stewart Walter <code@phatkoala.uk>
 */
class ChildAccountResponse extends AbstractResponse
{
    /**
     * @var int
     */
    private $id;

    /**
     * DEPRECATED
     *
     * Although this field is required, it will be removed from the API soon.
     * We strongly recommend that you set this field to - (the API will not accept an empty string) and use Account[creatorRef] (described below) to identify the account.
     *
     * @var string
     * @deprecated
     */
    private $firstname ;

    /**
     * DEPRECATED.
     *
     * Although this field is required, it will be removed from the API soon.
     * We strongly recommend that you set this field to - (the API will not accept an empty string) and use Account[creatorRef] (described below) to identify the account.
     *
     * @var string
     * @deprecated
     */
    private $lastname;

    /**
     * A contact email address for your customer. This email is for actions like account password resets, informing customers of new versions of the PrintNode Client, etc.
     *
     * Other than in the above cases, we will never contact your customers unless agreed in advance with you.
     * In particular, we will never contact your customers regarding marketing or promotions and we never share data of any kind with any third party.
     *
     * @var string
     */
    private $email;

    /**
     * A unique reference which you can use as a method to identify an account.
     *
     * @var string
     */
    private $creatorRef;

    /**
     * An array of API Key names. When the account is created, an API key will be generated for each name in this array.
     *
     * Key names must be at most 16 bytes long. At most 10 key names can be supplied.
     *
     * @var array
     */
    private $apiKeys = [ ];

    /**
     * An object, the keys of which are tag names and the values of which are corresponding tag values.
     * These tags will be applied to the newly created account. Tag values must be at most 1024 bytes long.
     *
     * @var array
     */
    private $tags = [ ];

    /**
     * @var int|null
     */
    private $credits;

    /**
     * ChildAccountResponse constructor.
     * @param iterable $response
     * @param iterable|null $headers
     */
    public function __construct(iterable $response, ?iterable $headers = null)
    {
        parent::__construct($response, $headers);

        $this->setFromArray($response['Account']);
    }

    /**
     * @param int $id
     * @return ChildAccountResponse
     */
    protected function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $firstname
     * @return ChildAccountResponse
     */
    protected function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @param string $lastname
     * @return ChildAccountResponse
     */
    protected function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @param string $email
     * @return ChildAccountResponse
     */
    protected function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param string $creatorRef
     * @return ChildAccountResponse
     */
    protected function setCreatorRef(string $creatorRef): self
    {
        $this->creatorRef = $creatorRef;

        return $this;
    }

    /**
     * @param array $apiKeys
     * @return ChildAccountResponse
     */
    protected function setApiKeys(array $apiKeys): self
    {
        $this->apiKeys = $apiKeys;

        return $this;
    }

    /**
     * @param array $tags
     * @return ChildAccountResponse
     */
    protected function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @param int|null $credits
     * @return ChildAccountResponse
     */
    protected function setCredits(?int $credits): self
    {
        $this->credits = $credits;

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
     * @return string
     */
    public function getCreatorRef(): string
    {
        return $this->creatorRef;
    }

    /**
     * @return array
     */
    public function getApiKeys(): array
    {
        return $this->apiKeys;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @return int|null
     */
    public function getCredits(): ?int
    {
        return $this->credits;
    }
}
