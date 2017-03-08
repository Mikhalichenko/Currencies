<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currencies".
 *
 * @property int $id
 * @property int $payments_id
 * @property string $name
 * @property string $img
 */
class Currencies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currencies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payments_id', 'name'], 'required'],
            [['payments_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['img'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payments_id' => 'Payments ID',
            'name' => 'Name',
            'img' => 'Img',
        ];
    }

    public static function getPayments($id)
    {
        if (count($id) > 1) {
            $array = implode(',', $id);
        } else {
            $array = $id;
        }

       $sql = "SELECT c.id, c.name AS currenciesName, c.img, p.name, p.img FROM currencies AS c
                  JOIN payments AS p
                  ON c.payments_id = p.id
                  WHERE c.id IN ($array)";

       return Yii::$app->db->createCommand($sql)->queryAll();
    }
}
