<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property integer $id_curso
 * @property string $nome_curso
 * @property string $codigo_curso
 *
 * @property Disciplina[] $disciplinas
 * @property Usuario[] $usuarios
 */
class Curso extends \yii\db\ActiveRecord
{
    public $acao;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_curso', 'codigo_curso'], 'required'],
            [['nome_curso'], 'string', 'max' => 255],
            [['codigo_curso'], 'string', 'max' => 8],
            [['acao'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_curso' => 'ID do Curso',
            'nome_curso' => 'Nome do Curso',
            'codigo_curso' => 'Código do Curso',
            'acao' => 'Ação',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinas()
    {
        return $this->hasMany(Disciplina::className(), ['curso_id' => 'id_curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['curso_id' => 'id_curso']);
    }
}
