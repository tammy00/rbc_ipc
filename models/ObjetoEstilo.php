<?php

namespace app\models;

use Yii;
use app\models\Estilo;
use app\models\ObjetosDeAprendizagem;

/**
 * This is the model class for table "objeto_estilo".
 *
 * @property integer $id_objeto_estilo
 * @property integer $id_objeto
 * @property integer $id_estilo
 */
class ObjetoEstilo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'objeto_estilo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['id_objeto_estilo', 'id_objeto', 'id_estilo'], 'required'],
            [['id_objeto_estilo', 'id_objeto', 'id_estilo'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_objeto_estilo' => 'Id Objeto Estilo',
            'id_objeto' => 'Objeto (título)',
            'id_estilo' => 'Estilo',
        ];
    }
/*
    public function afterFind()
    {
        $estilo = Estilo::find()->where(['id_estilo' => $this->id_estilo])->one();
        if ( $estilo === null ) $this->id_estilo = "";
        else $this->id_estilo = $estilo->nome_estilo;
        
        $objeto = ObjetosDeAprendizagem::find()->where(['id_objeto' => $this->id_objeto])->one();
        $this->id_objeto = $objeto->titulo_objeto;
    }  */


}
