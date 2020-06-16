<?php
declare(strict_types=1);

namespace PhatKoala\PrintNode\Tests\Request;

use PhatKoala\PrintNode\Request\PrintJob\PrintJobPdfSource;
use PhatKoala\PrintNode\Request\RequestHeaders;
use PHPUnit\Framework\TestCase;

final class PrintJobPdfSourceTest extends TestCase
{
    public function testSetters()
    {
        $printJob = new PrintJobPdfSource('my-api-key', new RequestHeaders(), 17, 'Print Job File Title', 'Print Job File Source');
        $this->assertEquals('Print Job File Title', $printJob->getTitle());
        $this->assertEquals('Print Job File Source', $printJob->getSource());
    }
}
