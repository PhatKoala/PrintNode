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
    private $extent;

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
     * @param array $bins
     * @return PrinterCapabilitiesResponse
     */
    protected function setBins(array $bins): self
    {
        $this->bins = $bins;

        return $this;
    }

    /**
     * @param bool $collate
     * @return PrinterCapabilitiesResponse
     */
    protected function setCollate(bool $collate): self
    {
        $this->collate = $collate;

        return $this;
    }

    /**
     * @param bool $color
     * @return PrinterCapabilitiesResponse
     */
    protected function setColor(bool $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @param int $copies
     * @return PrinterCapabilitiesResponse
     */
    protected function setCopies(int $copies): self
    {
        $this->copies = $copies;

        return $this;
    }

    /**
     * @param array $dpis
     * @return PrinterCapabilitiesResponse
     */
    protected function setDpis(array $dpis): self
    {
        $this->dpis = $dpis;

        return $this;
    }

    /**
     * @param bool $duplex
     * @return PrinterCapabilitiesResponse
     */
    protected function setDuplex(bool $duplex): self
    {
        $this->duplex = $duplex;

        return $this;
    }

    /**
     * @param array $extent
     * @return PrinterCapabilitiesResponse
     */
    protected function setExtent(array $extent): self
    {
        $this->extent = $extent;

        return $this;
    }

    /**
     * @param array $medias
     * @return PrinterCapabilitiesResponse
     */
    protected function setMedias(array $medias): self
    {
        $this->medias = $medias;

        return $this;
    }

    /**
     * @param array $nup
     * @return PrinterCapabilitiesResponse
     */
    protected function setNup(array $nup): self
    {
        $this->nup = $nup;

        return $this;
    }

    /**
     * @param array $papers
     * @return PrinterCapabilitiesResponse
     */
    protected function setPapers(array $papers): self
    {
        $this->papers = $papers;

        return $this;
    }

    /**
     * @param array|null $printrate
     * @return PrinterCapabilitiesResponse
     */
    protected function setPrintrate(?array $printrate): self
    {
        $this->printrate = $printrate;

        return $this;
    }

    /**
     * @param bool $supportsCustomPaperSize
     * @return PrinterCapabilitiesResponse
     */
    protected function setSupportsCustomPaperSize(bool $supportsCustomPaperSize): self
    {
        $this->supportsCustomPaperSize = $supportsCustomPaperSize;

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
     * @return bool
     */
    public function isCollate(): bool
    {
        return $this->collate;
    }

    /**
     * @return bool
     */
    public function isColor(): bool
    {
        return $this->color;
    }

    /**
     * @return int
     */
    public function getCopies(): int
    {
        return $this->copies;
    }

    /**
     * @return array
     */
    public function getDpis(): array
    {
        return $this->dpis;
    }

    /**
     * @return bool
     */
    public function isDuplex(): bool
    {
        return $this->duplex;
    }

    /**
     * @return array
     */
    public function getExtent(): array
    {
        return $this->extent;
    }

    /**
     * @return array
     */
    public function getMedias(): array
    {
        return $this->medias;
    }

    /**
     * @return array
     */
    public function getNup(): array
    {
        return $this->nup;
    }

    /**
     * @return array
     */
    public function getPapers(): array
    {
        return $this->papers;
    }

    /**
     * @return array|null
     */
    public function getPrintrate(): ?array
    {
        return $this->printrate;
    }

    /**
     * @return bool
     */
    public function isSupportsCustomPaperSize(): bool
    {
        return $this->supportsCustomPaperSize;
    }
}
