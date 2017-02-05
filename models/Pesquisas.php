<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logdebuscas".
 *
 * @property integer $id_log
 * @property integer $aluno_id
 * @property integer $solucao_id
 * @property string $feedback
 * @property string $data_criacao
 *
 * @property Usuario $aluno
 * @property Solucaoproblema $solucao
 */

/*rule: acao pedagogica incluido*/
class Pesquisas extends \yii\db\ActiveRecord
{

    public $diagnostico;
    public $objeto;
    public $listadiagnosticos;
    public $estilo;

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
            [['aluno_id', 'solucao_id', 'data_criacao'], 'required'],
            [['aluno_id', 'solucao_id'], 'integer'],
            [['data_criacao'], 'safe'],
            [['estilo'], 'string', 'max' => 45],
            [['topico'], 'string', 'max' => 150],
            [['tema'], 'string', 'max' => 100],
            [['natureza'], 'string', 'max' => 100],
            [['objeto'], 'integer'],
            [['diagnostico', 'feedback'], 'string', 'max' => 255],
            [['acao'], 'string', 'max' => 1000],
            [['duvida'], 'string', 'max' => 1000],
            [['turma'], 'string', 'max' => 45],
            [['status'], 'string', 'max' => 10],
            [['aluno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['aluno_id' => 'id_usuario']],
            [['solucao_id'], 'exist', 'skipOnError' => true, 'targetClass' => SolucaoProblema::className(), 'targetAttribute' => ['solucao_id' => 'id_solucaoProblema']],
            [['objeto'], 'exist', 'skipOnError' => true, 'targetClass' => ObjetosDeAprendizagem::className(), 'targetAttribute' => ['objeto' => 'id_objeto']],
            [['listadiagnosticos'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_log' => 'ID Pesquisa',
            'aluno_id' => 'Aluno',
            'solucao_id' => 'ID Solução',
            'duvida' => 'Dúvida',
            'estilo' => 'Estilo',
            'topico' => 'Tópico',
            'tema' => 'Módulo/tema',
            'natureza' => 'Natureza do Problema',
            'feedback' => 'Diagnóstico',
            'data_criacao' => 'Data de Pesquisa',
            'status' => 'Status',
            'turma' => 'Turma',
            'acao' => 'Ação Pedagógica (recomendar um objeto de aprendizagem, leitura de um livro, assistir um vídeo e etc)',
            'objeto' => 'Objeto de Aprendizagem',
            'diagnostico' => 'Diagnóstico', 
            'listadiagnosticos'=>'Diagnóstico'
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

    public function afterFind()
    {
        $a = Usuario::find()->where(['id_usuario' => $this->aluno_id])->one();
        $this->estilo = $a->estilo;
        
        if ( Yii::$app->controller->action->id != 'update')
        {
            $this->aluno_id = $a->nome;
            
        }
    }  
}
