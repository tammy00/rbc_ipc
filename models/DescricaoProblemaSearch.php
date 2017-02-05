<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DescricaoProblema;

/**
 * DescricaoProblemaSearch represents the model behind the search form about `app\models\DescricaoProblema`.
 */
class DescricaoProblemaSearch extends DescricaoProblema
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_descProblema'], 'integer'],
            [['tema', 'topico', 'estiloAprendizagem', 'descrProblema', 'naturezaProblema'], 'safe'],
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
        $query = DescricaoProblema::find();

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
            'id_descProblema' => $this->id_descProblema,
        ]);

        $query->andFilterWhere(['like', 'tema', $this->tema])
            ->andFilterWhere(['like', 'topico', $this->topico])
            ->andFilterWhere(['like', 'estiloAprendizagem', $this->estiloAprendizagem])
            ->andFilterWhere(['like', 'descrProblema', $this->descrProblema])
            ->andFilterWhere(['like', 'naturezaProblema', $this->naturezaProblema]);

        return $dataProvider;
    }
}
