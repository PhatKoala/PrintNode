<?php

namespace Bigstylee\PrintNode\Request\PrintJob;

use Bigstylee\PrintNode\Request\AbstractRequest;
use Bigstylee\PrintNode\Request\PrintJob\Authentication\AuthenticationInterface;

/**
 * Class AbstractPrintJob
 * @author Stewart Walter <code@bigstylee.co.uk>
 *
 * https://www.printnode.com/en/docs/api/curl#printjob-options
 */
abstract class AbstractPrintJob extends AbstractRequest
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
     * The current default is 14 days or 1,209,600 seconds.
     *
     * @var int
     */
    protected $expireAfter = 1209600;

    /**
     * A positive integer specifying the number of times this print job should be delivered to the print queue.
     *
     * The default value is 1.
     *
     * @var int
     */
    protected $quantity = 1;

    /**
     * @var AuthenticationInterface|null
     */
    protected $authentication;

    /**
     * The name of one of the paper trays or output bins reported by the printer capability property bins.
     *
     * @var string|null
     */
    protected $bin;

    /**
     * Enables print copy collation when printing multiple copies. If this option is not specified the printer default is used.
     *
     * @var bool|null
     */
    protected $collate;

    /**
     * Positive integer. Default 1. The number of copies to be printed. Maximum value as reported by the printer capability property copies.
     *
     * @var int
     */
    protected $copies = 1;

    /**
     * The dpi setting to use for this print job. Allowed values are those reported by the printer capability property dpis.
     *
     * @var string|null
     */
    protected $dpi;

    /**
     * One of long-edge or short-edge for two-sided printing along the long-edge (portrait) or the short edge (landscape) respectively.
     * If this option is not specified the printer default is used.
     *
     * @var string
     */
    protected $duplex;

    /**
     * Set this to true to automatically fit the document to the page. In Windows, this option is only supported when using the "Engine6" printing backend.
     *
     * @var bool|null
     */
    protected $fitToPage;

    /**
     * The name of the medium to use for this print job. This must be one of the values reported by the printer capability property medias.
     * Some printers on macOS / OS X ignore this setting unless the bin (paper tray) option is also set.
     *
     * @var string|null
     */
    protected $media;

    /**
     * macOS / OS X only. Allows support for printing muliple pages per physical sheet of paper. Default 1.
     * This must be one of the values reported by the printer capability property nup.
     *
     * @var int|null
     */
    protected $nup;

    /**
     * A set of pages to print from a PDF. The format is the same as the one commonly used in print dialogs in applications. A few examples:
     *
     * 1,3 prints pages 1 and 3.
     * -5 prints pages 1 through 5 inclusive.
     * - prints all pages.
     * 1,3- prints all pages except page 2.
     *
     * @var string|null
     */
    protected $pages;

    /**
     * The name of the paper size to use. This must be one of the keys in the object returned by the printer capability property papers.
     *
     * @var string|null
     */
    protected $paper;

    /**
     * One of 0, 90, 180 or 270. This sets the rotation angle of each page in the print – 0 for portrait, 90 for landscape, 180 for inverted portrait and 270 for inverted landscape.
     * This setting is absolute and not relative. For example, if your PDF document is in landscape format, setting this option to 90 will leave it unchanged.
     *
     * We have found that not all printers and printer drivers support this feature to the same degree.
     * For instance, in Windows the 180 and 270 settings are often respectively treated like 0 and 90, i.e. they switch between portrait and landscape but do not invert the print.
     *
     * @var int|null
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

    /**
     * @return array
     */
    protected function buildRequest(): array
    {
        $options = array_filter([
            'bin' => $this->getBin(),
            'collate' => $this->getCollate(),
            'copies' => $this->getCopies(),
            'dpi' => $this->getDpi(),
            'duplex' => $this->getDuplex(),
            'fit_to_page' => $this->getFitToPage(),
            'media' => $this->getMedia(),
            'nup' => $this->getNup(),
            'pages' => $this->getPages(),
            'paper' => $this->getPaper(),
            'rotate' => $this->getRotate(),
        ], function ($value) {
            return !is_null($value);
        });

        return array_filter([
            'printer' => $this->getPrinter(),
            'title' => $this->getTitle(),
            'source' => $this->getSource(),
            'expireAfter' => $this->getExpireAfter(),
            'qty' => $this->getQuantity(),
            'authentication' => (!is_null($this->getAuthentication()) ? $this->getAuthentication()->buildRequest() : null),
            'options' => $options,
        ], function ($value){
            return !is_null($value);
        });
    }

    /**
     * @return int
     */
    public function getPrinter(): int
    {
        return $this->printer;
    }

    /**
     * @param int $printer
     * @return AbstractPrintJob
     */
    public function setPrinter(int $printer)
    {
        $this->printer = $printer;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return AbstractPrintJob
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return AbstractPrintJob
     */
    public function setSource(string $source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpireAfter(): int
    {
        return $this->expireAfter;
    }

    /**
     * @param int $seconds
     * @return AbstractPrintJob
     */
    public function setExpireAfter(int $seconds)
    {
        $this->expireAfter = $seconds;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return AbstractPrintJob
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return AuthenticationInterface|null
     */
    public function getAuthentication(): ?AuthenticationInterface
    {
        return $this->authentication;
    }

    /**
     * @param AuthenticationInterface|null $authentication
     * @return AbstractPrintJob
     */
    public function setAuthentication(?AuthenticationInterface $authentication)
    {
        $this->authentication = $authentication;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBin(): ?string
    {
        return $this->bin;
    }

    /**
     * @param string|null $bin
     * @return AbstractPrintJob
     */
    public function setBin(?string $bin)
    {
        $this->bin = $bin;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCollate(): ?bool
    {
        return $this->collate;
    }

    /**
     * @param bool|null $collate
     * @return AbstractPrintJob
     */
    public function setCollate(?bool $collate)
    {
        $this->collate = $collate;

        return $this;
    }

    /**
     * @return int
     */
    public function getCopies(): int
    {
        return $this->copies;
    }

    /**
     * @param int $copies
     * @return AbstractPrintJob
     */
    public function setCopies(int $copies)
    {
        $this->copies = $copies;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDpi(): ?string
    {
        return $this->dpi;
    }

    /**
     * @param string|null $dpi
     * @return AbstractPrintJob
     */
    public function setDpi(?string $dpi)
    {
        $this->dpi = $dpi;

        return $this;
    }

    /**
     * @return string
     */
    public function getDuplex(): string
    {
        return $this->duplex;
    }

    /**
     * @param bool $duplex
     * @return AbstractPrintJob
     */
    public function setDuplex(bool $duplex)
    {
        $this->duplex = ($duplex) ? 'long-edge' : 'one-sided';

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getFitToPage(): ?bool
    {
        return $this->fitToPage;
    }

    /**
     * @param bool|null $fitToPage
     * @return AbstractPrintJob
     */
    public function setFitToPage(?bool $fitToPage)
    {
        $this->fitToPage = $fitToPage;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMedia(): ?string
    {
        return $this->media;
    }

    /**
     * @param string|null $media
     * @return AbstractPrintJob
     */
    public function setMedia(?string $media)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNup(): ?int
    {
        return $this->nup;
    }

    /**
     * @param int|null $nup
     * @return AbstractPrintJob
     */
    public function setNup(?int $nup)
    {
        $this->nup = $nup;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPages(): ?string
    {
        return $this->pages;
    }

    /**
     * @param string|null $pages
     * @return AbstractPrintJob
     */
    public function setPages(?string $pages)
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaper(): ?string
    {
        return $this->paper;
    }

    /**
     * @param string|null $paper
     * @return AbstractPrintJob
     */
    public function setPaper(?string $paper)
    {
        $this->paper = $paper;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getRotate(): ?int
    {
        return $this->rotate;
    }

    /**
     * @param int|null $rotate
     * @return AbstractPrintJob
     */
    public function setRotate(?int $rotate)
    {
        $this->rotate = $rotate;

        return $this;
    }
}
