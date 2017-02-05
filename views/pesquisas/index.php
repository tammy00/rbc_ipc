<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LogDeBuscasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dúvidas submetidas';
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

            'solucao_id',
            'duvida',
            'feedback',
            [
                'attribute' => 'data_criacao',
                'format' => ['date', 'php:d/m/Y']
            ],  
            'turma',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
            ],
        ],
    ]); ?>
</div>
