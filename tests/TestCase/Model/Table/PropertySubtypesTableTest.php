<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PropertySubtypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PropertySubtypesTable Test Case
 */
class PropertySubtypesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'PropertySubtypes' => 'app.property_subtypes',
        'PropertyTypes' => 'app.property_types',
        'Properties' => 'app.properties',
        'PropertySubtype' => 'app.property_subtype',
        'PropertypeLocations' => 'app.propertype_locations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PropertySubtypes') ? [] : ['className' => 'App\Model\Table\PropertySubtypesTable'];
        $this->PropertySubtypes = TableRegistry::get('PropertySubtypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PropertySubtypes);

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
