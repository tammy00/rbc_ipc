<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */

$this->title = 'Dúvida de ' . $model->aluno_id;
?>
<div class="pesquisas-view">

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
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_log], ['class' => 'btn btn-primary']) ?>

        <?php if ( Yii::$app->user->identity->perfil === 'Aluno' ) { ?>
            <a href="?r=pesquisas/aluno" class="btn btn-default">Voltar</a>
        <?php } ?>
        <?php if ( Yii::$app->user->identity->perfil === 'Professor' || Yii::$app->user->identity->perfil === 'Tutor' ) { ?>
            <a href="?r=pesquisas/professor" class="btn btn-default">Voltar</a>
        <?php } ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'options' => [
            'class' => 'table table-striped table-bordered detail-view',
            'style' => 'width:75%'
        ],
        'attributes' => [
            'aluno_id',
            'status',
            'duvida',
            'estilo',
            'topico',
            'tema',
            'natureza',
            'feedback',
            [
                'attribute' => 'acao',
                'label' => 'Ação Pedagógica',
                //'format' => ['date', 'php:d/m/Y']
            ],  
            [
                'attribute' => 'data_criacao',
                //'format' => ['date', 'php:d/m/Y']
            ],  
            'turma',
        ],
    ]) ?>

</div>
