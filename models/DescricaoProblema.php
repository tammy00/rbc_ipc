<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "descricaoproblema".
 *
 * @property integer $id_descProblema
 * @property string $tema
 * @property string $topico
 * @property string $estiloAprendizagem
 * @property string $descrProblema
 * @property string $naturezaProblema
 *
 * @property Solucaoproblema[] $solucaoproblemas
 */
class DescricaoProblema extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'descricaoproblema';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tema', 'topico', 'estiloAprendizagem', 'descrProblema', 'naturezaProblema'], 'required'],
            [['tema', 'estiloAprendizagem', 'naturezaProblema'], 'string', 'max' => 100],
            [['topico'], 'string', 'max' => 150],
            [['descrProblema'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_descProblema' => 'Id Desc Problema',
            'tema' => 'Módulo',
            'topico' => 'Tópico',
            'estiloAprendizagem' => 'Estilo de Aprendizagem',
            'descrProblema' => 'Descrição da dúvida',
            'naturezaProblema' => 'Natureza da dúvida',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolucaoproblemas()
    {
        return $this->hasMany(Solucaoproblema::className(), ['id_solucaoProblema' => 'id_descProblema']);
    }

    public function afterFind()
    {
        
        /*$idDoEstilo = intval($this->estiloAprendizagem);
        $estilo = Estilo::find()->where(['id_estilo' => $idDoEstilo])->one();
        if ( $estilo == null ) $this->estiloAprendizagem = "";
        else $this->estiloAprendizagem = $estilo->nome_estilo;  */
    }
}
