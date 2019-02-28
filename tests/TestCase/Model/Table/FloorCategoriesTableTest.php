<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FloorCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FloorCategoriesTable Test Case
 */
class FloorCategoriesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'FloorCategories' => 'app.floor_categories',
        'FloorPlan' => 'app.floor_plan',
        'FloorSubcategory' => 'app.floor_subcategory'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FloorCategories') ? [] : ['className' => 'App\Model\Table\FloorCategoriesTable'];
        $this->FloorCategories = TableRegistry::get('FloorCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FloorCategories);

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
}
