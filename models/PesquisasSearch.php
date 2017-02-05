<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pesquisas;

/**
 * LogDeBuscasSearch represents the model behind the search form about `app\models\LogDeBuscas`.
 */
class PesquisasSearch extends Pesquisas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_log', 'aluno_id', 'solucao_id'], 'integer'],
            [['feedback', 'data_criacao', 'status', 'turma', 'duvida'], 'safe'],
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
        $query = Pesquisas::find();

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
            'id_log' => $this->id_log,
            'aluno_id' => $this->aluno_id,
            'solucao_id' => $this->solucao_id,
            'data_criacao' => $this->data_criacao,
            'status' => $this->status,
            'turma' => $this->turma,
            'duvida' => $this->duvida,
        ]);

        $query->andFilterWhere(['like', 'feedback', $this->feedback]);

        return $dataProvider;
    }

    public function searchToProfessor($params)
    {
        
        $disciplina_do_professor = Yii::$app->user->identity->disciplina_id; // Obtem a disciplina que o professor leciona

        $turma_do_professor = Disciplina::find()->where(['id_disciplina' => $disciplina_do_professor])->one(); // Obtem a turma que o professor leciona

        $query = Pesquisas::find()->where(['turma' => $turma_do_professor->turma])->andWhere(['status' => 'Submetido'])->orderBy(['id_log' => SORT_DESC]); 


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
            'id_log' => $this->id_log,
            'aluno_id' => $this->aluno_id,
            'solucao_id' => $this->solucao_id,
            'data_criacao' => $this->data_criacao,
            'status' => $this->status,
            'turma' => $this->turma,
            'duvida' => $this->duvida,
        ]);

        $query->andFilterWhere(['like', 'feedback', $this->feedback]);

        return $dataProvider;
    }

    public function searchToAluno($params)
    {
        $query = Pesquisas::find()->where(['aluno_id' => Yii::$app->user->identity->id_usuario])->orderBy(['id_log' => SORT_DESC]);

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
            'solucao_id' => $this->solucao_id,
            'data_criacao' => $this->data_criacao,
            'status' => $this->status,
            'duvida' => $this->duvida,
            
        ]);

        $query->andFilterWhere(['like', 'feedback', $this->feedback]);

        return $dataProvider;
    }
}
