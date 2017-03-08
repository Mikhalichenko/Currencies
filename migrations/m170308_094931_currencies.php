<?php

use yii\db\Migration;

class m170308_094931_currencies extends Migration
{
    public function up()
    {
        $this->createTable('currencies',[
            'id' => $this->primaryKey(),
            'payments_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'img' => $this->string()
        ]);

        $this->insert('currencies',[
            'name' => 'USD',
            'payments_id' => 1,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'RUB',
            'payments_id' => 1,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'RUB',
            'payments_id' => 2,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'EUR',
            'payments_id' => 3,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'RUB',
            'payments_id' => 3,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'USD',
            'payments_id' => 3,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'RUB',
            'payments_id' => 4,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'UAH',
            'payments_id' => 4,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'RUB',
            'payments_id' => 5,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'EUR',
            'payments_id' => 6,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'RUB',
            'payments_id' => 6,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'USD',
            'payments_id' => 6,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'EUR',
            'payments_id' => 7,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'RUB',
            'payments_id' => 7,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'USD',
            'payments_id' => 7,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'RUB',
            'payments_id' => 8,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'USD',
            'payments_id' => 8,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'RUB',
            'payments_id' => 9,
            'img' => 'money.png'
        ]);

        $this->insert('currencies',[
            'name' => 'USD',
            'payments_id' => 10,
            'img' => 'money.png'
        ]);
    }

    public function down()
    {
        $this->dropTable('currencies');

        return false;
    }

}
