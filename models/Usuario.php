<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\base\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id_usuario
 * @property string $nome
 * @property string $email
 * @property integer $curso_id
 * @property integer $disciplina_id
 * @property string $turma
 * @property integer $idade
 * @property string $estilo
 * @property string $perfil
 *
 * @property Logdebuscas[] $logdebuscas
 * @property Curso $curso
 * @property Disciplina $disciplina
 */
class Usuario extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'disciplina_id', 'senha'], 'required', 'message'=> 'Este campo é obrigatório'],
            [['curso_id', 'disciplina_id', 'idade', 'termo'], 'integer'],
            [['nome', 'auth_key'], 'string', 'max' => 255],
            [['password_reset_token'], 'string', 'max' => 100],
            [['cpf'], 'string', 'max' => 11],
            [['email', 'estilo', 'perfil'], 'string', 'max' => 45],
            [['curso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['curso_id' => 'id_curso']],
            [['disciplina_id'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['disciplina_id' => 'id_disciplina']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'ID do Usuário',
            'nome' => 'Nome',
            'senha' => 'Senha',
            'email' => 'Email',
            'curso_id' => 'Curso',
            'disciplina_id' => 'Disciplina',
            'cpf' => 'CPF',
            'idade' => 'Idade',
            'estilo' => 'Estilo de Aprendizagem',
            'perfil' => 'Perfil',
            'auth_key' => 'Chave de Autorização',
            'password_reset_token' => 'Password Reset Token',
            'termo' => 'Termo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesquisas()
    {
        return $this->hasMany(Pesquisas::className(), ['aluno_id' => 'id_usuario']);
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
    public function getDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id_disciplina' => 'disciplina_id']);
    }

    /**
    * @inheritdoc
    */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
          return static::findOne(['access_token' => $token]);
    }
 
    /**
     * Finds user by CPF
     *
     * @param  string      $cpf
     * @return static|null
     */
    public static function findByEmail($email)
    {
        //return static::findOne(['cpf' => $cpf]);
        return Usuario::find()->where(['email' => $email])->one();
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param  string      $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->senha === md5($password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Security::generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    }


    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function afterFind()
    {
        switch ($this->estilo)
        {
            case "SEQGLOB": 
                $this->estilo = 'Sequencial e Global';
                break;
            case "VISVER": 
                $this->estilo = 'Visual e Veral';
                break;
            case "ATIREF":
                $this->estilo = 'Ativo e Reflexivo';
                break;
            case "SEMINT":
                $this->estilo = 'Sensorial e Intuitivo';
                break;
        }
    }  

    public function senhaAleatoria()
    {
        // gera uma strinf aleatoria... nao muito segura... kkk
        
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        
        $key = substr(str_shuffle(str_repeat($chars, 5)), 0, strlen($chars) );
        
        $key = substr($key, 0, 10) . '_' . rand(1,10000);
        
        $password = $key ;

        //$this->password = md5($password);    

        //$this->save();

        return $password ; //sem ta criptografado =) eh logico...      
    } 
}

