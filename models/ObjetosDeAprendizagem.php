<?php

namespace app\models;

use Yii;
use app\models\Estilo;

/**
 * This is the model class for table "objetosaprendizagem".
 *
 * @property integer $id_objeto
 * @property string $estilo_objeto
 * @property string $descricao_objeto
 * @property string $tipo_objeto
 * @property string $formato_objeto
 * @property integer $local_objeto
 * @property string $idioma_objeto
 *
 * @property Solucaoproblema[] $solucaoproblemas
 */
class ObjetosDeAprendizagem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;

    
    public static function tableName()
    {
        return 'objetosaprendizagem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['formato_objeto', 'idioma_objeto', 'localizacao_objeto'], 'string', 'max' => 100],
            [['estilo_objeto2', 'estilo_objeto3', 'estilo_objeto' ], 'string', 'max' => 50], //incluir required
            [['descricao_objeto'], 'string', 'max' => 1000],
            [['titulo_objeto', 'dificuldade_objeto', 'descricao_objeto', 'estilo_objeto', 'tipointeratividade_objeto'], 'required', 'message' => 'Este campo é obrigatório.'],
            [['titulo_objeto', 'requisitos_objeto', 'tipointeratividade_objeto', 'dificuldade_objeto', 'estrutura_objeto', 'recurso_objeto'], 'string', 'max' => 100],
            [['palavraschaves_objeto'], 'string', 'max' => 200],
            [['tamanho_objeto'], 'string', 'max' => 50],
            [['pathArquivo'], 'string', 'max' => 250],
            [['file'], 'file', 'skipOnEmpty' => true, 
                'message' => 'Falha ao carregar o arquivo.', 
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_objeto' => 'ID do Objeto de Aprendizagem',
            'estilo_objeto' => '1º Estilo',
            'descricao_objeto' => 'Descrição',
            'formato_objeto' => 'Formato',
            'localizacao_objeto' => 'Localização',
            'idioma_objeto' => 'Idioma',
            'titulo_objeto' => 'Nome',
            'palavraschaves_objeto' => 'Palavras-chaves',
            'tamanho_objeto' => 'Tamanho',
            'requisitos_objeto' => 'Requisitos',
            'tipointeratividade_objeto' => 'Tipo de Interatividade',
            'dificuldade_objeto' => 'Dificuldade',
            'estrutura_objeto' => 'Estrutura',
            'recurso_objeto' => 'Recurso',
            'pathArquivo' => 'Path Arquivo',
            'file' => 'Arquivo',
            'estilo_objeto2' => '2º Estilo',
            'estilo_objeto3' => '3º Estilo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolucaoproblemas()
    {
        return $this->hasMany(Solucaoproblema::className(), ['objetoAprendizagem' => 'id_objeto']);
    }/*

    public function afterFind()
    {
        if ( $this->estilo_objeto === null ) $this->estilo_objeto = "";
        else 
        {
            $estilo = Estilo::find()->where(['id_estilo' => $this->estilo_objeto])->one();
            $this->estilo_objeto = $estilo->nome_estilo; 
        } 
    }   */


}
