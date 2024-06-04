<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdStatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdStatesTable Test Case
 */
class AdStatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdStatesTable
     */
    public $AdStates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ad_states',
        'app.ads'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AdStates') ? [] : ['className' => AdStatesTable::class];
        $this->AdStates = TableRegistry::getTableLocator()->get('AdStates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdStates);

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
