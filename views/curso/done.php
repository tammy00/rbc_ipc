<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */

$this->title = $model->codigo_curso.' - '.$model->nome_curso;
?>
<div class="curso-view">

    <h1><?= Html::encode($this->title) ?></h1><br>
    <?php   
        echo Alert::widget([
            'type' => Alert::TYPE_SUCCESS,
            'title' => $mensagem,
            'icon' => 'glyphicon glyphicon-ok-sign',
            'delay' => 2000
        ]);
    ?>
    <p>
        <?= Html::a('Novo Curso', ['create'], ['class' => 'btn btn-success']) ?>
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
