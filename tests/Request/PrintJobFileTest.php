<?php
declare(strict_types=1);

namespace PhatKoala\PrintNode\Tests\Request;

use PhatKoala\PrintNode\Request\PrintJob\PrintJobFile;
use PhatKoala\PrintNode\Request\RequestHeaders;
use PHPUnit\Framework\TestCase;

/**
 * Class PrintJobFileTest
 * @author Stewart Walter <code@phatkoala.uk>
 */
final class PrintJobFileTest extends TestCase
{
    public function testSetters()
    {
        $printJob = new PrintJobFile('my-api-key', new RequestHeaders(), 17, 'Print Job File Title', 'Print Job File Source');
        $this->assertEquals('Print Job File Title', $printJob->getTitle());
        $this->assertEquals('Print Job File Source', $printJob->getSource());
    }
}
