<?php
namespace App\Test\TestCase\Controller;

use App\Controller\BannersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\BannersController Test Case
 */
class BannersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Banners' => 'app.banners',
        'Properties' => 'app.properties',
        'Builders' => 'app.builders',
        'PropertyTypes' => 'app.property_types',
        'PropertySubtype' => 'app.property_subtype',
        'PropertypeLocations' => 'app.propertype_locations',
        'PropertySubtypes' => 'app.property_subtypes',
        'Locations' => 'app.locations',
        'Pages' => 'app.pages',
        'Sectors' => 'app.sectors',
        'FloorPlan' => 'app.floor_plan',
        'PriceManagement' => 'app.price_management',
        'Units' => 'app.units',
        'PropertyGalleries' => 'app.property_galleries'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
