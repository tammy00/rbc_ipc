<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['style'=>'width:300px']) ?>

    <?= $form->field($model, 'senha')->passwordInput(['style'=>'width:300px'])->label('Senha') ?>

    <?php if ( Yii::$app->user->identity->perfil != "Aluno" ) {  ?>

        <?= $form->field($model, 'curso_id')->dropDownList([$arrayDeCurso],['prompt'=>'Selecione um curso'],['style'=>'width:530px']); ?>

        <?= $form->field($model, 'disciplina_id')->dropDownList([$arrayDeDisciplina],['prompt'=>'Selecione uma disciplina'],['style'=>'width:530px']); ?>

    <?php } ?>

    <?= $form->field($model, 'cpf')->textInput(['style'=>'width:120px']) ?>

    <?= $form->field($model, 'idade')->textInput(['style'=>'width:50px']) ?>

    <?php if ( Yii::$app->user->identity->perfil != "Aluno" ) {  ?>

        <?= $form->field($model, 'perfil')->dropDownList(['Aluno' => 'Aluno', 
        'Professor' => 'Professor', 
        'Tutor' => 'Tutor',
        'Administrador' => 'Administrador']); ?>

    <?php }  else {  ?>

        <?= $form->field($model, 'estilo')->textInput(['readonly' => true, 'style'=>'width:300px']) ?>

    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a href="?r=usuario/index" class="btn btn-default">Voltar</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
