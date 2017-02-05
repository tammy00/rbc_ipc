<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ObjetosDeAprendizagem;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SolucaoProblemaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Soluções de Problemas';
?>
<div class="solucao-problema-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nova solução', ['create'], ['class' => 'btn btn-success']) ?>
        <a href="?r=site/index" class="btn btn-default">Voltar</a>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'diagnostico',
            'acaoPedagogica',
            [
                'attribute' => 'objetoAprendizagem',
                'value'=>function ($model, $key, $index, $widget) { 
                    $obj = ObjetosDeAprendizagem::find()->where(['id_objeto' => $model->objetoAprendizagem])->one();
                    if ( $obj === null ) return "";
                    else return $obj->titulo_objeto; 
                    
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
