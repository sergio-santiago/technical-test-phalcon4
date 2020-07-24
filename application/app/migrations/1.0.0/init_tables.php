<?php

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Migrations\Mvc\Model\Migration;

/**
 * Class InitTables_100
 */
class InitTablesMigration_100 extends Migration
{

    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable(
            'company',
            [
                'columns' => [
                    new Column(
                        'code_company',
                        [
                            'type'     => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull'  => true,
                            'size'     => 1,
                            'first'    => true,
                        ]
                    ),
                    new Column(
                        'name_company',
                        [
                            'type'    => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size'    => 30,
                            'after'   => 'code_company',
                        ]
                    ),
                    new Column(
                        'country',
                        [
                            'type'    => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size'    => 15,
                            'after'   => 'name_company',
                        ]
                    ),
                    new Column(
                        'date_time',
                        [
                            'type'    => Column::TYPE_TIMESTAMP,
                            'default' => "CURRENT_TIMESTAMP",
                            'notNull' => false,
                            'after'   => 'country',
                        ]
                    ),
                ],
                'indexes' => [
                    new Index('PRIMARY', ['code_company'], 'PRIMARY'),
                ],
                'options' => [
                    'table_type'      => 'BASE TABLE',
                    'auto_increment'  => '',
                    'engine'          => 'InnoDB',
                    'table_collation' => 'utf8mb4_0900_ai_ci',
                ],
            ]
        );

        $this->morphTable(
            'security',
            [
                'columns' => [
                    new Column(
                        'code_security',
                        [
                            'type'     => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull'  => true,
                            'size'     => 1,
                            'first'    => true,
                        ]
                    ),
                    new Column(
                        'instrument',
                        [
                            'type'    => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size'    => 30,
                            'after'   => 'code_security',
                        ]
                    ),
                    new Column(
                        'bid',
                        [
                            'type'    => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size'    => 1,
                            'after'   => 'instrument',
                        ]
                    ),
                    new Column(
                        'ask',
                        [
                            'type'    => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size'    => 1,
                            'after'   => 'bid',
                        ]
                    ),
                    new Column(
                        'yield',
                        [
                            'type'    => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size'    => 1,
                            'after'   => 'ask',
                        ]
                    ),
                    new Column(
                        'high',
                        [
                            'type'    => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size'    => 1,
                            'after'   => 'yield',
                        ]
                    ),
                    new Column(
                        'low',
                        [
                            'type'    => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size'    => 1,
                            'after'   => 'high',
                        ]
                    ),
                    new Column(
                        'currency',
                        [
                            'type'    => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size'    => 15,
                            'after'   => 'low',
                        ]
                    ),
                    new Column(
                        'date_price',
                        [
                            'type'    => Column::TYPE_DATE,
                            'notNull' => true,
                            'after'   => 'currency',
                        ]
                    ),
                    new Column(
                        'time_price',
                        [
                            'type'    => Column::TYPE_DATETIME,
                            'notNull' => true,
                            'after'   => 'date_price',
                        ]
                    ),
                ],
                'indexes' => [
                    new Index('PRIMARY', ['code_security'], 'PRIMARY'),
                ],
                'options' => [
                    'table_type'      => 'BASE TABLE',
                    'auto_increment'  => '',
                    'engine'          => 'InnoDB',
                    'table_collation' => 'utf8mb4_0900_ai_ci',
                ],
            ]
        );

        $this->morphTable(
            'company_security',
            [
                'columns'    => [
                    new Column(
                        'code_company_security',
                        [
                            'type'     => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull'  => true,
                            'size'     => 1,
                            'first'    => true,
                        ]
                    ),
                    new Column(
                        'code_company',
                        [
                            'type'     => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull'  => true,
                            'size'     => 1,
                            'after'    => 'code_company_security',
                        ]
                    ),
                    new Column(
                        'code_security',
                        [
                            'type'     => Column::TYPE_INTEGER,
                            'unsigned' => true,
                            'notNull'  => true,
                            'size'     => 1,
                            'after'    => 'code_company',
                        ]
                    ),
                    new Column(
                        'date_time',
                        [
                            'type'    => Column::TYPE_TIMESTAMP,
                            'default' => "CURRENT_TIMESTAMP",
                            'notNull' => false,
                            'after'   => 'code_security',
                        ]
                    ),
                ],
                'indexes'    => [
                    new Index('PRIMARY', ['code_company_security'], 'PRIMARY'),
                    new Index('code_company', ['code_company'], ''),
                    new Index('code_security', ['code_security'], ''),
                ],
                'references' => [
                    new Reference(
                        'company_security_ibfk_1',
                        [
                            'referencedTable'   => 'company',
                            'referencedSchema'  => 'technical_test_phalcon_app',
                            'columns'           => ['code_company'],
                            'referencedColumns' => ['code_company'],
                            'onUpdate'          => 'NO ACTION',
                            'onDelete'          => 'NO ACTION',
                        ]
                    ),
                    new Reference(
                        'company_security_ibfk_2',
                        [
                            'referencedTable'   => 'security',
                            'referencedSchema'  => 'technical_test_phalcon_app',
                            'columns'           => ['code_security'],
                            'referencedColumns' => ['code_security'],
                            'onUpdate'          => 'NO ACTION',
                            'onDelete'          => 'NO ACTION',
                        ]
                    ),
                ],
                'options'    => [
                    'table_type'      => 'BASE TABLE',
                    'auto_increment'  => '',
                    'engine'          => 'InnoDB',
                    'table_collation' => 'utf8mb4_0900_ai_ci',
                ],
            ]
        );
    }

    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {

    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {

    }

}
