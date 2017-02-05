<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estilo */

$this->title = $model->nome_estilo;
?>
<div class="estilo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo Estilo', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_estilo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id_estilo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza de que quer excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
        <a href="?r=estilo/index" class="btn btn-default">Voltar</a>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome_estilo',
        ],
    ]) ?>

</div>
