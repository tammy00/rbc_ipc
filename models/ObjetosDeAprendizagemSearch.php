<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ObjetosDeAprendizagem;

/**
 * ObjetosDeAprendizagemSearch represents the model behind the search form about `app\models\ObjetosDeAprendizagem`.
 */
class ObjetosDeAprendizagemSearch extends ObjetosDeAprendizagem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_objeto', 'estilo_objeto'], 'integer'],
            [['descricao_objeto', 'localizacao_objeto', 'formato_objeto', 'idioma_objeto', 'titulo_objeto', 'palavraschaves_objeto', 'tamanho_objeto', 'requisitos_objeto', 'tipointeratividade_objeto', 'dificuldade_objeto', 'estrutura_objeto', 'recurso_objeto'], 'safe'],
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
        $query = ObjetosDeAprendizagem::find();

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
            'id_objeto' => $this->id_objeto,
        ]);

        $query->andFilterWhere(['like', 'estilo_objeto', $this->estilo_objeto])
            ->andFilterWhere(['like', 'descricao_objeto', $this->descricao_objeto])
            ->andFilterWhere(['like', 'localizacao_objeto', $this->localizacao_objeto])
            ->andFilterWhere(['like', 'formato_objeto', $this->formato_objeto])
            ->andFilterWhere(['like', 'idioma_objeto', $this->idioma_objeto])
            ->andFilterWhere(['like', 'titulo_objeto', $this->titulo_objeto])
            ->andFilterWhere(['like', 'tipointeratividade_objeto', $this->tipointeratividade_objeto])
            ->andFilterWhere(['like', 'tamanho_objeto', $this->tamanho_objeto])
            ->andFilterWhere(['like', 'requisitos_objeto', $this->requisitos_objeto])
            ->andFilterWhere(['like', 'idioma_objeto', $this->idioma_objeto])
            ->andFilterWhere(['like', 'dificuldade_objeto', $this->dificuldade_objeto])
            ->andFilterWhere(['like', 'estrutura_objeto', $this->estrutura_objeto])
            ->andFilterWhere(['like', 'recurso_objeto', $this->recurso_objeto]);

        return $dataProvider;
    }
}
