<?php

namespace app\controllers;

use Yii;
use app\models\ObjetoEstilo;
use app\models\ObjetoEstiloSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use app\models\ObjetosDeAprendizagem;
use app\models\Estilo;
use app\models\ObjetosDeAprendizagemSearch;
use app\models\EstiloSearch;

/**
 * ObjetoEstiloController implements the CRUD actions for ObjetoEstilo model.
 */
class ObjetoEstiloController extends Controller
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
     * Lists all ObjetoEstilo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObjetoEstiloSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ObjetoEstilo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $estilo = Estilo::find()->where(['id_estilo' => $model->id_estilo])->one();
        if ( $estilo === null ) $model->id_estilo = "";
        else $model->id_estilo = $estilo->nome_estilo;
        
        $objeto = ObjetosDeAprendizagem::find()->where(['id_objeto' => $model->id_objeto])->one();
        $model->id_objeto = $objeto->titulo_objeto;

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionDone($id, $mensagem)
    {
        $model = $this->findModel($id);

        $estilo = Estilo::find()->where(['id_estilo' => $model->id_estilo])->one();
        if ( $estilo === null ) $model->id_estilo = "";
        else $model->id_estilo = $estilo->nome_estilo;
        
        $objeto = ObjetosDeAprendizagem::find()->where(['id_objeto' => $model->id_objeto])->one();
        $model->id_objeto = $objeto->titulo_objeto;

        return $this->render('done', [
            'model' => $model,
            'mensagem' => $mensagem,
        ]);
    }

    /**
     * Creates a new ObjetoEstilo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ObjetoEstilo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
            //return $this->redirect(['view', 'id' => $model->id_objeto_estilo]);
            return $this->redirect(['done', 'id' => $model->id_objeto_estilo, 'mensagem' => 'Relação cadastrada com sucesso!']);
        } 
        else 
        {
            $arrayDeEstilo = ArrayHelper::map(EstiloSearch::find()->all(), 'id_estilo', 'nome_estilo');
            $arrayDeObjeto = ArrayHelper::map(ObjetosDeAprendizagemSearch::find()->all(), 'id_objeto', 'titulo_objeto');
            return $this->render('create', [
                'model' => $model,
                'arrayDeEstilo' => $arrayDeEstilo,
                'arrayDeObjeto' => $arrayDeObjeto,
            ]);
        }
    }

    /**
     * Updates an existing ObjetoEstilo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
            //return $this->redirect(['view', 'id' => $model->id_objeto_estilo]);
            return $this->redirect(['done', 'id' => $model->id_objeto_estilo, 'mensagem' => 'Modificação realizada com sucesso!']);
        } 
        else {
            $arrayDeEstilo = ArrayHelper::map(EstiloSearch::find()->all(), 'id_estilo', 'nome_estilo');
            $arrayDeObjeto = ArrayHelper::map(ObjetosDeAprendizagemSearch::find()->all(), 'id_objeto', 'titulo_objeto');
            return $this->render('update', [
                'model' => $model,
                'arrayDeEstilo' => $arrayDeEstilo,
                'arrayDeObjeto' => $arrayDeObjeto,
            ]);
        }
    }

    /**
     * Deletes an existing ObjetoEstilo model.
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
     * Finds the ObjetoEstilo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ObjetoEstilo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ObjetoEstilo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
