<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ngdelta_lga".
 *
 * @property integer $local_id
 * @property integer $state_id
 * @property string $local_name
 */
class NgdeltaLga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ngdelta_lga';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_id', 'local_name'], 'required'],
            [['state_id'], 'integer'],
            [['local_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'local_id' => 'Local ID',
            'state_id' => 'State ID',
            'local_name' => 'Local Name',
        ];
    }
}
