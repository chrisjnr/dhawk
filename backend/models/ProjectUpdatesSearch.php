<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ProjectUpdates;

/**
 * ProjectUpdatesSearch represents the model behind the search form about `backend\models\ProjectUpdates`.
 */
class ProjectUpdatesSearch extends ProjectUpdates
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'companies_company_id', 'project_id'], 'integer'],
            [['project_name', 'update_report', 'uploaded'], 'safe'],
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
        $query = ProjectUpdates::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'companies_company_id' => $this->companies_company_id,
            'project_id' => $this->project_id,
            'uploaded' => $this->uploaded,
        ]);

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'update_report', $this->update_report]);

        return $dataProvider;
    }
}
