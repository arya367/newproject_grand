<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FloorPlansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FloorPlansTable Test Case
 */
class FloorPlansTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'FloorPlans' => 'app.floor_plans',
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
        'Units' => 'app.units',
        'PropertyGalleries' => 'app.property_galleries',
        'FloorCategories' => 'app.floor_categories',
        'FloorSubcategory' => 'app.floor_subcategory',
        'FloorSubcategories' => 'app.floor_subcategories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FloorPlans') ? [] : ['className' => 'App\Model\Table\FloorPlansTable'];
        $this->FloorPlans = TableRegistry::get('FloorPlans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FloorPlans);

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
