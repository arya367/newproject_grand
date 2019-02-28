<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PropertySubtypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PropertySubtypeTable Test Case
 */
class PropertySubtypeTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'PropertySubtype' => 'app.property_subtype',
        'PropertyTypes' => 'app.property_types',
        'Properties' => 'app.properties',
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
        $config = TableRegistry::exists('PropertySubtype') ? [] : ['className' => 'App\Model\Table\PropertySubtypeTable'];
        $this->PropertySubtype = TableRegistry::get('PropertySubtype', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PropertySubtype);

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
