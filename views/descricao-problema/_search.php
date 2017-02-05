<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DescricaoProblemaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="descricao-problema-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_descProblema') ?>

    <?= $form->field($model, 'tema') ?>

    <?= $form->field($model, 'topico') ?>

    <?= $form->field($model, 'estiloAprendizagem') ?>

    <?= $form->field($model, 'descrProblema') ?>

    <?php // echo $form->field($model, 'naturezaProblema') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
