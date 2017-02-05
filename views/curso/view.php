<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */

$this->title = $model->codigo_curso.' - '.$model->nome_curso;
?>
<div class="curso-view">

    <h1><?= Html::encode($this->title) ?></h1><br>
    

    <p>
        <?= Html::a('Novo Curso', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_curso], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id_curso], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza de que quer excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
        <a href="?r=curso/index" class="btn btn-default">Voltar</a>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'nome_curso',
            'codigo_curso',
        ],
    ]) ?>

</div>
