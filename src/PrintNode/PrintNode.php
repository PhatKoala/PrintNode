<?php

namespace Bigstylee\PrintNode;

use Bigstylee\PrintNode\Request\ComputerPrinterRequest;
use Bigstylee\PrintNode\Request\ComputerPrintersDeleteRequest;
use Bigstylee\PrintNode\Request\ComputerPrintersRequest;
use Bigstylee\PrintNode\Request\ComputerRequest;
use Bigstylee\PrintNode\Request\ComputersDeleteRequest;
use Bigstylee\PrintNode\Request\ComputersRequest;
use Bigstylee\PrintNode\Request\PrinterRequest;
use Bigstylee\PrintNode\Request\PrintersDeleteRequest;
use Bigstylee\PrintNode\Request\PrintersRequest;
use Bigstylee\PrintNode\Request\PrintJobRequestFile;
use Bigstylee\PrintNode\Request\PrintJobRequestUrl;
use Bigstylee\PrintNode\Request\WhoAmIRequest;
use Bigstylee\PrintNode\Response\ComputerResponse;
use Bigstylee\PrintNode\Response\ComputersResponse;
use Bigstylee\PrintNode\Response\DeleteConfirmationResponse;
use Bigstylee\PrintNode\Response\PrinterResponse;
use Bigstylee\PrintNode\Response\PrintersResponse;
use Bigstylee\PrintNode\Response\WhoAmIResponse;

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
     */
    public function getWhoAmI(): WhoAmIResponse
    {
        return (new WhoAmIRequest($this->auth, $this->headers))->getResponse();
    }

    /**
     * @param int $computer
     * @return ComputerResponse
     */
    public function getComputer(int $computer): ComputerResponse
    {
        return (new ComputerRequest($this->auth, $this->headers))->getResponse($computer);
    }

    /**
     * @return ComputersResponse
     */
    public function getComputers(): ComputersResponse
    {
        return (new ComputersRequest($this->auth, $this->headers))->getResponse();
    }

    /**
     * @param null|int|array $computers
     * @return DeleteConfirmationResponse
     */
    public function deleteComputers($computers = null): DeleteConfirmationResponse
    {
        return (new ComputersDeleteRequest($this->auth, $this->headers))->getResponse($computers);
    }

    /**
     * @param int $printer
     * @return PrinterResponse
     */
    public function getPrinter(int $printer): PrinterResponse
    {
        return (new PrinterRequest($this->auth, $this->headers))->getResponse($printer);
    }

    /**
     * @return PrintersResponse
     */
    public function getPrinters(): PrintersResponse
    {
        return (new PrintersRequest($this->auth, $this->headers))->getResponse();
    }

    /**
     * @param null|int|array $printers
     * @return DeleteConfirmationResponse
     */
    public function deletePrinters($printers = null): DeleteConfirmationResponse
    {
        return (new PrintersDeleteRequest($this->auth, $this->headers))->getResponse($printers);
    }

    /**
     * @param int $computer
     * @param int $printer
     * @return PrinterResponse
     */
    public function getComputerPrinter(int $computer, int $printer): PrinterResponse
    {
        return (new ComputerPrinterRequest($this->auth, $this->headers))->getResponse($computer, $printer);
    }

    /**
     * @param int $computer
     * @return PrintersResponse
     */
    public function getComputerPrinters(int $computer): PrintersResponse
    {
        return (new ComputerPrintersRequest($this->auth, $this->headers))->getResponse($computer);
    }

    /**
     * @param int $computer
     * @param null|int|array $printers
     * @return DeleteConfirmationResponse
     */
    public function deleteComputerPrinters(int $computer, $printers = null): DeleteConfirmationResponse
    {
        return (new ComputerPrintersDeleteRequest($this->auth, $this->headers))->getResponse($computer, $printers);
    }

    /**
     * @param int $printer
     * @param string $title
     * @param string $source
     * @return PrintJobRequestUrl
     */
    public function createPrintJobUrl(int $printer, string $title, string $source): PrintJobRequestUrl
    {
        return new PrintJobRequestUrl($this->auth, $this->headers, $printer, $title, $source);
    }

    /**
     * @param int $printer
     * @param string $title
     * @param string $source
     * @return PrintJobRequestFile
     */
    public function createPrintJobFile(int $printer, string $title, string $source): PrintJobRequestFile
    {
        return new PrintJobRequestFile($this->auth, $this->headers, $printer, $title, $source);
    }
}
