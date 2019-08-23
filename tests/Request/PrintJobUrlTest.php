<?php
declare(strict_types=1);

namespace Bigstylee\PrintNode\Tests\Request;

use Bigstylee\PrintNode\Request\PrintJob\PrintJobFile;
use Bigstylee\PrintNode\Request\PrintJob\PrintJobUrl;
use Bigstylee\PrintNode\Request\RequestHeaders;
use PHPUnit\Framework\TestCase;

/**
 * Class PrintJobUrlTest
 * @author Stewart Walter <code@bigstylee.co.uk>
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
