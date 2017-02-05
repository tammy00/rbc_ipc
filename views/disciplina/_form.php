<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Disciplina */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disciplina-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo_disciplina')->textInput(['style'=>'width:100px']) ?>

    <?= $form->field($model, 'nome_disciplina')->textInput(['style'=>'width:530px']) ?>

    <?= $form->field($model, 'curso_id')->dropDownList([$arrayDeCurso],['prompt'=>'Selecione um curso'],['style'=>'width:530px']); ?>

    <?= $form->field($model, 'turma')->textInput(['style'=>'width:100px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a href="?r=disciplina/index" class="btn btn-default">Voltar</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
