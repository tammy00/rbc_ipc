<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disciplina".
 *
 * @property integer $id_disciplina
 * @property string $nome_disciplina
 * @property string $codigo_disciplina
 * @property integer $curso_id
 *
 * @property Curso $curso
 * @property Usuario[] $usuarios
 */
class Disciplina extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'disciplina';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_disciplina', 'codigo_disciplina', 'curso_id', 'turma'], 'required'],
            [['curso_id'], 'integer'],
            [['nome_disciplina'], 'string', 'max' => 255],
            [['codigo_disciplina'], 'string', 'max' => 8],
            [['curso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['curso_id' => 'id_curso']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_disciplina' => 'ID da Disciplina',
            'nome_disciplina' => 'Nome da Disciplina',
            'codigo_disciplina' => 'Código da Disciplina',
            'curso_id' => 'Curso',
            'turma' => 'Turma',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::className(), ['id_curso' => 'curso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['disciplina_id' => 'id_disciplina']);
    }

    public function afterFind()
    {
        //
        $curso = Curso::find()->where(['id_curso' => $this->curso_id])->one();
        $this->curso_id = $curso->nome_curso;

    }
}
