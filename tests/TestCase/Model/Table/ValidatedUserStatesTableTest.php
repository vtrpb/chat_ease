<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ValidatedUserStatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ValidatedUserStatesTable Test Case
 */
class ValidatedUserStatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ValidatedUserStatesTable
     */
    public $ValidatedUserStates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.validated_user_states',
        'app.validated_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ValidatedUserStates') ? [] : ['className' => ValidatedUserStatesTable::class];
        $this->ValidatedUserStates = TableRegistry::getTableLocator()->get('ValidatedUserStates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ValidatedUserStates);

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
