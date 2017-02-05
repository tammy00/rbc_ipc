<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SolucaoProblema */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solucao-problema-form">

    <b>Descrição do Caso</b>
    <?= DetailView::widget([
        'model' => $descricao,
        'attributes' => [
            'tema',
            'topico',
            'estiloAprendizagem',
            'descrProblema',
            'naturezaProblema',
        ],
    ]) ?>

    <br><b><h3>Formulário para a Solução do Caso</b></h3>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'diagnostico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acaoPedagogica')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'objetoAprendizagem')->dropDownList([$arrayDeObjeto],['prompt'=>'Selecione um objeto'],['style'=>'width:530px']) ?>
 
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a href="?r=solucao-problema/index" class="btn btn-default">Voltar</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
