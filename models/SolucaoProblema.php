<?php

namespace app\models;

use Yii;
use app\models\Estilo;
use app\models\ObjetosDeAprendizagem;

/**
 * This is the model class for table "solucaoproblema".
 *
 * @property integer $id_solucaoProblema
 * @property string $diagnostico
 * @property string $acaoPedagogica
 * @property integer $objetoAprendizagem
 *
 * @property Pesquisas[] $pesquisas
 * @property Objetosaprendizagem $objetoAprendizagem0
 */
class SolucaoProblema extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solucaoproblema';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['diagnostico', 'acaoPedagogica'], 'required'],
            [['objetoAprendizagem'], 'integer'],
            [['diagnostico'], 'string', 'max' => 255],
            [['acaoPedagogica'], 'string', 'max' => 1000],
            [['objetoAprendizagem'], 'exist', 'skipOnError' => true, 'targetClass' => ObjetosDeAprendizagem::className(), 'targetAttribute' => ['objetoAprendizagem' => 'id_objeto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_solucaoProblema' => 'ID Solução do Problema',
            'diagnostico' => 'Diagnóstico',
            'acaoPedagogica' => 'Ação Pedagógica',
            'objetoAprendizagem' => 'Objeto de Aprendizagem',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesquisas()
    {
        return $this->hasMany(Pesquisas::className(), ['solucao_id' => 'id_solucaoProblema']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjetoAprendizagem0()
    {
        return $this->hasOne(ObjetosDeAprendizagem::className(), ['id_objeto' => 'objetoAprendizagem']);
    }
/*
    public function afterFind()
    {

        $obj = ObjetosDeAprendizagem::find()->where(['id_objeto' => $this->objetoAprendizagem])->one();
        //if ( $obj == null ) $this->estilo_objeto = "";
        $this->objetoAprendizagem = $obj->titulo_objeto;
    }  */

}
