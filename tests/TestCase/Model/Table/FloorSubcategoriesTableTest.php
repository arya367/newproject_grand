<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FloorSubcategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FloorSubcategoriesTable Test Case
 */
class FloorSubcategoriesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'FloorSubcategories' => 'app.floor_subcategories',
        'FloorCategories' => 'app.floor_categories',
        'FloorPlan' => 'app.floor_plan',
        'FloorSubcategory' => 'app.floor_subcategory',
        'FloorPlans' => 'app.floor_plans'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FloorSubcategories') ? [] : ['className' => 'App\Model\Table\FloorSubcategoriesTable'];
        $this->FloorSubcategories = TableRegistry::get('FloorSubcategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FloorSubcategories);

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
