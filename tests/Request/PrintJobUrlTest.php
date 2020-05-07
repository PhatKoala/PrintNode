<?php
declare(strict_types=1);

namespace PhatKoala\PrintNode\Tests\Request;

use PhatKoala\PrintNode\Request\PrintJob\PrintJobFile;
use PhatKoala\PrintNode\Request\PrintJob\PrintJobUrl;
use PhatKoala\PrintNode\Request\RequestHeaders;
use PHPUnit\Framework\TestCase;

/**
 * Class PrintJobUrlTest
 * @author Stewart Walter <code@phatkoala.uk>
 */
final class PrintJobUrlTest extends TestCase
{
    public function testSetters()
    {
        $printJob = new PrintJobUrl('my-api-key', new RequestHeaders(), 17, 'Print Job Url Title', 'Print Job Url Source');
        $this->assertEquals('Print Job Url Title', $printJob->getTitle());
        $this->assertEquals('Print Job Url Source', $printJob->getSource());
    }
}
