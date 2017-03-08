<?php

use yii\db\Migration;

class m170308_102958_payments extends Migration
{
    public function up()
    {
        $this->createTable('payments',[
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'img' => $this->string()
        ]);

        $this->insert('payments',[
            'name' => 'Bitcoin',
            'img' => 'BTC.jpg'
        ]);

        $this->insert('payments',[
            'name' => 'QIWI',
            'img' => 'qiwi.jpg'
        ]);

        $this->insert('payments',[
            'name' => 'Yandex',
            'img' => 'yandex.jpg'
        ]);

        $this->insert('payments',[
            'name' => 'Perfect money',
            'img' => 'perfectmoney.jpg'
        ]);

        $this->insert('payments',[
            'name' => 'Payer',
            'img' => 'payeer.jpg'
        ]);

        $this->insert('payments',[
            'name' => 'OkPay',
            'img' => 'okpay.jpg'
        ]);

        $this->insert('payments',[
            'name' => 'WebMoney',
            'img' => 'webmoney.jpg'
        ]);

        $this->insert('payments',[
            'name' => 'PayPal',
            'img' => 'paypal.jpg'
        ]);

        $this->insert('payments',[
            'name' => 'Privar24',
            'img' => 'privat.jpg'
        ]);

        $this->insert('payments',[
            'name' => 'ВТБ',
            'img' => 'VTB24RUB.jpg'
        ]);
    }

    public function down()
    {
        $this->dropTable('payments');

        return false;
    }

}
