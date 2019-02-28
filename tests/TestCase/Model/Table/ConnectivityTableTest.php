<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConnectivityTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConnectivityTable Test Case
 */
class ConnectivityTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Connectivity' => 'app.connectivity',
        'Properties' => 'app.properties',
        'Builders' => 'app.builders',
        'PropertyTypes' => 'app.property_types',
        'PropertySubtype' => 'app.property_subtype',
        'PropertypeLocations' => 'app.propertype_locations',
        'PropertySubtypes' => 'app.property_subtypes',
        'Locations' => 'app.locations',
        'Sectors' => 'app.sectors',
        'Banners' => 'app.banners',
        'FloorPlan' => 'app.floor_plan',
        'PriceManagement' => 'app.price_management',
        'Units' => 'app.units',
        'PropertyGalleries' => 'app.property_galleries',
        'Amenities' => 'app.amenities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Connectivity') ? [] : ['className' => 'App\Model\Table\ConnectivityTable'];
        $this->Connectivity = TableRegistry::get('Connectivity', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Connectivity);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
