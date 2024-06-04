<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ValidatedUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ValidatedUsersTable Test Case
 */
class ValidatedUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ValidatedUsersTable
     */
    public $ValidatedUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.validated_users',
        'app.users',
        'app.validated_user_states'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ValidatedUsers') ? [] : ['className' => ValidatedUsersTable::class];
        $this->ValidatedUsers = TableRegistry::getTableLocator()->get('ValidatedUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ValidatedUsers);

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
