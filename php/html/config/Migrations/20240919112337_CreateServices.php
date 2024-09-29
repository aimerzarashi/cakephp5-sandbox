<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateServices extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table(
            'services',
            [
                'id' => false,
                'comment' => 'サービス',
            ]
        );

        $table->addColumn(
            'id',
            'uuid',
            [
                'comment' => 'ID',
            ]
        )->addPrimaryKey('id');

        $table->addColumn(
            'name',
            'string',
            [
                'comment' => '名称',
                'limit' => 200,
            ]
        );

        $table->addColumn(
            'code',
            'string',
            [
                'comment' => 'コード',
                'limit' => 40,
            ]
        )->addIndex(
            [
                'code'
            ],
            [
                'name' => 'services_code_index',
                'unique' => true,
            ]
        );

        $table->addColumn(
            'created',
            'datetime',
            [
                'comment' => '登録日時',
                'default' => 'CURRENT_TIMESTAMP'
            ]
        );

        $table->addColumn(
            'modified',
            'datetime',
            [
                'comment' => '更新日時',
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP',
            ]
        );

        $table->create();
    }
}
