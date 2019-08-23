<?php
declare(strict_types=1);

namespace Bigstylee\PrintNode\Tests\Response;

use Bigstylee\PrintNode\Response\ComputerResponse;
use Bigstylee\PrintNode\Response\ComputersResponse;
use Bigstylee\PrintNode\Response\PrinterCapabilitiesResponse;
use Bigstylee\PrintNode\Response\PrinterResponse;
use Bigstylee\PrintNode\Response\PrintersResponse;
use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * Class PrintersResponseTest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
final class PrintersResponseTest extends TestCase
{
    public function testSetters()
    {
        $response = new PrintersResponse(
            [
                [
                    'id' => 34,
                    'computer' => [
                        'id' => 12,
                        'name' => 'AnalyticalEngine',
                        'inet' => null,
                        'inet6' => null,
                        'hostname' => null,
                        'version' => null,
                        'jre' => null,
                        'createTimestamp' => '2015-11-16T23:14:12.354Z',
                        'state' => 'disconnected',
                    ],
                    'name' => 'Printer 2',
                    'description' => 'Test Printer 2',
                    'capabilities' => null,
                    'default' => null,
                    'createTimestamp' => '2015-11-16T23:14:12.354Z',
                    'state' => 'out_of_paper',
                ],
                [
                    'id' => 36,
                    'computer' => [
                        'id' => 12,
                        'name' => 'AnalyticalEngine',
                        'inet' => null,
                        'inet6' => null,
                        'hostname' => null,
                        'version' => null,
                        'jre' => null,
                        'createTimestamp' => '2015-11-16T23:14:12.354Z',
                        'state' => 'disconnected',
                    ],
                    'name' => 'Printer 4',
                    'description' => 'Test Printer 4',
                    'capabilities' => null,
                    'default' => null,
                    'createTimestamp' => '2015-11-16T23:14:12.354Z',
                    'state' => 'error',
                ],
                [
                    'id' => 37,
                    'computer' => [
                        'id' => 12,
                        'name' => 'AnalyticalEngine',
                        'inet' => null,
                        'inet6' => null,
                        'hostname' => null,
                        'version' => null,
                        'jre' => null,
                        'createTimestamp' => '2015-11-16T23:14:12.354Z',
                        'state' => 'disconnected',
                    ],
                    'name' => 'Printer 5',
                    'description' => 'Test Printer 5',
                    'capabilities' => null,
                    'default' => null,
                    'createTimestamp' => '2015-11-16T23:14:12.354Z',
                    'state' => 'idle',
                ],
                [
                    'id' => 39,
                    'computer' => [
                        'id' => 13,
                        'name' => 'TUNSTEN',
                        'inet' => '192.168.56.1',
                        'inet6' => null,
                        'hostname' => 'Pete@TUNGSTEN',
                        'version' => '4.8.1',
                        'jre' => null,
                        'createTimestamp' => '2015-11-17T13:02:36.589Z',
                        'state' => 'disconnected',
                    ],
                    'name' => 'Microsoft XPS Document Writer',
                    'description' => 'Microsoft XPS Document Writer',
                    'capabilities' => [
                        'bins' => [
                            'Automatically Select',
                        ],
                        'collate' => false,
                        'color' => true,
                        'copies' => 1,
                        'dpis' => [
                            '600x600',
                        ],
                        'duplex' => false,
                        'extent' => [
                            [
                                900,
                                900,
                            ],
                            [
                                8636,
                                11176,
                            ],
                        ],
                        'medias' => [],
                        'nup' => [],
                        'papers' => [
                            'A3' => [
                                2970,
                                4200,
                            ],
                            'A4' => [
                                2100,
                                2970,
                            ],
                            'A5' => [
                                1480,
                                2100,
                            ],
                        ],
                        'printrate' => null,
                        'supports_custom_paper_size' => false,
                    ],
                    'default' => false,
                    'createTimestamp' => '2015-11-17T13:02:37.224Z',
                    'state' => 'online',
                ]
            ]
        );

        /**
         * @var PrinterResponse $printer0
         */
        $printer0 = $response[0];
        $this->assertInstanceOf(PrinterResponse::class, $printer0);
        $this->assertEquals(34, $printer0->getId());
        $this->assertEquals('Printer 2', $printer0->getName());
        $this->assertEquals('Test Printer 2', $printer0->getDescription());
        $this->assertEquals(null, $printer0->getCapabilities());
        $this->assertEquals(null, $printer0->getDefault());
        $this->assertEquals('2015-11-16T23:14:12.354Z', $printer0->getCreateTimestamp()->format('Y-m-d\TH:i:s.v\Z'));
        $this->assertEquals('out_of_paper', $printer0->getState());

        /**
         * @var ComputerResponse $computer0
         */
        $computer0 = $printer0->getComputer();
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
         * @var PrinterResponse $printer1
         */
        $printer1 = $response[1];
        $this->assertInstanceOf(PrinterResponse::class, $printer1);
        $this->assertEquals(36, $printer1->getId());
        $this->assertEquals('Printer 4', $printer1->getName());
        $this->assertEquals('Test Printer 4', $printer1->getDescription());
        $this->assertEquals(null, $printer1->getCapabilities());
        $this->assertEquals(null, $printer1->getDefault());
        $this->assertEquals('2015-11-16T23:14:12.354Z', $printer1->getCreateTimestamp()->format('Y-m-d\TH:i:s.v\Z'));
        $this->assertEquals('error', $printer1->getState());

        /**
         * @var ComputerResponse $computer1
         */
        $computer1 = $printer1->getComputer();
        $this->assertInstanceOf(ComputerResponse::class, $computer1);
        $this->assertEquals(12, $computer1->getId());
        $this->assertEquals('AnalyticalEngine', $computer1->getName());
        $this->assertEquals(null, $computer1->getInet());
        $this->assertEquals(null, $computer1->getInet6());
        $this->assertEquals(null, $computer1->getHostname());
        $this->assertEquals(null, $computer1->getVersion());
        $this->assertEquals(null, $computer1->getJre());
        $this->assertEquals('2015-11-16T23:14:12.354Z', $computer1->getCreateTimestamp()->format('Y-m-d\TH:i:s.v\Z'));
        $this->assertEquals('disconnected', $computer1->getState());

        /**
         * @var PrinterResponse $printer2
         */
        $printer2 = $response[2];
        $this->assertInstanceOf(PrinterResponse::class, $printer2);
        $this->assertEquals(37, $printer2->getId());
        $this->assertEquals('Printer 5', $printer2->getName());
        $this->assertEquals('Test Printer 5', $printer2->getDescription());
        $this->assertEquals(null, $printer2->getCapabilities());
        $this->assertEquals(null, $printer2->getDefault());
        $this->assertEquals('2015-11-16T23:14:12.354Z', $printer2->getCreateTimestamp()->format('Y-m-d\TH:i:s.v\Z'));
        $this->assertEquals('idle', $printer2->getState());

        /**
         * @var ComputerResponse $computer2
         */
        $computer2 = $printer2->getComputer();
        $this->assertInstanceOf(ComputerResponse::class, $computer2);
        $this->assertEquals(12, $computer2->getId());
        $this->assertEquals('AnalyticalEngine', $computer2->getName());
        $this->assertEquals(null, $computer2->getInet());
        $this->assertEquals(null, $computer2->getInet6());
        $this->assertEquals(null, $computer2->getHostname());
        $this->assertEquals(null, $computer2->getVersion());
        $this->assertEquals(null, $computer2->getJre());
        $this->assertEquals('2015-11-16T23:14:12.354Z', $computer2->getCreateTimestamp()->format('Y-m-d\TH:i:s.v\Z'));
        $this->assertEquals('disconnected', $computer2->getState());

        /**
         * @var PrinterResponse $printer3
         */
        $printer3 = $response[3];
        $this->assertInstanceOf(PrinterResponse::class, $printer3);
        $this->assertEquals(39, $printer3->getId());
        $this->assertEquals('Microsoft XPS Document Writer', $printer3->getName());
        $this->assertEquals('Microsoft XPS Document Writer', $printer3->getDescription());
        $this->assertEquals(false, $printer3->getDefault());
        $this->assertEquals('2015-11-17T13:02:37.224Z', $printer3->getCreateTimestamp()->format('Y-m-d\TH:i:s.v\Z'));
        $this->assertEquals('online', $printer3->getState());

        /**
         * @var ComputerResponse $computer2
         */
        $computer3 = $printer3->getComputer();
        $this->assertInstanceOf(ComputerResponse::class, $computer3);
        $this->assertEquals(13, $computer3->getId());
        $this->assertEquals('TUNSTEN', $computer3->getName());
        $this->assertEquals('192.168.56.1', $computer3->getInet());
        $this->assertEquals(null, $computer3->getInet6());
        $this->assertEquals('Pete@TUNGSTEN', $computer3->getHostname());
        $this->assertEquals('4.8.1', $computer3->getVersion());
        $this->assertEquals(null, $computer3->getJre());
        $this->assertEquals('2015-11-17T13:02:36.589Z', $computer3->getCreateTimestamp()->format('Y-m-d\TH:i:s.v\Z'));
        $this->assertEquals('disconnected', $computer3->getState());

        /**
         * @var PrinterCapabilitiesResponse $capabilities3
         */
        $capabilities3 = $printer3->getCapabilities();
        $this->assertEquals(['Automatically Select'], $capabilities3->getBins());
        $this->assertEquals(false, $capabilities3->isCollate());
        $this->assertEquals(true, $capabilities3->isColor());
        $this->assertEquals(1, $capabilities3->getCopies());
        $this->assertEquals(['600x600'], $capabilities3->getDpis());
        $this->assertEquals(false, $capabilities3->isDuplex());
        $this->assertEquals([[900, 900], [8636, 11176]], $capabilities3->getExtent());
        $this->assertEquals([], $capabilities3->getMedias());
        $this->assertEquals([], $capabilities3->getNup());
        $this->assertEquals(['A3' => [2970, 4200], 'A4' => [2100, 2970], 'A5' => [1480, 2100]], $capabilities3->getPapers());
        $this->assertEquals(null, $capabilities3->getPrintrate());
        $this->assertEquals(false, $capabilities3->isSupportsCustomPaperSize());
    }
}
