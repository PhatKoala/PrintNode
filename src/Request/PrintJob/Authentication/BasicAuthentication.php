<?php

namespace PhatKoala\PrintNode\Request\PrintJob\Authentication;

/**
 * Class BasicAuthentication
 * @author Stewart Walter <code@phatkoala.uk>
 */
class BasicAuthentication implements AuthenticationInterface
{
    protected $type = 'BasicAuth';

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * BasicAuthentication constructor.
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
