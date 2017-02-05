<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ObjetosDeAprendizagemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Objetos De Aprendizagens';
?>
<div class="objetos-de-aprendizagem-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cadastrar Objeto', ['create'], ['class' => 'btn btn-success']) ?>
        <a href="?r=site/index" class="btn btn-default">Voltar</a>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'titulo_objeto',
            'estilo_objeto',
            'descricao_objeto',
            'tipointeratividade_objeto',
            'dificuldade_objeto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
