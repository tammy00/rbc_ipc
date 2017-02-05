<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\alert\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */


$this->title = $model->nome;
?>
<div class="usuario-view">

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
        <?php if ( Yii::$app->user->identity->perfil == 'Administrador') {  ?>
            <?= Html::a('Novo Usuário', ['create'], ['class' => 'btn btn-success']) ?>
            <a href="?r=usuario/index" class="btn btn-default">Voltar</a>
        <?php } ?>

        <?php if ( Yii::$app->user->identity->perfil != 'Administrador') {  ?>
            <a href="?r=site/index" class="btn btn-default">Voltar</a>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            'email',
            'curso_id',
            'disciplina_id',
            'idade',
            'estilo',
            'perfil',
        ],
    ]) ?>

</div>
