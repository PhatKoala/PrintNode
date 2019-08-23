<?php
declare(strict_types=1);

namespace Bigstylee\PrintNode\Tests\Request;

use Bigstylee\PrintNode\Request\PrintJob\PrintJobFile;
use PHPUnit\Framework\TestCase;

/**
 * Class PrintJobFileTest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
final class PrintJobFileTest extends TestCase
{
    public function testSetters()
    {
        $printJob = new PrintJobFile(null, [], 17, 'Print Job File Title', 'Print Job File Source');
        $this->assertEquals('Print Job File Title', $printJob->getTitle());
        $this->assertEquals('Print Job File Source', $printJob->getSource());
    }
}
