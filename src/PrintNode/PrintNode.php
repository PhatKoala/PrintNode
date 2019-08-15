<?php

namespace Bigstylee\PrintNode;

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
use Bigstylee\PrintNode\Request\WhoAmIRequest;
use Bigstylee\PrintNode\Response\ComputerResponse;
use Bigstylee\PrintNode\Response\ComputersResponse;
use Bigstylee\PrintNode\Response\DeleteConfirmationResponse;
use Bigstylee\PrintNode\Response\PrinterResponse;
use Bigstylee\PrintNode\Response\PrintersResponse;
use Bigstylee\PrintNode\Response\WhoAmIResponse;
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
     * @var array
     */
    protected $headers = [
        'Content-Type' => 'application/json'
    ];

    /**
     * PrintNode constructor.
     * @param string $auth
     * @param int|null $child
     */
    public function __construct(string $auth, int $child = null)
    {
        $this->auth = $auth;

        if (!is_null($child)) {
            $this->addHeader('X-Child-Account-By-Id', $child);
        }
    }

    /**
     * @param int $child
     * @return self
     */
    public function getChildAccount(int $child): self
    {
        return new self($this->auth, $child);
    }

    /**
     * @param $name
     * @param $value
     * @return $this
     */
    protected function addHeader($name, $value): self
    {
        $this->headers[$name] = $value;

        return $this;
    }

    /**
     * @param $name
     * @return $this
     */
    protected function removeHeader($name): self
    {
        if (isset($this->headers[$name])) {
            unset($this->headers[$name]);
        }

        return $this;
    }

    /**
     * https://www.printnode.com/en/docs/api/curl#versioning
     *
     * @param string|null $version
     * @return $this
     */
    public function setVersion($version): self
    {
        (is_null($version)) ? $this->removeHeader('Accept-Version') : $this->addHeader('Accept-Version', $version);

        return $this;
    }

    /**
     * https://www.printnode.com/en/docs/api/curl#headers
     *
     * @param boolean $pretty
     * @return $this
     */
    public function setPretty($pretty): self
    {
        ($pretty) ? $this->addHeader('X-Pretty', '') : $this->removeHeader('X-Pretty');

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
