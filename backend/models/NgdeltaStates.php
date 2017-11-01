<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ngdelta_states".
 *
 * @property integer $state_id
 * @property string $state_name
 */
class NgdeltaStates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ngdelta_states';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_name'], 'required'],
            [['state_name'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'state_id' => 'State ID',
            'state_name' => 'State Name',
        ];
    }
}
