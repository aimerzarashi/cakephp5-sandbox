<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServiceItemsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServiceItemsTable Test Case
 */
class ServiceItemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ServiceItemsTable
     */
    protected $ServiceItems;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.ServiceItems',
        'app.Services',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ServiceItems') ? [] : ['className' => ServiceItemsTable::class];
        $this->ServiceItems = $this->getTableLocator()->get('ServiceItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ServiceItems);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ServiceItemsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ServiceItemsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
