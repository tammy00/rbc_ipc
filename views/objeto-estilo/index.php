<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Estilo;
use app\models\ObjetosDeAprendizagem;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ObjetoEstiloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Relações entre objetos e estilos';
?>
<div class="objeto-estilo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nova relação objeto-estilo', ['create'], ['class' => 'btn btn-success']) ?>
        <a href="?r=site/index" class="btn btn-default">Voltar</a>
    </p>
    <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_objeto',
                'value'=>function ($model, $key, $index, $widget) { 
                    if ( $model->id_objeto === null ) return "";
                    else 
                    {
                        $obj = ObjetosDeAprendizagem::find()->where(['id_objeto' => $model->id_objeto])->one();
                        return $obj->titulo_objeto; 
                    } 
                },
            ],
            [
                'attribute' => 'id_estilo',
                'value'=>function ($model, $key, $index, $widget) { 
                    if ( $model->id_estilo === null ) return "";
                    else 
                    {
                        $estilo = Estilo::find()->where(['id_estilo' => $model->id_estilo])->one();
                        return $estilo->nome_estilo; 
                    } 
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Ações',
                'headerOptions' => ['style' => 'text-align:center; color:#337AB7'],
                'contentOptions' => ['style' => 'text-align:center; vertical-align:middle'],
                'template' => '{update} {delete}',

            ],
        ],
    ]); ?>
</div>
