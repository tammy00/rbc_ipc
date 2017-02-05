<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DescricaoProblema */

$this->title = 'Descrição do Caso #' . $model->id_descProblema;
?>
<div class="descricao-problema-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nova Descrição', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_descProblema], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id_descProblema], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza de que deseja excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
        <a href="?r=descricao-problema/index" class="btn btn-default">Descrições registradas</a>
        <?= Html::a('Soluções registradas', ['solucao-problema/index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tema',
            'topico',
            'estiloAprendizagem',
            'descrProblema',
            'naturezaProblema',
        ],
    ]) ?>

</div>
