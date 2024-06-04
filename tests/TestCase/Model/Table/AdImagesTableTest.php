<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdImagesTable Test Case
 */
class AdImagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdImagesTable
     */
    public $AdImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ad_images',
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
        $config = TableRegistry::getTableLocator()->exists('AdImages') ? [] : ['className' => AdImagesTable::class];
        $this->AdImages = TableRegistry::getTableLocator()->get('AdImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdImages);

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
