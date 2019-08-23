<?php
declare(strict_types=1);

namespace Bigstylee\PrintNode\Tests\Response;

use Bigstylee\PrintNode\Response\WhoAmIResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class WhoAmIResponseTest
 * @author Stewart Walter <code@bigstylee.co.uk>
 */
final class WhoAmIResponseTest extends TestCase
{
    public function testSetters()
    {
        $response = new WhoAmIResponse([
            'id' => 433,
            'firstname' => 'Peter',
            'lastname' => 'Tuthill',
            'email' => 'peter@omlet.co.uk',
            'canCreateSubAccounts' => false,
            'creatorEmail' => null,
            'creatorRef' => null,
            'childAccounts' => [],
            'credits' => 10134,
            'numComputers' => 3,
            'totalPrints' => 110,
            'versions' => [],
            'connected' => [],
            'Tags' => [],
            'state' => 'active',
            "permissions" => [
                "Unrestricted"
            ]
        ]);

        $this->assertEquals(433, $response->getId());
        $this->assertEquals('Peter', $response->getFirstname());
        $this->assertEquals('Tuthill', $response->getLastname());
        $this->assertEquals(false, $response->isCanCreateSubAccounts());
        $this->assertEquals(null, $response->getCreatorEmail());
        $this->assertEquals(null, $response->getCreatorRef());
        $this->assertEquals(10134, $response->getCredits());
        $this->assertEquals(3, $response->getNumComputers());
        $this->assertEquals(110, $response->getTotalPrints());
        $this->assertEquals([], $response->getVersions());
        $this->assertEquals([], $response->getConnected());
        $this->assertEquals([], $response->getTags());
        $this->assertEquals('active', $response->getState());
        $this->assertEquals(['Unrestricted'], $response->getPermissions());
    }
}
