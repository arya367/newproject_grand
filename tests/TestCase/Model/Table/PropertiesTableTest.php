<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PropertiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PropertiesTable Test Case
 */
class PropertiesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'PriceManagement' => 'app.price_management',
        'PropertyGalleries' => 'app.property_galleries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Properties') ? [] : ['className' => 'App\Model\Table\PropertiesTable'];
        $this->Properties = TableRegistry::get('Properties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Properties);

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
