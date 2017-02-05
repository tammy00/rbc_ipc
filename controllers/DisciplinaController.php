<?php

namespace app\controllers;

use Yii;
use app\models\Disciplina;
use app\models\DisciplinaSearch;
use app\models\CursoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * DisciplinaController implements the CRUD actions for Disciplina model.
 */
class DisciplinaController extends Controller
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
                                if ( Yii::$app->user->identity->perfil === 'Administrador' ) 
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
     * Lists all Disciplina models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DisciplinaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Disciplina model.
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
     * Creates a new Disciplina model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Disciplina();
        $arrayDeCurso = ArrayHelper::map(CursoSearch::find()->all(), 'id_curso', 'nome_curso');

        if ($model->load(Yii::$app->request->post()) ) 
        {
            $model->nome_disciplina = strtoupper($model->nome_disciplina);
            $model->codigo_disciplina = strtoupper($model->codigo_disciplina);
            $model->turma = strtoupper($model->turma);
            $model->save();


            return $this->redirect(['done', 'id' => $model->id_disciplina, 'mensagem' => 'Disciplina cadastrada com sucesso!']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'arrayDeCurso' => $arrayDeCurso,
            ]);
        }
    }

    /**
     * Updates an existing Disciplina model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $arrayDeCurso = ArrayHelper::map(CursoSearch::find()->all(), 'id_curso', 'nome_curso');

        if ($model->load(Yii::$app->request->post()) ) 
        {
            $model->nome_disciplina = strtoupper($model->nome_disciplina);
            $model->codigo_disciplina = strtoupper($model->codigo_disciplina);
            $model->turma = strtoupper($model->turma);
            $model->save();

            return $this->redirect(['done', 'id' => $model->id_disciplina, 'mensagem' => 'Modificação realizada com sucesso!']);
        } 
        else 
        {
            return $this->render('update', [
                'model' => $model,
                'arrayDeCurso' => $arrayDeCurso,
            ]);
        }
    }

    /**
     * Deletes an existing Disciplina model.
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
     * Finds the Disciplina model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Disciplina the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Disciplina::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página requistada não existe.');
        }
    }
}
