<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */

$this->title ='Solução do Caso #' . $model->id_solucaoProblema;
?>
<div class="solucao-problema-view">

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
        <a href="?r=solucao-problema/index" class="btn btn-default">Soluções registradas</a>
        <a href="?r=site/index" class="btn btn-default">Voltar</a>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'diagnostico',
            'acaoPedagogica',
            'objetoAprendizagem',
        ],
    ]) ?>

</div>
