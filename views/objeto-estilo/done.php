<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */

$this->title = 'Relação objeto-estilo';
?>
<div class="objeto-estilo-view">

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
        <?= Html::a('Nova relação objeto-estilo', ['create'], ['class' => 'btn btn-success']) ?>
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
