<?php
declare(strict_types=1);

namespace Bigstylee\PrintNode;

use Bigstylee\PrintNode\Request\ChildAccountRequest;
use Bigstylee\PrintNode\Request\ClientKeyRequest;
use Bigstylee\PrintNode\Request\ComputerPrinterRequest;
use Bigstylee\PrintNode\Request\ComputerPrintersDeleteRequest;
use Bigstylee\PrintNode\Request\ComputerPrintersRequest;
use Bigstylee\PrintNode\Request\ComputerRequest;
use Bigstylee\PrintNode\Request\ComputersDeleteRequest;
use Bigstylee\PrintNode\Request\ComputersRequest;
use Bigstylee\PrintNode\Request\NoopRequest;
use Bigstylee\PrintNode\Request\PingRequest;
use Bigstylee\PrintNode\Request\PrinterRequest;
use Bigstylee\PrintNode\Request\PrintersDeleteRequest;
use Bigstylee\PrintNode\Request\PrintersRequest;
use Bigstylee\PrintNode\Request\PrintJob\PrintJobFile;
use Bigstylee\PrintNode\Request\PrintJob\PrintJobUrl;
use Bigstylee\PrintNode\Request\RequestHeaders;
use Bigstylee\PrintNode\Request\RequestHeadersInterface;
use Bigstylee\PrintNode\Request\WhoAmIRequest;
use Bigstylee\PrintNode\Response\ComputerResponse;
use Bigstylee\PrintNode\Response\ComputersResponse;
use Bigstylee\PrintNode\Response\DeleteConfirmationResponse;
use Bigstylee\PrintNode\Response\PrinterResponse;
use Bigstylee\PrintNode\Response\PrintersResponse;
use Bigstylee\PrintNode\Response\WhoAmIResponse;
use InvalidArgumentException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class PrintNode
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class PrintNode
{
    /**
     * @var string
     */
    protected $auth;

    /**
     * @var RequestHeadersInterface
     */
    protected $headers;

    /**
     * @var string
     */
    public static $CHILD_AUTH_BY_ID = 'id';

    /**
     * @var string
     */
    public static $CHILD_AUTH_BY_EMAIL = 'email';

    /**
     * @var string
     */
    public static $CHILD_AUTH_BY_CREATOR_REF = 'creatorRef';

    /**
     * PrintNode constructor.
     * @param string $auth
     * @param RequestHeadersInterface|null $headers
     * @param int|null $child
     * @param string $childAuthBy
     */
    public function __construct(string $auth, RequestHeadersInterface $headers = null, int $child = null, $childAuthBy = 'id')
    {
        $this->auth = $auth;
        $this->headers = (is_null($headers)) ? new RequestHeaders() : $headers;

        if (!is_null($child)) {
            switch ($childAuthBy) {
                case self::$CHILD_AUTH_BY_ID:
                    $this->headers->addHeader('X-Child-Account-By-Id', $child);
                    break;

                case self::$CHILD_AUTH_BY_EMAIL:
                    $this->headers->addHeader('X-Child-Account-By-Email', $child);
                    break;

                case self::$CHILD_AUTH_BY_CREATOR_REF:
                    $this->headers->addHeader('X-Child-Account-By-CreatorRef', $child);
                    break;

                default:
                    throw new InvalidArgumentException(sprintf('Unknown value for $childAuthBy: %s', $childAuthBy));
            }
        }
    }

    /**
     * @param int $child
     * @param string $childAuthBy
     * @return self
     */
    public function getChildAccount(int $child, $childAuthBy = 'id'): self
    {
        return new self($this->auth, clone $this->headers, $child, $childAuthBy);
    }

    /**
     * https://www.printnode.com/en/docs/api/curl#versioning
     *
     * @param string|null $version
     * @return self
     */
    public function setVersion($version): self
    {
        (is_null($version)) ? $this->headers->removeHeader('Accept-Version') : $this->headers->addHeader('Accept-Version', $version);

        return $this;
    }

    /**
     * https://www.printnode.com/en/docs/api/curl#headers
     *
     * @param boolean $pretty
     * @return self
     */
    public function setPretty($pretty): self
    {
        ($pretty) ? $this->headers->addHeader('X-Pretty', '') : $this->headers->removeHeader('X-Pretty');

        return $this;
    }

    /**
     * @return WhoAmIResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getWhoAmI(): WhoAmIResponse
    {
        $request = new WhoAmIRequest($this->auth, $this->headers);

        return $request->getResponse();
    }

    /**
     * @return ComputersResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getComputers(): ComputersResponse
    {
        $request = new ComputersRequest($this->auth, $this->headers);

        return $request->getResponse();
    }

    /**
     * @param int $computer
     * @return ComputerResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getComputer(int $computer): ComputerResponse
    {
        $request = new ComputerRequest($this->auth, $this->headers);

        return $request->getResponse($computer);
    }

    /**
     * @param null|int|array $computers
     * @return DeleteConfirmationResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function deleteComputers($computers = null): DeleteConfirmationResponse
    {
        $request = new ComputersDeleteRequest($this->auth, $this->headers);

        return $request->getResponse($computers);
    }

    /**
     * @return PrintersResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getPrinters(): PrintersResponse
    {
        $request = new PrintersRequest($this->auth, $this->headers);

        return $request->getResponse();
    }

    /**
     * @param int $printer
     * @return PrinterResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getPrinter(int $printer): PrinterResponse
    {
        $request = new PrinterRequest($this->auth, $this->headers);

        return $request->getResponse($printer);
    }

    /**
     * @param null|int|array $printers
     * @return DeleteConfirmationResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function deletePrinters($printers = null): DeleteConfirmationResponse
    {
        $request = new PrintersDeleteRequest($this->auth, $this->headers);

        return $request->getResponse($printers);
    }

    /**
     * @param int $computer
     * @return PrintersResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getComputerPrinters(int $computer): PrintersResponse
    {
        $request = new ComputerPrintersRequest($this->auth, $this->headers);

        return $request->getResponse($computer);
    }

    /**
     * @param int $computer
     * @param int $printer
     * @return PrinterResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getComputerPrinter(int $computer, int $printer): PrinterResponse
    {
        $request = new ComputerPrinterRequest($this->auth, $this->headers);

        return $request->getResponse($computer, $printer);
    }

    /**
     * @param int $computer
     * @param null|int|array $printers
     * @return DeleteConfirmationResponse
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function deleteComputerPrinters(int $computer, $printers = null): DeleteConfirmationResponse
    {
        $request = new ComputerPrintersDeleteRequest($this->auth, $this->headers);

        return $request->getResponse($computer, $printers);
    }

    /**
     * @param int $printer
     * @param string $title
     * @param string $source
     * @return PrintJobFile
     */
    public function createPrintJobFile(int $printer, string $title, string $source): PrintJobFile
    {
        return new PrintJobFile($this->auth, $this->headers, $printer, $title, $source);
    }

    /**
     * @param int $printer
     * @param string $title
     * @param string $source
     * @return PrintJobUrl
     */
    public function createPrintJobUrl(int $printer, string $title, string $source): PrintJobUrl
    {
        return new PrintJobUrl($this->auth, $this->headers, $printer, $title, $source);
    }

    public function getPrintJobs()
    {

    }

    public function deletePrintJobs()
    {

    }

    public function getClient()
    {

    }

    public function getClients()
    {

    }

    /**
     * @param string $email
     * @param string $password
     * @return ChildAccountRequest
     */
    public function createAccount(string $email, string $password)
    {
        return new ChildAccountRequest($this->auth, $this->headers, $email, $password);
    }

    /**
     * @param string $uuid
     * @param string $edition
     * @param string $version
     * @return string
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getClientKey(string $uuid, string $edition, string $version): string
    {
        $request = new ClientKeyRequest($this->auth, $this->headers);

        return $request->getResponse($uuid, $edition, $version);
    }

    /**
     * @return bool
     * @throws TransportExceptionInterface
     */
    public function noop(): bool
    {
        $request = new NoopRequest($this->auth, $this->headers);

        return $request->getResponse();
    }

    /**
     * @return bool
     * @throws TransportExceptionInterface
     */
    public static function ping(): bool
    {
        $request = new PingRequest();

        return $request->getResponse();
    }
}