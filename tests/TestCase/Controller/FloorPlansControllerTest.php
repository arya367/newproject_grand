<?php
namespace App\Test\TestCase\Controller;

use App\Controller\FloorPlansController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\FloorPlansController Test Case
 */
class FloorPlansControllerTest extends IntegrationTestCase
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
