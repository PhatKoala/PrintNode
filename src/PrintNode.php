<?php
declare(strict_types=1);

namespace PhatKoala\PrintNode;

use InvalidArgumentException;
use PhatKoala\PrintNode\Request\ChildAccountActivateRequest;
use PhatKoala\PrintNode\Request\ChildAccountDeleteRequest;
use PhatKoala\PrintNode\Request\ChildAccountRequest;
use PhatKoala\PrintNode\Request\ChildAccountSuspendRequest;
use PhatKoala\PrintNode\Request\ClientKeyRequest;
use PhatKoala\PrintNode\Request\ComputerPrinterRequest;
use PhatKoala\PrintNode\Request\ComputerPrintersDeleteRequest;
use PhatKoala\PrintNode\Request\ComputerPrintersRequest;
use PhatKoala\PrintNode\Request\ComputerRequest;
use PhatKoala\PrintNode\Request\ComputersDeleteRequest;
use PhatKoala\PrintNode\Request\ComputersRequest;
use PhatKoala\PrintNode\Request\NoopRequest;
use PhatKoala\PrintNode\Request\PingRequest;
use PhatKoala\PrintNode\Request\PrinterRequest;
use PhatKoala\PrintNode\Request\PrintersDeleteRequest;
use PhatKoala\PrintNode\Request\PrintersRequest;
use PhatKoala\PrintNode\Request\PrintJob\PrintJobFile;
use PhatKoala\PrintNode\Request\PrintJob\PrintJobUrl;
use PhatKoala\PrintNode\Request\RequestHeaders;
use PhatKoala\PrintNode\Request\RequestHeadersInterface;
use PhatKoala\PrintNode\Request\WhoAmIRequest;
use PhatKoala\PrintNode\Response\ComputerResponse;
use PhatKoala\PrintNode\Response\ComputersResponse;
use PhatKoala\PrintNode\Response\DeleteConfirmationResponse;
use PhatKoala\PrintNode\Response\PrinterResponse;
use PhatKoala\PrintNode\Response\PrintersResponse;
use PhatKoala\PrintNode\Response\WhoAmIResponse;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class PrintNode
 * @author Stewart Walter <code@phatkoala.uk>
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

    public function createPrintJobPdfSource(int $printer, string $title, string $source): PrintJobPdfSource
    {
        return new PrintJobPdfSource($this->auth, $this->headers, $printer, $title, $source);
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
     * Only works for child accounts
     */
    public function suspend()
    {
        $request = new ChildAccountSuspendRequest($this->auth, $this->headers);

        $request->getResponse();
    }

    /**
     * Only works for child accounts
     */
    public function activate()
    {
        $request = new ChildAccountActivateRequest($this->auth, $this->headers);

        $request->getResponse();
    }

    /**
     * Only works for child accounts
     */
    public function delete(): void
    {
        $request = new ChildAccountDeleteRequest($this->auth, $this->headers);

        $request->getResponse();
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
