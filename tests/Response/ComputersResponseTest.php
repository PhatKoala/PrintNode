<?php
declare(strict_types=1);

namespace PhatKoala\PrintNode\Tests\Response;

use PhatKoala\PrintNode\Response\ComputerResponse;
use PhatKoala\PrintNode\Response\ComputersResponse;
use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * Class ComputerResponseTest
 * @author Stewart Walter <code@phatkoala.uk>
 */
final class ComputersResponseTest extends TestCase
{
    public function testSetters()
    {
        $response = new ComputersResponse([[
            'id' => 12,
            'name' => 'AnalyticalEngine',
            'inet' => null,
            'inet6' => null,
            'hostname' => null,
            'version' => null,
            'jre' => null,
            'createTimestamp' => '2015-11-16T23:14:12.354Z',
            'state' => 'disconnected'
        ], [
            'id' => 13,
            'name' => 'TUNSTEN',
            'inet' => '192.168.56.1',
            'inet6' => null,
            'hostname' => 'Pete@TUNGSTEN',
            'version' => '4.8.1',
            'jre' => null,
            'createTimestamp' => '2015-11-17T13:02:36.589Z',
            'state' => 'disconnected'
        ], [
            'id' => 14,
            'name' => 'TUNGSTEN',
            'inet' => '192.168.56.1',
            'inet6' => null,
            'hostname' => 'Pete@TUNGSTEN',
            'version' => '4.8.3',
            'jre' => null,
            'createTimestamp' => '2015-11-17T16:06:24.644Z',
            'state' => 'disconnected'
        ]]);

        /**
         * @var ComputerResponse $computer0
         */
        $computer0 = $response[0];
        $this->assertInstanceOf(ComputerResponse::class, $computer0);
        $this->assertEquals(12, $computer0->getId());
        $this->assertEquals('AnalyticalEngine', $computer0->getName());
        $this->assertEquals(null, $computer0->getInet());
        $this->assertEquals(null, $computer0->getInet6());
        $this->assertEquals(null, $computer0->getHostname());
        $this->assertEquals(null, $computer0->getVersion());
        $this->assertEquals(null, $computer0->getJre());
        $this->assertEquals('2015-11-16T23:14:12.354Z', $computer0->getCreateTimestamp()->format('Y-m-d\TH:i:s.v\Z'));
        $this->assertEquals('disconnected', $computer0->getState());

        /**
         * @var ComputerResponse $computer1
         */
        $computer1 = $response[1];
        $this->assertInstanceOf(ComputerResponse::class, $computer1);
        $this->assertEquals(13, $computer1->getId());
        $this->assertEquals('TUNSTEN', $computer1->getName());
        $this->assertEquals('192.168.56.1', $computer1->getInet());
        $this->assertEquals(null, $computer1->getInet6());
        $this->assertEquals('Pete@TUNGSTEN', $computer1->getHostname());
        $this->assertEquals('4.8.1', $computer1->getVersion());
        $this->assertEquals(null, $computer1->getJre());
        $this->assertEquals('2015-11-17T13:02:36.589Z', $computer1->getCreateTimestamp()->format('Y-m-d\TH:i:s.v\Z'));
        $this->assertEquals('disconnected', $computer1->getState());

        /**
         * @var ComputerResponse $computer2
         */
        $computer2 = $response[2];
        $this->assertInstanceOf(ComputerResponse::class, $computer2);
        $this->assertEquals(14, $computer2->getId());
        $this->assertEquals('TUNGSTEN', $computer2->getName());
        $this->assertEquals('192.168.56.1', $computer2->getInet());
        $this->assertEquals(null, $computer2->getInet6());
        $this->assertEquals('Pete@TUNGSTEN', $computer2->getHostname());
        $this->assertEquals('4.8.3', $computer2->getVersion());
        $this->assertEquals(null, $computer2->getJre());
        $this->assertEquals('2015-11-17T16:06:24.644Z', $computer2->getCreateTimestamp()->format('Y-m-d\TH:i:s.v\Z'));
        $this->assertEquals('disconnected', $computer2->getState());
    }
}
