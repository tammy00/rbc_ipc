<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DescricaoProblemaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Descrições de Problemas';

?>
<div class="descricao-problema-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nova descrição', ['create'], ['class' => 'btn btn-success']) ?>
        <a href="?r=site/index" class="btn btn-default">Voltar</a>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'tema',
            'topico',
            'estiloAprendizagem',
            'descrProblema',
            'naturezaProblema',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
