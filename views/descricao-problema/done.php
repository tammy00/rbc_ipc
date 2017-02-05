<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */

$this->title = 'Descrição do Caso #' . $model->id_descProblema;
?>
<div class="descricao-problema-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php   
        echo Alert::widget([
            'type' => Alert::TYPE_SUCCESS,
            'title' => $mensagem,
            'icon' => 'glyphicon glyphicon-ok-sign',
            'delay' => 2000
        ]);
    ?>
    <p>
        <?= Html::a('Nova Descrição', ['create'], ['class' => 'btn btn-success']) ?>
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
