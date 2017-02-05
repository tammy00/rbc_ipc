<?php

namespace app\controllers;

use Yii;
use app\models\Estilo;
use app\models\EstiloSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * EstiloController implements the CRUD actions for Estilo model.
 */
class EstiloController extends Controller
{
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
     * Lists all Estilo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstiloSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estilo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDone($id, $mensagem)
    {
        return $this->render('done', [
            'model' => $this->findModel($id),
            'mensagem' => $mensagem,
        ]);
    }

    /**
     * Creates a new Estilo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Estilo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_estilo]);
            return $this->redirect(['done', 'id' => $model->id_estilo, 'mensagem' => 'Estilo cadastrado com sucesso!']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Estilo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_estilo]);
            return $this->redirect(['done', 'id' => $model->id_estilo, 'mensagem' => 'Modificação realizada com sucesso!']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Estilo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Estilo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Estilo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Estilo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página requisitada não existe.');
        }
    }
}
