<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estilo;

/**
 * EstiloSearch represents the model behind the search form about `app\models\Estilo`.
 */
class EstiloSearch extends Estilo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estilo'], 'integer'],
            [['nome_estilo'], 'safe'],
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
        $query = Estilo::find();

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
            'id_estilo' => $this->id_estilo,
        ]);

        $query->andFilterWhere(['like', 'nome_estilo', $this->nome_estilo]);

        return $dataProvider;
    }
}
