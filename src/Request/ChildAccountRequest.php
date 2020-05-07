<?php
declare(strict_types=1);

namespace PhatKoala\PrintNode\Request;

use PhatKoala\PrintNode\Response\ChildAccountResponse;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class ChildAccountRequest
 * @author Stewart Walter <code@phatkoala.uk>
 */
class ChildAccountRequest extends AbstractRequest
{
    /**
     * DEPRECATED
     *
     * Although this field is required, it will be removed from the API soon.
     * We strongly recommend that you set this field to - (the API will not accept an empty string) and use Account[creatorRef] (described below) to identify the account.
     *
     * @var string
     * @deprecated
     */
    private $firstname = '-';

    /**
     * DEPRECATED.
     *
     * Although this field is required, it will be removed from the API soon.
     * We strongly recommend that you set this field to - (the API will not accept an empty string) and use Account[creatorRef] (described below) to identify the account.
     *
     * @var string
     * @deprecated
     */
    private $lastname = '-';

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
     * The password must be at least eight bytes long.
     *
     * In line with current best practices regarding password strength, we do not impose any other complexity requirements, such as inclusion of numbers and symbols.
     *
     * @var string
     */
    private $password;

    /**
     * A unique reference which you can use as a method to identify an account.
     *
     * @var string|null
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
     * ChildAccountRequest constructor.
     *
     * @param $auth
     * @param RequestHeadersInterface $headers
     * @param string $email
     * @param string $password
     */
    public function __construct(string $auth, RequestHeadersInterface $headers, string $email, string $password)
    {
        parent::__construct($auth, $headers);

        $this
            ->setEmail($email)
            ->setPassword($password);
    }

    /**
     * @return ChildAccountResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function send(): ChildAccountResponse
    {
        $response = $this->request->request('POST', sprintf($this->url, 'account'), [
            'body' => json_encode(
                $this->buildRequest()
            )
        ]);

        return new ChildAccountResponse(
            $response->toArray(), $response->getHeaders()
        );
    }

    /**
     * @return array
     */
    protected function buildRequest(): array
    {
        $account = array_filter([
            'firstname' => $this->getFirstname(),
            'lastname' => $this->getLastname(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'creatorRef' => $this->getCreatorRef(),
        ], function ($value) {
            return !is_null($value);
        });

        return array_filter([
            'Account' => $account,
            'ApiKeys' => $this->getApiKeys(),
            'Tags' => (object) $this->getTags(),
        ], function ($value) {
            return !is_null($value);
        });
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
     * @return self
     */
    public function setFirstname(string $firstname): self
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
     * @return self
     */
    public function setLastname(string $lastname): self
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
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreatorRef(): ?string
    {
        return $this->creatorRef;
    }

    /**
     * @param string|null $creatorRef
     * @return self
     */
    public function setCreatorRef(?string $creatorRef): self
    {
        $this->creatorRef = $creatorRef;

        return $this;
    }

    /**
     * @return array
     */
    public function getApiKeys(): array
    {
        return $this->apiKeys;
    }

    /**
     * @param array $apiKeys
     * @return self
     */
    public function setApiKeys(array $apiKeys): self
    {
        $this->apiKeys = $apiKeys;

        return $this;
    }

    /**
     * @param string $name
     * @return self
     */
    public function addApiKey(string $name): self
    {
        if (!in_array($name, $this->apiKeys)) {
            $this->apiKeys[] = $name;
        }

        return $this;
    }

    /**
     * @param array $apiKeys
     * @return self
     */
    public function addApiKeys(array $apiKeys): self
    {
        foreach ($apiKeys as $apiKey) {
            $this->addApiKey($apiKey);
        }

        return $this;
    }

    /**
     * @param string $name
     * @return self
     */
    public function removeApiKey(string $name): self
    {
        if (($key = array_search($name, $this->apiKeys)) !== false) {
            unset($this->apiKeys[$key]);
        }

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
     * @return self
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     * @return self
     */
    public function addTag(string $name, string $value): self
    {
        $this->tags[$name] = $value;

        return $this;
    }

    /**
     * @param array $tags
     * @return self
     */
    public function addTags(array $tags): self
    {
        foreach ($tags as $name => $value) {
            $this->addTag($name, $value);
        }

        return $this;
    }

    /**
     * @param string $name
     * @return self
     */
    public function removeTag(string $name): self
    {
        if (isset($this->tags[$name])) {
            unset($this->tags[$name]);
        }

        return $this;
    }
}
