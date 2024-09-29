<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ServiceItemsFixture
 */
class ServiceItemsFixture extends TestFixture
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
                'id' => '70975f90-fe41-4a53-93ae-f566518fb0fa',
                'name' => 'Lorem ipsum dolor sit amet',
                'code' => 'Lorem ipsum dolor sit amet',
                'service_id' => 'e70281db-8111-4e85-8478-d9e73a229a59',
                'created' => 1727587639,
                'modified' => 1727587639,
            ],
        ];
        parent::init();
    }
}
