<?php

namespace Bigstylee\PrintNode\Response;

/**
 * Class PrinterCapabilitiesResponse
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
class PrinterCapabilitiesResponse extends AbstractResponse
{
    /**
     * @var array
     */
    private $bins;

    /**
     * @var boolean
     */
    private $collate;

    /**
     * @var boolean
     */
    private $color;

    /**
     * @var integer
     */
    private $copies;

    /**
     * @var array
     */
    private $dpis;

    /**
     * @var boolean
     */
    private $duplex;

    /**
     * @var array
     */
    private $extend;

    /**
     * @var array
     */
    private $medias;

    /**
     * @var array
     */
    private $nup;

    /**
     * @var array
     */
    private $papers;

    /**
     * @var array|null
     */
    private $printrate;

    /**
     * @var boolean
     */
    private $supportsCustomPaperSize;

    /**
     * @return ResponseHeaders|null
     */
    public function getHeaders(): ?ResponseHeaders
    {
        return $this->headers;
    }

    /**
     * @param ResponseHeaders|null $headers
     * @return PrinterCapabilitiesResponse
     */
    public function setHeaders(?ResponseHeaders $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return array
     */
    public function getBins(): array
    {
        return $this->bins;
    }

    /**
     * @param array $bins
     * @return PrinterCapabilitiesResponse
     */
    public function setBins(array $bins)
    {
        $this->bins = $bins;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCollate(): bool
    {
        return $this->collate;
    }

    /**
     * @param bool $collate
     * @return PrinterCapabilitiesResponse
     */
    public function setCollate(bool $collate)
    {
        $this->collate = $collate;

        return $this;
    }

    /**
     * @return bool
     */
    public function isColor(): bool
    {
        return $this->color;
    }

    /**
     * @param bool $color
     * @return PrinterCapabilitiesResponse
     */
    public function setColor(bool $color)
    {
        $this->color = $color;

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
     * @return PrinterCapabilitiesResponse
     */
    public function setCopies(int $copies)
    {
        $this->copies = $copies;

        return $this;
    }

    /**
     * @return array
     */
    public function getDpis(): array
    {
        return $this->dpis;
    }

    /**
     * @param array $dpis
     * @return PrinterCapabilitiesResponse
     */
    public function setDpis(array $dpis)
    {
        $this->dpis = $dpis;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDuplex(): bool
    {
        return $this->duplex;
    }

    /**
     * @param bool $duplex
     * @return PrinterCapabilitiesResponse
     */
    public function setDuplex(bool $duplex)
    {
        $this->duplex = $duplex;

        return $this;
    }

    /**
     * @return array
     */
    public function getExtend(): array
    {
        return $this->extend;
    }

    /**
     * @param array $extend
     * @return PrinterCapabilitiesResponse
     */
    public function setExtend(array $extend)
    {
        $this->extend = $extend;

        return $this;
    }

    /**
     * @return array
     */
    public function getMedias(): array
    {
        return $this->medias;
    }

    /**
     * @param array $medias
     * @return PrinterCapabilitiesResponse
     */
    public function setMedias(array $medias)
    {
        $this->medias = $medias;

        return $this;
    }

    /**
     * @return array
     */
    public function getNup(): array
    {
        return $this->nup;
    }

    /**
     * @param array $nup
     * @return PrinterCapabilitiesResponse
     */
    public function setNup(array $nup)
    {
        $this->nup = $nup;

        return $this;
    }

    /**
     * @return array
     */
    public function getPapers(): array
    {
        return $this->papers;
    }

    /**
     * @param array $papers
     * @return PrinterCapabilitiesResponse
     */
    public function setPapers(array $papers)
    {
        $this->papers = $papers;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getPrintrate(): ?array
    {
        return $this->printrate;
    }

    /**
     * @param array|null $printrate
     * @return PrinterCapabilitiesResponse
     */
    public function setPrintrate(?array $printrate)
    {
        $this->printrate = $printrate;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSupportsCustomPaperSize(): bool
    {
        return $this->supportsCustomPaperSize;
    }

    /**
     * @param bool $supportsCustomPaperSize
     * @return PrinterCapabilitiesResponse
     */
    public function setSupportsCustomPaperSize(bool $supportsCustomPaperSize)
    {
        $this->supportsCustomPaperSize = $supportsCustomPaperSize;

        return $this;
    }
}
