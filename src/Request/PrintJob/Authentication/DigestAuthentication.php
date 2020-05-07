<?php

namespace PhatKoala\PrintNode\Request\PrintJob\Authentication;

/**
 * Class DigestAuthentication
 * @author Stewart Walter <code@phatkoala.uk>
 */
class DigestAuthentication implements AuthenticationInterface
{
    protected $type = 'DigestAuth';

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * DigestAuthentication constructor.
     *
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return array
     */
    public function buildRequest(): array
    {
        return [
            'type' => $this->type,
            'credentials' => [
                'user' => $this->username,
                'password' => $this->password,
            ],
        ];
    }
}