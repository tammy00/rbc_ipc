<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */

?>
<div class="solucao-problema-view">


     <?php   
        echo Alert::widget([
            'type' => Alert::TYPE_SUCCESS,
            'title' => $mensagem,
            'icon' => 'glyphicon glyphicon-ok-sign'
        ]);
    ?>

    <p>
        <a href="?r=descricao-problema/searchsolution" class="btn btn-primary">Fazer outra busca</a>
        <a href="?r=site/index" class="btn btn-default">Voltar</a>
    </p>


</div>
