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
     * @param integer|null $child
     */
    public function __construct(string $auth, int $child = null)
    {
        $this->auth = $auth;

        if (!is_null($child)) {
            $this->addHeader('X-Child-Account-By-Id', $child);
        }
    }

    /**
     * @param integer $child
     * @return self
     */
    public function getChildAccount(int $child)
    {
        return new self($this->auth, $child);
    }

    /**
     * @param $name
     * @param $value
     * @return $this
     */
    protected function addHeader($name, $value)
    {
        $this->headers[$name] = $value;

        return $this;
    }

    /**
     * @param $name
     * @return $this
     */
    protected function removeHeader($name)
    {
        if (isset($this->headers[$name])) {
            unset($this->headers[$name]);
        }

        return $this;
    }

    /**
     * @param string|null $version
     * @return $this
     */
    public function setVersion($version)
    {
        (is_null($version)) ? $this->removeHeader('Accept-Version') : $this->addHeader('Accept-Version', $version);

        return $this;
    }

    /**
     * @param boolean $pretty
     * @return $this
     */
    public function setPretty($pretty)
    {
        ($pretty) ? $this->addHeader('X-Pretty', '') : $this->removeHeader('X-Pretty');

        return $this;
    }

    /**
     * @return WhoAmIResponse
     */
    public function getWhoAmI()
    {
        return (new WhoAmIRequest($this->auth, $this->headers))->getResponse();
    }

    /**
     * @param integer $computer
     * @return ComputerResponse
     */
    public function getComputer(int $computer)
    {
        return (new ComputerRequest($this->auth, $this->headers))->getResponse($computer);
    }

    /**
     * @return ComputersResponse
     */
    public function getComputers()
    {
        return (new ComputersRequest($this->auth, $this->headers))->getResponse();
    }

    /**
     * @param null|integer|array $computers
     * @return DeleteConfirmationResponse
     */
    public function deleteComputers($computers = null)
    {
        return (new ComputersDeleteRequest($this->auth, $this->headers))->getResponse($computers);
    }

    /**
     * @param integer $printer
     * @return PrinterResponse
     */
    public function getPrinter(int $printer)
    {
        return (new PrinterRequest($this->auth, $this->headers))->getResponse($printer);
    }

    /**
     * @return PrintersResponse
     */
    public function getPrinters()
    {
        return (new PrintersRequest($this->auth, $this->headers))->getResponse();
    }

    /**
     * @param null|integer|array $printers
     * @return DeleteConfirmationResponse
     */
    public function deletePrinters($printers = null)
    {
        return (new PrintersDeleteRequest($this->auth, $this->headers))->getResponse($printers);
    }

    /**
     * @param integer $computer
     * @param integer $printer
     * @return PrinterResponse
     */
    public function getComputerPrinter(int $computer, int $printer)
    {
        return (new ComputerPrinterRequest($this->auth, $this->headers))->getResponse($computer, $printer);
    }

    /**
     * @param integer $computer
     * @return PrintersResponse
     */
    public function getComputerPrinters(int $computer)
    {
        return (new ComputerPrintersRequest($this->auth, $this->headers))->getResponse($computer);
    }

    /**
     * @param integer $computer
     * @param null|integer|array $printers
     * @return DeleteConfirmationResponse
     */
    public function deleteComputerPrinters(int $computer, $printers = null)
    {
        return (new ComputerPrintersDeleteRequest($this->auth, $this->headers))->getResponse($computer, $printers);
    }

    /**
     * @return PrintJobRequestUrl
     */
    public function createPrintJobUrl()
    {
        return new PrintJobRequestUrl($this->auth, $this->headers);
    }

    /**
     * @return PrintJobRequestFile
     */
    public function createPrintJobFile()
    {
        return new PrintJobRequestFile($this->auth, $this->headers);
    }
}
