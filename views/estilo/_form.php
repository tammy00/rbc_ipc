<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Estilo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estilo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome_estilo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a href="?r=estilo/index" class="btn btn-default">Voltar</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
