<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Projects;

/**
 * ProjectsSearch represents the model behind the search form about `backend\models\Projects`.
 */
class ProjectsSearch extends Projects
{
    /**
     * @inheritdoc
     */
    public $search;
    public function rules()
    {
        return [
            [['id', 'companies_company_id'], 'integer'],
            [['project_name','search', 'state', 'location', 'start_date', 'end_date', 'project_description', 'external_contractors', 'date_of_award', 'created_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Projects::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

    
        $query->orFilterWhere(['like', 'project_name', $this->search])
            ->orFilterWhere(['like', 'state', $this->search])
            ->orFilterWhere(['like', 'location', $this->search])
            ->orFilterWhere(['like', 'project_description', $this->search])
            ->orFilterWhere(['like', 'external_contractors', $this->search]);

        return $dataProvider;
    }
}
