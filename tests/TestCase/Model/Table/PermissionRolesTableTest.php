<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissionRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissionRolesTable Test Case
 */
class PermissionRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissionRolesTable
     */
    public $PermissionRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.permission_roles',
        'app.permissions',
        'app.roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PermissionRoles') ? [] : ['className' => PermissionRolesTable::class];
        $this->PermissionRoles = TableRegistry::getTableLocator()->get('PermissionRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PermissionRoles);

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
