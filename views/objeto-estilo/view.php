<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ObjetoEstilo */

$this->title = 'Relação objeto-estilo';
?>
<div class="objeto-estilo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nova relação objeto-estilo', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_objeto_estilo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id_objeto_estilo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza de que quer excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
        <a href="?r=objeto-estilo/index" class="btn btn-default">Voltar</a>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_objeto',
            'id_estilo',
        ],
    ]) ?>

</div>
