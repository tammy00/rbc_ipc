<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SolucaoProblemaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solucao-problema-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_solucaoProblema') ?>

    <?= $form->field($model, 'diagnostico') ?>

    <?= $form->field($model, 'acaoPedagogica') ?>

    <?= $form->field($model, 'objetoAprendizagem') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
