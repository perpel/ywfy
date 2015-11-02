<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%report}}".
 *
 * @property integer $ID
 * @property integer $UID
 * @property string $Name
 * @property string $URL
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%report}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UID', 'Name'], 'required'],
            [['UID'], 'integer'],
            [['Name', 'URL'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'UID' => 'Uid',
            'Name' => 'Name',
            'URL' => 'Url',
        ];
    }
}
