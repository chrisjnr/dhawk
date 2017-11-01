<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "multi_uploads".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $upload_path
 *
 * @property Projects $project
 */
class MultiUploads extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'multi_uploads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'upload_path'], 'required'],
            [['project_id'], 'integer'],
            [['upload_path'], 'string', 'max' => 255],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Projects::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'upload_path' => 'Upload Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Projects::className(), ['id' => 'project_id']);
    }
}
