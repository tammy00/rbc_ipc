<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = $model->nome;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if ( Yii::$app->user->identity->perfil == 'Administrador') {  ?>
            <?= Html::a('Novo Usuário', ['create'], ['class' => 'btn btn-success']) ?>
        <?php } ?>

        <?= Html::a('Atualizar', ['update', 'id' => $model->id_usuario], ['class' => 'btn btn-primary']) ?>
        
        <?php if(Yii::$app->user->identity->perfil == 'Administrador') {  ?>
            <?= Html::a('Excluir', ['delete', 'id' => $model->id_usuario], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Tem certeza de que quer excluir este item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php }  ?>
        <a href="?r=usuario/index" class="btn btn-default">Voltar</a>
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
