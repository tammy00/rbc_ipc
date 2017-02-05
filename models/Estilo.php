<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estilo".
 *
 * @property integer $id_estilo
 * @property string $nome_estilo
 */
class Estilo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estilo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_estilo'], 'required'],
            [['id_estilo'], 'integer'],
            [['nome_estilo'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estilo' => 'Id Estilo',
            'nome_estilo' => 'Nome do Estilo',
        ];
    }
}
