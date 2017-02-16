<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pesquisas".
 *
 * @property integer $id_log
 * @property integer $aluno_id
 * @property string $natureza
 * @property string $tema
 * @property string $topico
 * @property integer $solucao_id
 * @property string $duvida
 * @property string $feedback
 * @property string $acao
 * @property string $data_criacao
 * @property string $status
 * @property string $turma
 * @property double $similaridade
 *
 * @property Usuario $aluno
 * @property Solucaoproblema $solucao
 */
class Pesquisas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pesquisas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aluno_id', 'natureza', 'tema', 'topico', 'solucao_id', 'data_criacao', 'status'], 'required'],
            [['aluno_id', 'solucao_id'], 'integer'],
            [['data_criacao'], 'safe'],
            [['similaridade'], 'number'],
            [['natureza', 'tema'], 'string', 'max' => 100],
            [['topico'], 'string', 'max' => 150],
            [['duvida', 'acao'], 'string', 'max' => 1000],
            [['feedback'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 10],
            [['turma'], 'string', 'max' => 45],
            [['aluno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['aluno_id' => 'id_usuario']],
            [['solucao_id'], 'exist', 'skipOnError' => true, 'targetClass' => Solucaoproblema::className(), 'targetAttribute' => ['solucao_id' => 'id_solucaoProblema']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_log' => 'Id Log',
            'aluno_id' => 'Aluno ID',
            'natureza' => 'Natureza',
            'tema' => 'Tema',
            'topico' => 'Topico',
            'solucao_id' => 'Solucao ID',
            'duvida' => 'Duvida',
            'feedback' => 'Feedback',
            'acao' => 'Acao',
            'data_criacao' => 'Data Criacao',
            'status' => 'Status',
            'turma' => 'Turma',
            'similaridade' => 'Similaridade',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAluno()
    {
        return $this->hasOne(Usuario::className(), ['id_usuario' => 'aluno_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolucao()
    {
        return $this->hasOne(Solucaoproblema::className(), ['id_solucaoProblema' => 'solucao_id']);
    }
}
