<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="curso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo_curso')->textInput(['style'=>'width:100px']) ?>

    <?= $form->field($model, 'nome_curso')->textInput(['style'=>'width:530px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a href="?r=curso/index" class="btn btn-default">Voltar</a>
    </div>

    <?php ActiveForm::end(); ?>



</div>
