<?php

namespace app\controllers;

use Yii;
use app\models\DescricaoProblema;
use app\models\SolucaoProblema;
use app\models\SolucaoProblemaSearch;
use app\models\ObjetosDeAprendizagem;
use app\models\Pesquisas;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\ObjetosDeAprendizagemSearch;
use yii\helpers\ArrayHelper;
use yii\swiftmailer\Mailer;
use app\models\Usuario;
use app\models\Disciplina;

/**
 * SolucaoProblemaController implements the CRUD actions for SolucaoProblema model.
 */
class SolucaoProblemaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'acess' => [
                'class' => AccessControl::className(),
                'only' => ['create','index','update', 'view', 'delete', 'solutionfound', 'done'],
                'rules' => [
                    [
                        'actions' => ['create','index','update', 'view', 'delete', 'solutionfound', 'done'],
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
                                elseif ( Yii::$app->user->identity->perfil === 'Aluno' ) 
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
     * Lists all SolucaoProblema models.
     * @return mixed
     */
    public function actionIndex()
    {
        if ( Yii::$app->user->identity->perfil === 'Administrador' ||
           Yii::$app->user->identity->perfil === 'Professor' ||
           Yii::$app->user->identity->perfil === 'Tutor' )
        {
            $searchModel = new SolucaoProblemaSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single SolucaoProblema model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $obj = ObjetosDeAprendizagem::find()->where(['id_objeto' => $model->objetoAprendizagem])->one();

        if ( $obj === null ) $model->objetoAprendizagem = "";
        else $model->objetoAprendizagem = $obj->titulo_objeto;

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionDone($id, $mensagem)
    {
        $model = $this->findModel($id);

        $obj = ObjetosDeAprendizagem::find()->where(['id_objeto' => $model->objetoAprendizagem])->one();

        if ( $obj === null ) $model->objetoAprendizagem = "";
        else $model->objetoAprendizagem = $obj->titulo_objeto;

        return $this->render('done', [
            'model' => $model,
            'mensagem' => $mensagem,
        ]);
    }

    /**
     * A partir de um caso semelhante encontrado pelo servidor RBC,
     * a função abaixo exibe a solução e o grau de similaridade entre 
     * a descrição do problema dado pelo usuário e o caso no banco de dados.
     */

    public function actionSolutionfound($idSolucao, $similaridade, $etapa, $tema, $topico, $des, $estilo, $natureza)
    {
        if ( $etapa == 1) // Registra a busca primeiro
        {
            return Yii::$app->runAction('pesquisas/create', [
                'idSolucao' => $idSolucao, 
                'similaridade' => $similaridade,
                'tema' => $tema, 
                'topico' => $topico, 
                'des' => $des, 
                'estilo' => $estilo, 
                'natureza' => $natureza
                ]);
        }
        elseif ( $etapa == 2 ) // Exibe a solução do caso mais similar
        {
            $model = $this->findModel($idSolucao);

            $similarity = round(($similaridade * 100 ));  // Transformação em porcentagem

            $obj = ObjetosDeAprendizagem::find()->where(['id_objeto' => $model->objetoAprendizagem])->one();
            //if ( $obj === null ) return $this->redirect(['site/index']);

            if ( $obj != null )
            {
                return $this->render('solutionfound', [
                    'model' => $model,
                    'similaridade' => $similarity,
                    'obj' => $obj,
                    'tema' => $tema, 
                    'topico' => $topico, 
                    'des' => $des, 
                    'estilo' => $estilo, 
                    'natureza' => $natureza
                ]); 
            }
            else { //return $this->redirect(["pesquisas/oops"]);
                return $this->render('solutionfound', [
                    'model' => $model,
                    'similaridade' => $similarity,
                    'obj' => null,
                    'tema' => $tema, 
                    'topico' => $topico, 
                    'des' => $des, 
                    'estilo' => $estilo, 
                    'natureza' => $natureza
                ]); 
            }
        }
 
    }

    /**
     * Creates a new SolucaoProblema model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if ( Yii::$app->user->identity->perfil === 'Administrador' ||
           Yii::$app->user->identity->perfil === 'Professor' ||
           Yii::$app->user->identity->perfil === 'Tutor' )
        {
            $model = new SolucaoProblema();

            if ($model->load(Yii::$app->request->post()) && $model->save()) 
            {
                //return  Yii::$app->runAction('objetos-de-aprendizagem/create');
                //return $this->redirect(['view', 'id' => $model->id_solucaoProblema]);
                return $this->redirect(['done', 'id' => $model->id_solucaoProblema, 'mensagem' => 'Solução cadastrada com sucesso!']);
            } 
            else 
            {
                // Envia o model da última descrição de problema registrada.
                $descricao = DescricaoProblema::find()->orderBy(['id_descProblema' => SORT_DESC])->one();

                $arrayDeObjeto = ArrayHelper::map(ObjetosDeAprendizagemSearch::find()->all(), 'id_objeto', 'titulo_objeto');

                return $this->render('create', [
                    'model' => $model,
                    'descricao' => $descricao,
                    'arrayDeObjeto' => $arrayDeObjeto,
                ]);
            }
        }
    }

    /**
     * Updates an existing SolucaoProblema model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if ( Yii::$app->user->identity->perfil === 'Administrador' ||
           Yii::$app->user->identity->perfil === 'Professor' ||
           Yii::$app->user->identity->perfil === 'Tutor' )
        {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                //return $this->redirect(['view', 'id' => $model->id_solucaoProblema]);
                return $this->redirect(['done', 'id' => $model->id_solucaoProblema, 'mensagem' => 'Modificação realizada com sucesso!']);
            } else {
                $descricao = DescricaoProblema::find()->where(['id_descProblema' => $model->id_solucaoProblema])->one();
                $arrayDeObjeto = ArrayHelper::map(ObjetosDeAprendizagemSearch::find()->all(), 'id_objeto', 'titulo_objeto');
                return $this->render('update', [
                    'model' => $model,
                    'descricao' => $descricao,
                    'arrayDeObjeto' => $arrayDeObjeto,
                ]);
            }
        }
    }

    /**
     * Deletes an existing SolucaoProblema model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if ( Yii::$app->user->identity->perfil === 'Administrador' ||
           Yii::$app->user->identity->perfil === 'Professor' ||
           Yii::$app->user->identity->perfil === 'Tutor' )
        {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the SolucaoProblema model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SolucaoProblema the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SolucaoProblema::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página requistada não existe.');
        }
    }

    public function actionDidhelp($idsol, $tema, $topic, $desc, $natureza, $estilo)
    {
        // cria solução e depois vai para o actionNewcasedescription

        $sol = SolucaoProblema::findOne($idsol);
        
        $nova_solucao = new SolucaoProblema();
        $nova_solucao->acaoPedagogica = $sol->acaoPedagogica;
        $nova_solucao->diagnostico = $sol->diagnostico;
        $nova_solucao->objetoAprendizagem = $sol->objetoAprendizagem; 
        $nova_solucao->save();

        $nova_descricao = new DescricaoProblema();
        $nova_descricao->tema = $tema;
        $nova_descricao->topico = $topic;
        $nova_descricao->descrProblema = $desc;
        $nova_descricao->naturezaProblema = $natureza;
        $nova_descricao->estiloAprendizagem = $estilo;
        $nova_descricao->save();  

        $pesquisa = Pesquisas::find()->where(['aluno_id' => Yii::$app->user->identity->id_usuario])->orderBy(['id_log' => SORT_DESC])->one();
        $pesquisa->solucao_id = $nova_solucao->id_solucaoProblema;
        $pesquisa->aluno_id = Yii::$app->user->identity->id_usuario; // Só um reforço, se não banco fresca
        $pesquisa->tema = $tema;
        $pesquisa->topico = $topic;
        $pesquisa->duvida = $desc;
        $pesquisa->natureza = $natureza;
        $pesquisa->save();

        //return $this->redirect(["site/index"]);

        return $this->render('didhelp', [
            'mensagem' => 'Caso salvo!',
        ]);

    }

    public function actionDidnothelp($tema, $topic, $desc, $natureza, $estilo)
    {
        $professor = Usuario::find()
                ->where(['disciplina_id' => Yii::$app->user->identity->disciplina_id])
                ->andWhere(['perfil' => "Professor"])
                ->one();
        $tutor = Usuario::find()
                ->where(['disciplina_id' => Yii::$app->user->identity->disciplina_id])
                ->andWhere(['perfil' => "Tutor"])
                ->one();

        $turma = Disciplina::findOne(Yii::$app->user->identity->disciplina_id);

        $pesquisa = Pesquisas::find()->where(['aluno_id' => (Yii::$app->user->identity->id_usuario)])->orderBy(['id_log' => SORT_DESC])->one();  
        $pesquisa->aluno_id = Yii::$app->user->identity->id_usuario;
        $pesquisa->status = 'Submetido';
        $pesquisa->save();
        $pesquisalog = 'http://localhost:9090/rbc_ipc/web/index.php?r=pesquisas/view&id='.$pesquisa->id_log;


        if ( $professor != null) // Se houver algum professor que lecione para a disciplina que o aluno logado está matriculado
        { 
            
            set_time_limit(0);              
            $mensagem = Yii::$app->mailer->compose()
                ->setFrom(Yii::$app->user->identity->email, Yii::$app->user->identity->nome)
                ->setTo($professor->email)
                ->setSubject('[IPC - '.$turma->turma.'] Notificação de dúvida de aluno')
                ->setHtmlBody('<b>Tema:</b> '.$tema.'<br><b>Tópico:</b> '.$topic.'<br><b>Descrição do Problema:</b> '.$desc.'<br>
                    <b>Natureza do Problema:</b> '.$natureza.'<br><b>Estilo de Aprendizagem:</b> '.$estilo.'<br><br><br>O nome do 
                    aluno com dúvida é <b>'.Yii::$app->user->identity->nome.'.</b><p><p>'.$pesquisalog.'<p><p><p>Att.</p><p>Sistemas MobMoodle</p>')
                ->send();
        }
        if ( $tutor != null ) // Se houver algum tutor que lecione para a disciplina que o aluno logado está matriculado
        {
            set_time_limit(0);
                    
            $mensagem = Yii::$app->mailer->compose()
                ->setFrom(Yii::$app->user->identity->email, Yii::$app->user->identity->nome)
                ->setTo($tutor->email)
                ->setSubject('[IPC - '.$turma->turma.'] Notificação de dúvida de aluno')
                ->setHtmlBody('<b>Tema:</b> '.$tema.'<br><b>Tópico:</b> '.$topic.'<br><b>Descrição do Problema:</b> '.$desc.'<br>
                    <b>Natureza do Problema:</b> '.$natureza.'<br><b>Estilo de Aprendizagem:</b> '.$estilo.'<br><br><br>O nome do 
                    aluno com dúvida é <b>'.Yii::$app->user->identity->nome.'.</b><p><p>'.$pesquisalog.'<p><p><p>Att.</p><p>Sistemas MobMoodle</p>')
                ->send();
        }

        
        return $this->render('didhelp', [
            'mensagem' => 'A sua dúvida foi enviada por e-mail para o seu professor e tutor(es)!',
        ]);  

    }  


}
