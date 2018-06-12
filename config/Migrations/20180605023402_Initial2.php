<?php
use Migrations\AbstractMigration;

class Initial2 extends AbstractMigration
{
    public function up()
    {

        $this->table('currency')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 126,
                'null' => false,
            ])
            ->addColumn('abbreviation', 'string', [
                'default' => null,
                'limit' => 16,
                'null' => false,
            ])
            ->create();

        $this->table('currency_values')
            ->addColumn('currency_id', 'integer', [
                'default' => null,
                'limit' => 12,
                'null' => false,
            ])
            ->addColumn('value', 'float', [
                'default' => null,
                'null' => false,
                'precision' => 12,
                'scale' => 4,
            ])
            ->addColumn('timestamp', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'currency_id',
                ]
            )
            ->create();

        $this->table('role')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 126,
                'null' => false,
            ])
            ->addColumn('description', 'string', [
                'default' => 'None',
                'limit' => 255,
                'null' => true,
            ])
            ->create();

        $this->table('user')
            ->addColumn('firstName', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('lastName', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('role_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('updated', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'email',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'role_id',
                ]
            )
            ->create();

        $this->table('user_currency_tracking')
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('currency_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('threshold', 'float', [
                'default' => null,
                'null' => true,
                'precision' => 11,
                'scale' => 4,
            ])
            ->addColumn('direction', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'currency_id',
                ]
            )
            ->addIndex(
                [
                    'currency_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('currency_values')
            ->addForeignKey(
                'currency_id',
                'currency',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('user')
            ->addForeignKey(
                'role_id',
                'role',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('user_currency_tracking')
            ->addForeignKey(
                'currency_id',
                'currency',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'currency_id',
                'currency',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'user_id',
                'user',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'user_id',
                'user',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('currency_values')
            ->dropForeignKey(
                'currency_id'
            );

        $this->table('user')
            ->dropForeignKey(
                'role_id'
            );

        $this->table('user_currency_tracking')
            ->dropForeignKey(
                'currency_id'
            )
            ->dropForeignKey(
                'currency_id'
            )
            ->dropForeignKey(
                'user_id'
            )
            ->dropForeignKey(
                'user_id'
            );

        $this->dropTable('currency');
        $this->dropTable('currency_values');
        $this->dropTable('role');
        $this->dropTable('user');
        $this->dropTable('user_currency_tracking');
    }
}
