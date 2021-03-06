<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "project_updates".
 *
 * @property integer $id
 * @property integer $companies_company_id
 * @property integer $project_id
 * @property string $project_name
 * @property string $updated_image
 * @property string $update_report
 * @property string $uploaded
 *
 * @property Companies $companiesCompany
 * @property Projects $project
 */
class ProjectUpdates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    //public $file;
    public static function tableName()
    {
        return 'project_updates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['companies_company_id', 'project_id', 'project_name', 'uploaded'], 'required'],
            [['companies_company_id', 'project_id'], 'integer'],
            [['update_report'], 'string'],
            //[['file'],'file'],
            [['uploaded'], 'safe'],
            [['project_name','updated_image' ], 'string', 'max' => 255],
            [['companies_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['companies_company_id' => 'id']],
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
            'companies_company_id' => 'Companies Company ID',
            'project_id' => 'Project ID',
            'project_name' => 'Project Name',
            'updated_image' => 'Updated Image',
            'update_report' => 'Update Report',
            'uploaded' => 'Uploaded',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesCompany()
    {
        return $this->hasOne(Companies::className(), ['id' => 'companies_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Projects::className(), ['id' => 'project_id']);
    }
}
