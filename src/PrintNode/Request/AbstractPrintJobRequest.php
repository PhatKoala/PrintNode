<?php

namespace Bigstylee\PrintNode\Request;

use Bigstylee\PrintNode\Request\Authentication\AuthenticationInterface;
use Symfony\Component\HttpClient\CurlHttpClient;

/**
 * Class AbstractPrintJobRequest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
abstract class AbstractPrintJobRequest extends AbstractRequest
{
    /**
     * The id of the printer you wish to print to.
     *
     * @var int
     */
    protected $printer;

    /**
     * A title to give the print job. This is the name which will appear in the operating system's print queue.
     *
     * @var string
     */
    protected $title;

    /**
     * A text description of how the print job was created or where the print job originated.
     *
     * @var string
     */
    protected $source;

    /**
     * The maximum number of seconds PrintNode should retain this print job in the event that the print job cannot be printed immediately.
     *
     * @var int
     */
    protected $expiry;

    /**
     * A positive integer specifying the number of times this print job should be delivered to the print queue.
     *
     * @var int
     */
    protected $quantity = 1;

    /**
     * @var AuthenticationInterface
     */
    protected $authentication;

    /**
     * @var string
     */
    protected $tray;

    /**
     * @var bool
     */
    protected $collate;

    /**
     * @var int
     */
    protected $copies;

    /**
     * @var string
     */
    protected $dpi;

    /**
     * @var string
     */
    protected $duplex;

    /**
     * @var bool
     */
    protected $fitToPage;

    /**
     * @var string
     */
    protected $media;

    /**
     * @var int
     */
    protected $nup;

    /**
     * @var string
     */
    protected $pages;

    /**
     * @var string
     */
    protected $paper;

    /**
     * @var int
     */
    protected $rotate;

    /**
     * AbstractPrintJobRequest constructor.
     * @param $auth
     * @param array $headers
     * @param int $printer
     * @param string $title
     * @param string $source
     */
    public function __construct($auth, array $headers = [], int $printer, string $title, string $source)
    {
        parent::__construct($auth, $headers);

        $this
            ->setPrinter($printer)
            ->setTitle($title)
            ->setSource($source);
    }
}
