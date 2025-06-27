<?php

namespace PhatKoala\PrintNode\Response;

/**
 * Class ResponseHeaders
 * @author Stewart Walter <code@phatkoala.uk>
 */
class ResponseHeaders
{
    /**
     * @var \DateTimeInterface
     */
    private $date;

    /**
     * @var string
     */
    private $contentType;

    /**
     * @var integer
     */
    private $contentLength;

    /**
     * @var string
     */
    private $connection;

    /**
     * @var string
     */
    private $apiVersion;

    /**
     * @var string
     */
    private $cacheControl;

    /**
     * @var string
     */
    private $contentMd5;

    /**
     * @var string
     */
    private $elapsed;

    /**
     * @var string
     */
    private $requestId;

    /**
     * @var string
     */
    private $responseTime;

    /**
     * @var string
     */
    private $server;

    /**
     * @var integer
     */
    private $xAccount;

    /**
     * @var string
     */
    private $xAuthWith;

    /**
     * @var integer
     */
    private $xAuthorizedAs;

    /**
     * @var integer
     */
    private $xChildAccountById;

    /**
     * HeadersResponse constructor.
     * @param iterable $headers
     */
    public function __construct(iterable $headers)
    {
        foreach ($headers as $name => $value) {
            $method = 'set'.str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
            if (method_exists($this, $method)) {
                $this->$method($value[0]);
            }
        }
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param string|\DateTime $date
     * @return ResponseHeaders
     * @throws \Exception
     */
    protected function setDate($date)
    {
        if (is_string($date)) {
            $date = new \DateTime($date);
        }

        $this->date = $date;

        return $this;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     * @return ResponseHeaders
     */
    protected function setContentType(string $contentType)
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * @return int
     */
    public function getContentLength(): int
    {
        return $this->contentLength;
    }

    /**
     * @param int $contentLength
     * @return ResponseHeaders
     */
    protected function setContentLength(int $contentLength)
    {
        $this->contentLength = $contentLength;

        return $this;
    }

    /**
     * @return string
     */
    public function getConnection(): string
    {
        return $this->connection;
    }

    /**
     * @param string $connection
     * @return ResponseHeaders
     */
    protected function setConnection(string $connection)
    {
        $this->connection = $connection;

        return $this;
    }

    /**
     * @return string
     */
    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    /**
     * @param string $apiVersion
     * @return ResponseHeaders
     */
    protected function setApiVersion(string $apiVersion)
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * @return string
     */
    public function getCacheControl(): string
    {
        return $this->cacheControl;
    }

    /**
     * @param string $cacheControl
     * @return ResponseHeaders
     */
    protected function setCacheControl(string $cacheControl)
    {
        $this->cacheControl = $cacheControl;

        return $this;
    }

    /**
     * @return string
     */
    public function getContentMd5(): string
    {
        return $this->contentMd5;
    }

    /**
     * @param string $contentMd5
     * @return ResponseHeaders
     */
    protected function setContentMd5(string $contentMd5)
    {
        $this->contentMd5 = $contentMd5;

        return $this;
    }

    /**
     * @return string
     */
    public function getElapsed(): string
    {
        return $this->elapsed;
    }

    /**
     * @param string $elapsed
     * @return ResponseHeaders
     */
    protected function setElapsed(string $elapsed)
    {
        $this->elapsed = $elapsed;

        return $this;
    }

    /**
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->requestId;
    }

    /**
     * @param string $requestId
     * @return ResponseHeaders
     */
    protected function setRequestId(string $requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    /**
     * @return string
     */
    public function getResponseTime(): string
    {
        return $this->responseTime;
    }

    /**
     * @param string $responseTime
     * @return ResponseHeaders
     */
    protected function setResponseTime(string $responseTime)
    {
        $this->responseTime = $responseTime;

        return $this;
    }

    /**
     * @return string
     */
    public function getServer(): string
    {
        return $this->server;
    }

    /**
     * @param string $server
     * @return ResponseHeaders
     */
    protected function setServer(string $server)
    {
        $this->server = $server;

        return $this;
    }

    /**
     * @return int
     */
    public function getXAccount(): int
    {
        return $this->xAccount;
    }

    /**
     * @param int $xAccount
     * @return ResponseHeaders
     */
    protected function setXAccount(int $xAccount)
    {
        $this->xAccount = $xAccount;

        return $this;
    }

    /**
     * @return string
     */
    public function getXAuthWith(): string
    {
        return $this->xAuthWith;
    }

    /**
     * @param string $xAuthWith
     * @return ResponseHeaders
     */
    protected function setXAuthWith(string $xAuthWith)
    {
        $this->xAuthWith = $xAuthWith;

        return $this;
    }

    /**
     * @return int
     */
    public function getXAuthorizedAs(): int
    {
        return $this->xAuthorizedAs;
    }

    /**
     * @param int $xAuthorizedAs
     * @return ResponseHeaders
     */
    protected function setXAuthorizedAs(int $xAuthorizedAs)
    {
        $this->xAuthorizedAs = $xAuthorizedAs;

        return $this;
    }

    /**
     * @return int
     */
    public function getXChildAccountById(): int
    {
        return $this->xChildAccountById;
    }

    /**
     * @param int $xChildAccountById
     * @return ResponseHeaders
     */
    protected function setXChildAccountById(int $xChildAccountById)
    {
        $this->xChildAccountById = $xChildAccountById;

        return $this;
    }
}
