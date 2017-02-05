<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use app\models\UsuarioSearch;
use app\models\CursoSearch;
use app\models\Curso;
use app\models\LoginForm;
use app\models\Disciplina;
use app\models\DisciplinaSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Estilo;
use yii\swiftmailer\Mailer;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
{
    /**
     * @inheritdoc
     */


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'delete', 'update', 'create', 'view', 'done', 'termo'],   // <---
                'rules' => [
                    [
                        'actions' => ['index', 'delete', 'update', 'create', 'view', 'done', 'termo'],   // <---
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            if(!Yii::$app->user->isGuest)
                            {
                                if ( Yii::$app->user->identity->perfil === 'Administrador')
                                {
                                    return Yii::$app->user->identity->perfil == 'Administrador'; 
                                }
                                if ( Yii::$app->user->identity->perfil === 'Professor')
                                {
                                    return Yii::$app->user->identity->perfil == 'Professor'; 
                                }
                                if ( Yii::$app->user->identity->perfil === 'Tutor')
                                {
                                    return Yii::$app->user->identity->perfil == 'Tutor'; 
                                }
                                if ( Yii::$app->user->identity->perfil === 'Aluno')
                                {
                                    return Yii::$app->user->identity->perfil == 'Aluno'; 
                                }
                            }                            
                        }
                    ],
                ],
            ], 
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    // NOVA ACTION - início
    /* Assinatura do Termo */

    public function actionTermo ($resposta)  // Recebe o id da action
    {
        $model = $this->findModel(Yii::$app->user->identity->id_usuario);

        if ($resposta == 1)  // Respondeu que concorda ----> redirecionado para a home
        {
            $model->termo = $resposta;
           $model->save();  
            return $this->redirect(["site/index"]); 
        }
        if ($resposta == 2) // Respondeu que não concorda ----> logout
        {
            return $this->redirect(["site/logout"]); 
        }
        else 
        {
            return $this->render('termo', [
                'model' => $model,
            ]);
        }
    }

    
    public function actionNewstudent ($nome, $email, $turma, $estilo)
    {
        $a = Usuario::find()->where(['nome' => strtoupper($nome)])
                            ->andWhere(['email' => $email])
                            ->one();

        $loginform = new LoginForm();
        $loginform->email = $email;

        if ( $a === null )  // Aluno não existe no banco de dados
        {
            $model = new Usuario();
            $model->nome = strtoupper($nome);
            $model->email = $email;
            $model->senha = md5("icomp123");
            $model->estilo = $estilo;
            $model->perfil = "Aluno";
            $d = Disciplina::findOne(['turma' => $turma]);
            $model->disciplina_id = $d->id_disciplina;
            $model->termo = 0; // Nenhuma resposta
            $model->save();  

            $loginform->senha = "icomp123";
            $loginform->login();
            // Caso do primeiro acesso no sistema, então redireciona para o termo logo.
            // 
            return $this->actionTermo(0);
        }
        else  // Aluno existe no banco de dados - só salva o estilo
        {
            $a->estilo = $estilo;
            $a->save();
            $loginform->senha = "icomp123";
            $loginform->login();
            return $this->redirect(["site/index"]); 
        }  
    }


    /**
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->identity->perfil == 'Administrador') 
        {
            $searchModel = new UsuarioSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Usuario model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if ( ( Yii::$app->user->identity->perfil === 'Aluno' && Yii::$app->user->identity->termo === 1))
        {
		$model = $this->findModel($id);  // Model Usuário

		$nomeCurso = Curso::find()->where(['id_curso' => $model->curso_id])->one();
		if ($nomeCurso != null ) $model->curso_id = $nomeCurso->nome_curso;
		else $model->curso_id = "";
		    ;
		$nomeDisciplina = Disciplina::find()->where(['id_disciplina' => $model->disciplina_id])->one();
		$model->disciplina_id = $nomeDisciplina->codigo_disciplina.' - '.$nomeDisciplina->nome_disciplina.' - Turma: '.$nomeDisciplina->turma;

		$style = Estilo::find()->where(['nome_estilo' => $model->estilo])->one();
		if ( $style != null ) $model->estilo = $style->nome_estilo;
		else $model->estilo = "";

		return $this->render('view', [
		    'model' => $model,
		]);
        }
        else return $this->actionTermo (0);
    }

    public function actionDone($id, $mensagem)
    {
        $model = $this->findModel($id);  // Model Usuário

        $nomeCurso = Curso::find()->where(['id_curso' => $model->curso_id])->one();
        if ($nomeCurso != null ) $model->curso_id = $nomeCurso->nome_curso;
        else $model->curso_id = "";

        $nomeDisciplina = Disciplina::find()->where(['id_disciplina' => $model->disciplina_id])->one();
        $model->disciplina_id = $nomeDisciplina->codigo_disciplina.' - '.$nomeDisciplina->nome_disciplina.' - Turma: '.$nomeDisciplina->turma;

        $style = Estilo::find()->where(['nome_estilo' => $model->estilo])->one();
        if ( $style != null ) $model->estilo = $style->nome_estilo;
        else $model->estilo = "";


        return $this->render('done', [
            'model' => $model,
            'mensagem' => $mensagem,
        ]);
    }

    /**
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->identity->perfil == 'Administrador')
        {
            $model = new Usuario();

            if ($model->load(Yii::$app->request->post()) && $model->save()) 
            {
                $model->senha = md5($model->senha);
                $model->nome = strtoupper($model->nome);
                $model->save();
                //return $this->redirect(['view', 'id' => $model->id_usuario]);
                return $this->redirect(['done', 'id' => $model->id_usuario, 'mensagem' => 'Usuário cadastrado com sucesso!']);
            } 
            else 
            {
                $lista = Disciplina::find()->all();
                foreach ($lista as $l)
                {
                    $l->nome_disciplina = $l->codigo_disciplina.' - '.$l->nome_disciplina.' - '.$l->turma;
                }

                $arrayDeCurso = ArrayHelper::map(CursoSearch::find()->all(), 'id_curso', 'nome_curso');
                $arrayDeDisciplina = ArrayHelper::map($lista, 'id_disciplina', 'nome_disciplina');

                //$model->perfil = "Aluno";

                return $this->render('create', [
                    'model' => $model,
                    'arrayDeCurso' => $arrayDeCurso,
                    'arrayDeDisciplina' => $arrayDeDisciplina,
                ]);
            }
        }
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) )  
        {
            $model->senha = md5($model->senha);
            $model->nome = strtoupper($model->nome);
            $model->save();
            //return $this->redirect(['view', 'id' => $model->id_usuario]);
            return $this->redirect(['done', 'id' => $model->id_usuario, 'mensagem' => 'Modificação realizada com sucesso!']);
        } 
        else 
        {
            $lista = Disciplina::find()->all();
            foreach ($lista as $l)
            {
                $l->nome_disciplina = $l->codigo_disciplina.' - '.$l->nome_disciplina.' - '.$l->turma;
            }

            $arrayDeCurso = ArrayHelper::map(CursoSearch::find()->all(), 'id_curso', 'nome_curso');
            $arrayDeDisciplina = ArrayHelper::map($lista, 'id_disciplina', 'nome_disciplina');

            //$model->perfil = "Aluno";
            //$senhaAtual = $model->senha;
            $model->senha = null;

            return $this->render('update', [
                'model' => $model,
                'arrayDeCurso' => $arrayDeCurso,
                'arrayDeDisciplina' => $arrayDeDisciplina,
            ]);
        }
    }

    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->identity->perfil == 'Administrador')
        {
             $this->findModel($id)->delete();

            return $this->redirect(['index']);           
        }
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página requisitada não existe.');
        }
    }

    public function actionRecuperarsenha()
    {
        if ( Yii::$app->request->post()) 
        {
            $email = Yii::$app->request->post('email');
            $usuario = Usuario::find()->where(['email'=>$email])->one();

            if($usuario!=null) //se o usuario com email informado existe...
            {
                $s = $usuario->senhaAleatoria();
                set_time_limit(0);
                    
                $mensagem = Yii::$app->mailer->compose()
                    ->setFrom( 'sistemas.mobmoodle@gmail.com', 'Sistemas Mobmoodle')
                    ->setTo($usuario->email)
                    ->setSubject('Nova senha')
                    ->setHtmlBody('Sua nova senha é: '. $s.'.</b> Para mudá-la, ir em "Meus dados" e, no campo Senha, informar a que desejar.')
                    ->send();

                $usuario->senha = md5($s);
                $usuario->save();


                
                return $this->render('senhaenviada');
            }
            else
            {
                return $this->render('emailnaoencontrado');
            }
        }
        else
        {
            return $this->render('recuperarsenha');
        }
    }
}
