<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ObjetosDeAprendizagemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objetos-de-aprendizagem-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_objeto') ?>

    <?= $form->field($model, 'estilo_objeto') ?>

    <?= $form->field($model, 'descricao_objeto') ?>

    <?= $form->field($model, 'tipo_objeto') ?>

    <?= $form->field($model, 'formato_objeto') ?>

    <?php // echo $form->field($model, 'local_objeto') ?>

    <?php // echo $form->field($model, 'idioma_objeto') ?>

    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Resetar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
