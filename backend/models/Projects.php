<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property integer $id
 * @property string $project_name
 * @property integer $companies_company_id
 * @property string $state
 * @property string $location
 * @property string $start_date
 * @property string $end_date
 * @property string $project_description
 * @property string $external_contractors
 * @property string $date_of_award
 * *property string $project_status
 * @property string $created_date
 *
 * @property User $companiesCompany
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_name', 'companies_company_id', 'state', 'location', 'start_date', 'end_date', 'project_description', 'date_of_award', 'created_date'], 'required'],
            [['companies_company_id'], 'integer'],
            [['start_date', 'end_date', 'date_of_award', 'created_date'], 'safe'],
            [['project_description','project_status' ], 'string'],
            [['project_name', 'state'], 'string', 'max' => 255],
            [['location', 'external_contractors'], 'string', 'max' => 255],
            [['companies_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['companies_company_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_name' => 'Project Name',
            'companies_company_id' => 'Companies Company ID',
            'state' => 'State',
            'location' => 'Location',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'project_description' => 'Project Description',
            'external_contractors' => 'External Contractors',
            'date_of_award' => 'Date Of Award',
            'created_date' => 'Created Date',
            'project_status'=>'Project Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesCompany()
    {
        return $this->hasOne(User::className(), ['id' => 'companies_company_id']);
    }
}
