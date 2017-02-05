<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LogDeBuscasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Minhas buscas';
?>
<div class="pesquisas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* Html::a('Create Log De Buscas', ['create'], ['class' => 'btn btn-success'])*/ ?>
        <a href="?r=site/index" class="btn btn-default">Voltar</a>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'data_criacao',
                'format' => ['date', 'php:d/m/Y']
            ],  
            'status',
            'duvida',
            'feedback',
        
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
