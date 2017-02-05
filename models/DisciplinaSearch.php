<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Disciplina;

/**
 * DisciplinaSearch represents the model behind the search form about `app\models\Disciplina`.
 */
class DisciplinaSearch extends Disciplina
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_disciplina', 'curso_id'], 'integer'],
            [['nome_disciplina', 'codigo_disciplina', 'turma'], 'safe'],
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
        $query = Disciplina::find();

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
            'id_disciplina' => $this->id_disciplina,
            'curso_id' => $this->curso_id,
        ]);

        $query->andFilterWhere(['like', 'nome_disciplina', $this->nome_disciplina])
            ->andFilterWhere(['like', 'codigo_disciplina', $this->codigo_disciplina])
            ->andFilterWhere(['like', 'turma', $this->turma]);

        //$lista = Disciplina::find()->all();
            /*
        foreach ($query as $q)
        {
            $q->curso_id = ;
        }  */

        return $dataProvider;
    }
}
