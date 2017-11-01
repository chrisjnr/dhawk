<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $address
 * @property string $website
 * @property string $email
 * @property integer $phone_no
 * @property string $representative_name
 * @property integer $representative_contact_number
 * @property string $joined_date
 * @property string $created_by
 * @property string $status
 *
 * @property User $company
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'address', 'website', 'email', 'phone_no', 'representative_name', 'representative_contact_number', 'joined_date', 'created_by', 'status'], 'required'],
            [['company_id', 'phone_no', 'representative_contact_number'], 'integer'],
            [['joined_date'], 'safe'],
            [['status'], 'string'],
            [['address'], 'string', 'max' => 100],
            [['website', 'email', 'representative_name'], 'string', 'max' => 50],
            [['created_by'], 'string', 'max' => 32],
            [['email'], 'unique'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'address' => 'Address',
            'website' => 'Website',
            'email' => 'Email',
            'phone_no' => 'Phone No',
            'representative_name' => 'Representative Name',
            'representative_contact_number' => 'Representative Contact Number',
            'joined_date' => 'Joined Date',
            'created_by' => 'Created By',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(User::className(), ['id' => 'company_id']);
    }
}
