<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ObjetoEstilo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objeto-estilo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_objeto')->dropDownList([$arrayDeObjeto],['prompt'=>'Selecione um objeto'],['style'=>'width:530px']) ?>

    <?= $form->field($model, 'id_estilo')->dropDownList([$arrayDeEstilo],['prompt'=>'Selecione um estilo'],['style'=>'width:530px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a href="?r=objeto-estilo/index" class="btn btn-default">Voltar</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
