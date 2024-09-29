<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ServicesFixture
 */
class ServicesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '40295f6f-6ee2-43c7-a932-973f6e9b2116',
                'name' => 'Lorem ipsum dolor sit amet',
                'code' => 'Lorem ipsum dolor sit amet',
                'created' => 1727587638,
                'modified' => 1727587638,
            ],
        ];
        parent::init();
    }
}
