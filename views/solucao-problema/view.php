<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SolucaoProblema */

$this->title ='Solução do Caso #' . $model->id_solucaoProblema;
?>
<div class="solucao-problema-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_solucaoProblema], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id_solucaoProblema], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza de que deseja excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
        <a href="?r=solucao-problema/index" class="btn btn-default">Soluções registradas</a>
    </p>
    <p>
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
