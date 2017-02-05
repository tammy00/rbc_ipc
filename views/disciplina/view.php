<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Disciplina */

$this->title =  $model->codigo_disciplina . ' - ' . $model->nome_disciplina;
?>
<div class="disciplina-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nova Disciplina', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_disciplina], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id_disciplina], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza de que quer excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
        <a href="?r=disciplina/index" class="btn btn-default">Voltar</a>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome_disciplina',
            'codigo_disciplina',
            'curso_id',
            'turma',
        ],
    ]) ?>

</div>
