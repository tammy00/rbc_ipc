<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */

$this->title = 'Objeto: ' . $model->titulo_objeto;
?>
<div class="objetos-de-aprendizagem-view">

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
        <?= Html::a('Cadastrar Objeto', ['create'], ['class' => 'btn btn-success']) ?>
        <a href="?r=objetos-de-aprendizagem/index" class="btn btn-default">Voltar</a>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'titulo_objeto',
            'estilo_objeto',
            'estilo_objeto2',
            'estilo_objeto3',
            'descricao_objeto',
            'formato_objeto',
            'localizacao_objeto:url',
            'idioma_objeto',
            'tamanho_objeto',
            'requisitos_objeto',
            'tipointeratividade_objeto',
            'dificuldade_objeto',
            'estrutura_objeto',
            'recurso_objeto',
        ],
    ]) ?>

</div>
