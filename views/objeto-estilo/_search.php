<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ObjetoEstiloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objeto-estilo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_objeto') ?>

    <?= $form->field($model, 'id_estilo') ?>

    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Cancelar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
