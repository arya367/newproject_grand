<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PriceManagementTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PriceManagementTable Test Case
 */
class PriceManagementTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'PriceManagement' => 'app.price_management',
        'Properties' => 'app.properties',
        'Builders' => 'app.builders',
        'PropertyTypes' => 'app.property_types',
        'PropertySubtype' => 'app.property_subtype',
        'PropertypeLocations' => 'app.propertype_locations',
        'PropertySubtypes' => 'app.property_subtypes',
        'Locations' => 'app.locations',
        'Pages' => 'app.pages',
        'Sectors' => 'app.sectors',
        'Banners' => 'app.banners',
        'FloorPlan' => 'app.floor_plan',
        'PropertyGalleries' => 'app.property_galleries',
        'Units' => 'app.units'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PriceManagement') ? [] : ['className' => 'App\Model\Table\PriceManagementTable'];
        $this->PriceManagement = TableRegistry::get('PriceManagement', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PriceManagement);

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
