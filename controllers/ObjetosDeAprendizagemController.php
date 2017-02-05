<?php

namespace app\controllers;

use Yii;
use app\models\ObjetosDeAprendizagem;
use app\models\SolucaoProblema;
use app\models\ObjetosDeAprendizagemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\models\EstiloSearch;
use yii\helpers\ArrayHelper;
use app\models\Estilo;

/**
 * ObjetosDeAprendizagemController implements the CRUD actions for ObjetosDeAprendizagem model.
 */
class ObjetosDeAprendizagemController extends Controller
{

    //ini_set('upload_max_filesize', '200M');
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'acess' => [
                'class' => AccessControl::className(),
                'only' => ['create','index','update', 'view', 'delete', 'done'],
                'rules' => [
                    [
                        'actions' => ['create','index','update', 'view', 'delete', 'done'],
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
     * Lists all ObjetosDeAprendizagem models.
     * @return mixed
     */
    public function actionIndex()
    {
        if ( Yii::$app->user->identity->perfil === 'Administrador' || 
            Yii::$app->user->identity->perfil === 'Professor' ||
            Yii::$app->user->identity->perfil === 'Tutor' ) { 
            $searchModel = new ObjetosDeAprendizagemSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single ObjetosDeAprendizagem model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $estilo = Estilo::find()->where(['id_estilo' => $model->estilo_objeto])->one();
        $estilo2 = Estilo::find()->where(['id_estilo' => $model->estilo_objeto2])->one();
        $estilo3 = Estilo::find()->where(['id_estilo' => $model->estilo_objeto3])->one();
        if ($estilo != null) $model->estilo_objeto = $estilo->nome_estilo; 
        else $model->estilo_objeto = "";
        if ($estilo2 != null) $model->estilo_objeto2 = $estilo2->nome_estilo; 
        else $model->estilo_objeto2 = "";
        if ($estilo3 != null) $model->estilo_objeto3 = $estilo3->nome_estilo; 
        else $model->estilo_objeto3 = "";
        
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionDone($id, $mensagem)
    {
        $model = $this->findModel($id);
/*
        $estilo = Estilo::find()->where(['id_estilo' => $model->estilo_objeto])->one();
        $estilo2 = Estilo::find()->where(['id_estilo' => $model->estilo_objeto2])->one();
        $estilo3 = Estilo::find()->where(['id_estilo' => $model->estilo_objeto3])->one();
        if ($estilo != null) $model->estilo_objeto = $estilo->nome_estilo; 
        else $model->estilo_objeto = "";
        if ($estilo2 != null) $model->estilo_objeto2 = $estilo2->nome_estilo; 
        else $model->estilo_objeto2 = "";
        if ($estilo3 != null) $model->estilo_objeto3 = $estilo3->nome_estilo; 
        else $model->estilo_objeto3 = "";  */
        
        return $this->render('done', [
            'model' => $model,
            'mensagem' => $mensagem,
        ]);
    }

    /**
     * Creates a new ObjetosDeAprendizagem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if ( Yii::$app->user->identity->perfil === 'Administrador' || 
            Yii::$app->user->identity->perfil === 'Professor' || 
            Yii::$app->user->identity->perfil === 'Tutor')
        {
            $model = new ObjetosDeAprendizagem();

            if ($model->load(Yii::$app->request->post()) )
            {
                if ( $model->localizacao_objeto == null )
                {
                    $n = 0; 
                    $num = ObjetosDeAprendizagem::find()->orderBy(['id_objeto' => SORT_DESC])->one();
                    // O comando acima pega o id registrado mais recente (o maior id)

		    $style1 = Estilo::find()->where(['id_estilo' => $model->estilo_objeto])->one();
                    if ($style1 != null ) $model->estilo_objeto = $style1->nome_estilo;
                    else $model->estilo_objeto = "";

		    $style2 = Estilo::find()->where(['id_estilo' => $model->estilo_objeto2])->one();
                    if ($style2 != null ) $model->estilo_objeto2 = $style2->nome_estilo;
                    else $model->estilo_objeto = "";

		    $style3 = Estilo::find()->where(['id_estilo' => $model->estilo_objeto3])->one();
                    if ($style3 != null ) $model->estilo_objeto3 = $style3->nome_estilo;
                    else $model->estilo_objeto = "";

                    if ( $num->id_objeto == null ) $n = 0; // No caso do banco de dados estar vazio
                    else $n = $num->id_objeto + 1;   

                    $model->file = UploadedFile::getInstance($model, 'file');
                    $model->pathArquivo = 'uploads/loms/' . $n . '.' . $model->file->extension;


                    $model->formato_objeto = $model->file->extension;
                    $model->tamanho_objeto = $this->formatSizeUnits($model->file->size);

                    $model->file->saveAs('uploads/loms/'.$n.'.'.$model->file->extension);
                }
                else
                {
                    
                    $model->pathArquivo = null;
                    $model->tamanho_objeto = "";
                    $model->formato_objeto = "";
                }

                $model->save();

                //return $this->redirect(['view', 'id' => $model->id_objeto]);
                return $this->redirect(['done', 'id' => $model->id_objeto, 'mensagem' => 'Objeto cadastrado com sucesso!']);

            } 
            else 
            {
                $arrayDeEstilo = ArrayHelper::map(EstiloSearch::find()->all(), 'id_estilo', 'nome_estilo');
                return $this->render('create', [
                    'model' => $model,
                    'arrayDeEstilo' => $arrayDeEstilo,
                ]);
            }
        }
    }

    /**
     * Updates an existing ObjetosDeAprendizagem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if ( Yii::$app->user->identity->perfil === 'Administrador' || 
            Yii::$app->user->identity->perfil === 'Professor' || 
            Yii::$app->user->identity->perfil === 'Tutor')
        {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) ) 
            {
                if ( $model->localizacao_objeto == null && $model->file != null ) // Há um novo arquivo upado.
                {
                    $model->file = UploadedFile::getInstance($model, 'file');
                    $model->pathArquivo = 'uploads/loms/' . $model->id_objeto . '.' . $model->file->extension;


                    $model->formato_objeto = $model->file->extension;
                    $model->tamanho_objeto = $this->formatSizeUnits($model->file->size);

                    $model->file->saveAs('uploads/loms/'.$model->id_objeto.'.'.$model->file->extension);
                }
                elseif ( $model->localizacao_objeto != null && $model->file == null ) // Obj novo é site ou um vídeo no youtube
                {
                    $model->pathArquivo = "";
                    $model->tamanho_objeto = "";
                    $model->formato_objeto = "";
                }

                $model->save();

                //return $this->redirect(['view', 'id' => $model->id_objeto]);
                return $this->redirect(['done', 'id' => $model->id_objeto, 'mensagem' => 'Modificação realizadda com sucesso!']);
            } 
            else 
            {
                $arrayDeEstilo = ArrayHelper::map(EstiloSearch::find()->all(), 'id_estilo', 'nome_estilo');
                    return $this->render('update', [
                        'model' => $model,
                        'arrayDeEstilo' => $arrayDeEstilo,
                    ]);
            }
        }
    }

    /**
     * Deletes an existing ObjetosDeAprendizagem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
            if ( Yii::$app->user->identity->perfil === 'Administrador' || 
            Yii::$app->user->identity->perfil === 'Professor' || 
            Yii::$app->user->identity->perfil === 'Tutor')
        {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the ObjetosDeAprendizagem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ObjetosDeAprendizagem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ObjetosDeAprendizagem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página requistada não existe.');
        }
    }

    public function actionUpdatelom ($idSolucao)
    {
        if ( Yii::$app->user->identity->perfil === 'Administrador' || 
            Yii::$app->user->identity->perfil === 'Professor' || 
            Yii::$app->user->identity->perfil === 'Tutor') 
        {
            $modelSolucao = SolucaoProblema::findOne(['id_solucaoProblema' => $idSolucao]);

            $model = $this->findModel($modelSolucao->objetoAprendizagem);

             if ( $model->load(Yii::$app->request->post()) && $model->save() )
             {
                return $this->actionView($model->id_objeto);
             }
             else {
                return $this->render('updatelom', [
                    'modelSolucao' => $modelSolucao,
                    'model' => $model,
                ]);
            }

        }
    }

    public  function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' kB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

}
