<?php

namespace app\controllers;

use Yii;
use app\models\Pesquisas;
use app\models\PesquisasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\SolucaoProblema;
use app\models\SolucaoProblemaSearch;
use app\models\Usuario;
use app\models\Disciplina;
use app\models\DescricaoProblema;
use app\models\ObjetosDeAprendizagem;
use yii\swiftmailer\Mailer;
use app\models\ObjetosDeAprendizagemSearch;
use yii\helpers\ArrayHelper;

/**
 * LogDeBuscasController implements the CRUD actions for LogDeBuscas model.
 */
class PesquisasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'acess' => [
                'class' => AccessControl::className(),
                'only' => ['aluno', 'professor', 'index','update', 'view', 'delete', 'create', 'done', 'oops'],
                'rules' => [
                    [
                        'actions' => ['create','index','update', 'view', 'delete', 'aluno', 'professor', 'done', 'oops'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            if (!Yii::$app->user->isGuest)
                            {
                                if ( Yii::$app->user->identity->perfil === 'Tutor' ) 
                                {
                                    return Yii::$app->user->identity->perfil == 'Tutor'; 
                                }
                                elseif ( Yii::$app->user->identity->perfil === 'Professor' ) 
                                {
                                    return Yii::$app->user->identity->perfil == 'Professor'; 
                                }
                                elseif ( Yii::$app->user->identity->perfil === 'Aluno' && Yii::$app->user->identity->termo === 1)
                                {
                                    return Yii::$app->user->identity->perfil == 'Aluno'; 
                                }
                                elseif ( Yii::$app->user->identity->perfil === 'Administrador' ) 
                                {
                                    return Yii::$app->user->identity->perfil == 'Administrador'; 
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

    /**
     * Lists all LogDeBuscas models.
     * @return mixed
     */
    public function actionIndex()
    {
        if ( Yii::$app->user->identity->perfil === 'Administrador' ) { 
            $searchModel = new PesquisasSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }
    
   

    public function actionOops()
    {
        return $this->render('oops');
    }

    /**
     * Displays a single LogDeBuscas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        //$aluno = Usuario::findOne(['id_usuario' => $model->aluno_id]);

        //$model->aluno_id = $aluno->nome;

        Yii::$app->formatter->locale = 'pt-BR';
        $model->data_criacao = Yii::$app->formatter->asDate($model->data_criacao);

        $solucao = SolucaoProblema::findOne($model->solucao_id);
        $obj = ObjetosDeAprendizagem::findOne($solucao->objetoAprendizagem);
/*
        if ( $obj === null )
        {
                return $this->redirect(["pesquisas/oops"]);
        }
        else 
        {  */
            return $this->render('view', [
                'model' => $model,
                'obj' => $obj,
            ]);
       //}
    }

    public function actionDone($id, $mensagem)
    {
        $model = $this->findModel($id);

       /* if ( Yii::$app->user->identity->perfil === 'Aluno')
        {
            $aluno = Usuario::findOne(['id_usuario' => $model->aluno_id]);
            $model->aluno_id = $aluno->nome;
        }*/

        Yii::$app->formatter->locale = 'pt-BR';
        $model->data_criacao = Yii::$app->formatter->asDate($model->data_criacao);

        return $this->render('done', [
            'model' => $model,
            'mensagem' => $mensagem,
        ]);  
    }

    /**
     * Displays a single LogDeBuscas model.
     * @param integer $id
     * @return mixed
     */
    public function actionAluno()
    {
        if ( Yii::$app->user->identity->perfil === 'Aluno' )
        {
            $searchModel = new PesquisasSearch();
            //$searchModel = LogDeBuscas::find()->where(['aluno_id' => Yii::$app->user->identity->id_usuario]);
            $dataProvider = $searchModel->searchToAluno(Yii::$app->request->queryParams);

            return $this->render('aluno', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single LogDeBuscas model.
     * @param integer $id
     * @return mixed
     */
    public function actionProfessor()
    {
        if ( Yii::$app->user->identity->perfil === 'Professor' || Yii::$app->user->identity->perfil === 'Tutor' )
        {
            $searchModel = new PesquisasSearch();
            $dataProvider = $searchModel->searchToProfessor(Yii::$app->request->queryParams);

            return $this->render('professor', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

    }

    /**
     * Creates a new LogDeBuscas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idSolucao, $similaridade, $tema, $topico, $des, $estilo, $natureza)
    {
        if ( Yii::$app->user->identity->perfil === 'Aluno' || Yii::$app->user->identity->perfil === 'Administrador')
        {
            $model = new Pesquisas();
            $model->data_criacao = date('Y-m-d');
            $model->solucao_id = $idSolucao;
            $model->tema = $tema;   // // tema salvo
            $model->topico = $topico; // tópico salvo
            $model->natureza = $natureza; // natureza salva
            $model->aluno_id = Yii::$app->user->identity->id_usuario;
            $model->status = "N/S";
            $model->duvida = $des;  // descrição salva
            $model->feedback = "";
            $model->acao = "";

            $turma = Disciplina::findOne(Yii::$app->user->identity->disciplina_id);
            $model->turma = $turma->turma;
            
            $model->save();
        }

            return Yii::$app->runAction('solucao-problema/solutionfound', [
                'idSolucao' => $idSolucao, 
                'similaridade' => $similaridade, 
                'etapa' => 2,
                'tema' => $tema, 
                'topico' => $topico, 
                'des' => $des, 
                'estilo' => $estilo, 
                'natureza' => $natureza
                ]);
    }

    /**
     * Updates an existing LogDeBuscas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)  // Aluno não é permitido entrar
    {
        if ( Yii::$app->user->identity->perfil != "Aluno" )
            {
            $model = $this->findModel($id);
            $aluno = Usuario::find()->where(['id_usuario'=>$model->aluno_id])->one();

            if ($model->load(Yii::$app->request->post()) ) 
            {
                $turma = Disciplina::findOne(Yii::$app->user->identity->disciplina_id);

                if (Yii::$app->user->identity->perfil === "Professor" || Yii::$app->user->identity->perfil === "Tutor")
                {

                     //$aluno = Usuario::find()->where(['id_usuario' => $model->aluno_id])->one();// Encontra o model do aluno...
                    // .... Para conseguir pegar o email dele

                    $sol1 = SolucaoProblema::find()->orderBy(['id_solucaoProblema' => SORT_DESC])->one();
                    //$desc = DescricaoProblema::find()->orderBy(['id_descProblema' => SORT_DESC])->one();
                    /*Solucao do Problema */
                    $novaSolucao = new SolucaoProblema();
                    $novaSolucao->objetoAprendizagem = $model->objeto;
                    $novaSolucao->acaoPedagogica = $model->acao;
                    if ($model->diagnostico == null ) 
                    { 
                        $d = SolucaoProblema::find()->where(['id_solucaoProblema' => ($model->listadiagnosticos + 1)])->one();
                        $novaSolucao->diagnostico = $d->diagnostico;
                    }
                    else 
                    {
                        $novaSolucao->diagnostico = $model->diagnostico;
                    }
                    $novaSolucao->save(); // NOVA SOLUÇÃO É SALVa

                    $sol2 = SolucaoProblema::find()->orderBy(['id_solucaoProblema' => SORT_DESC])->one();

                    if ( $sol2->id_solucaoProblema == ($sol1->id_solucaoProblema + 1)) // Para ter certeza de que a solução foi salva
                    {

                         /*Descricao do Problema */
                        $novaDescricao = new DescricaoProblema();
                        $novaDescricao->tema = $model->tema;
                        $novaDescricao->topico = $model->topico;
                        $novaDescricao->descrProblema = $model->duvida;
                        $novaDescricao->naturezaProblema = $model->natureza;
                        $novaDescricao->estiloAprendizagem = $aluno->estilo;
                        $novaDescricao->save();  // NOVA DESCRIÇÃO É SALVA

                         /*SALVANDO NA TABELA PESQUISA*/
                        $model->solucao_id = $novaSolucao->id_solucaoProblema;
                        $model->status = "Resolvido";
                        if ($model->diagnostico == null ) 
                        { 
                            $d = SolucaoProblema::find()->where(['id_solucaoProblema' => ($model->listadiagnosticos + 1)])->one();
                            $model->feedback = $d->diagnostico;
                    
                        }
                        else 
                        {
                            $model->feedback = $model->diagnostico;
                        }
                        $model->save(); 
                    }
                    else 
                    {

                        return $this->actionDelete($sol2);
                    }


                    $tutor_professor = Usuario::find()->where(['id_usuario' => Yii::$app->user->identity->id_usuario])->one();
                

                    //->where(['aluno_id' => (Yii::$app->user->identity->id_usuario)])->orderBy(['id_log' => SORT_DESC])->one();

                     $pesquisa = Pesquisas::find()->where(['aluno_id' => $aluno->id_usuario])->orderBy(['id_log' => SORT_DESC])->one();

                     
                     $pesquisalog = 'http://mobmoodle.icomp.ufam.edu.br/pbn/rbc_ipc/web/index.php?r=pesquisas/view&id='.$pesquisa->id_log;
                    
                    set_time_limit(0);
                    
                        $mensagem = Yii::$app->mailer->compose()
                                 ->setFrom($tutor_professor->email, $tutor_professor->nome)
                                 ->setTo($aluno->email)
                                 ->setSubject('[IPC - '.$turma->turma.'] Sua dúvida foi solucionada')
                                 ->setHtmlBody('Prezado '.$aluno->nome.'<br>Sua solicitação foi respondida pelo professor/tutor.<br></br><br>'.$pesquisalog.'</br><p>Att.</p><p>Sistemas MobMoodle</p>')
                                 ->send();  
                }

                return $this->redirect(['done', 'id' => $model->id_log, 'mensagem' => 'Modificação realizada!']);
            } 
            else 
            {
                $descricao = DescricaoProblema::findOne($model->solucao_id);
                $solucao = SolucaoProblema::findOne($model->solucao_id);
                $obj = ObjetosDeAprendizagem::findOne($solucao->objetoAprendizagem);


                if ( $descricao === null || $solucao === null || $obj === null )
                {
                        return $this->redirect(["pesquisas/oops"]);
                }
                else 
                {
                    
                    $arrayDiagnosticos = SolucaoProblema::find()->select('diagnostico')->distinct()->asArray()->column();
                    //ArrayHelper::map(SolucaoProblemaSearch::find()->select('diagnostico')->distinct()->asArray()->all(), 'id_solucaoProblema', 'diagnostico');

                    $arrayDeObjeto = ArrayHelper::map(ObjetosDeAprendizagemSearch::find()->where(['estilo_objeto'=>$aluno->estilo])-> all(), 'id_objeto', 'titulo_objeto');


                    return $this->render('update', [
                        'model' => $model,
                        'descricao' => $descricao,
                        'solucao' => $solucao,
                        'obj' => $obj,
                        'arrayDeObjeto' => $arrayDeObjeto,
                        'arrayDiagnosticos' => $arrayDiagnosticos,
                    ]);
                }
            }
        }
        else
        {
            return $this->redirect(["site/index"]);
        }
    }

    /**
     * Deletes an existing LogDeBuscas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {/*
        if ( Yii::$app->user->identity->perfil === 'Administrador' ) 
        {   */
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        //}
    }

    /**
     * Finds the LogDeBuscas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LogDeBuscas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pesquisas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página requisitada não existe.');
        }
    }
}
