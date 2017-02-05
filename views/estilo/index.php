<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstiloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estilos';
?>
<div class="estilo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Novo Estilo', ['create'], ['class' => 'btn btn-success']) ?>
        <a href="?r=site/index" class="btn btn-default">Voltar</a>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'nome_estilo',

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
