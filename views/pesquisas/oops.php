<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\alert\Alert;

$this->title = 'Ocorreu um problema...';
?>
<div class="pesquisas-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php   
        echo Alert::widget([
            'type' => Alert::TYPE_WARNING,
            'title' => 'Erro!',
            'icon' => 'glyphicon glyphicon-exclamation-sign',
            'body' => 'Algum item não foi encontrado.',
            'showSeparator' => true,
        ]);
    ?>
    <p>
        <?php if ( Yii::$app->user->identity->perfil === 'Aluno' ) { ?>
            <a href="?r=pesquisas/aluno" class="btn btn-default">Voltar</a>
        <?php } ?>
        <?php if ( Yii::$app->user->identity->perfil === 'Professor' || Yii::$app->user->identity->perfil === 'Tutor' ) { ?>
            <a href="?r=pesquisas/professor" class="btn btn-default">Voltar</a>
        <?php } ?>

    </p>

</div>
