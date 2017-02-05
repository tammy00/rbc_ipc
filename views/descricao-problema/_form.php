<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\controllers\DescricaoProblemaController;

/* @var $this yii\web\View */
/* @var $model app\models\DescricaoProblema */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="descricao-problema-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tema')->dropDownList(['Variáveis' => 'Variáveis', 
    'Estrutura Condicional' => 'Estrutura Condicional', 
    'Estrutura Condicional Encadeada' => 'Estrutura Condicional Encadeada',
    'Repetição por Condição' => 'Repetição por Condição', 
    'Vetores' => 'Vetores', 
    'Strings' => 'Strings', 
    'Repetição por Contagem' => 'Repetição por Contagem', 
    'Matrizes' => 'Matrizes'], 
    ['style' => 'width:500px',
    'prompt' => "Selecione um tema", 
    'onchange'=>'$.get( "'.Url::toRoute(['descricao-problema/list_topics']).'", { tema : $(this).val() })
        .done(function(data) {
            $( "#'.Html::getInputId($model, 'topico').'").html(data);
    });']) 
    ?>

    <?= $form->field($model, 'topico')->dropDownList([$arrayTopicos], ['prompt'=>'Selecione um tópico'],['style'=>'width:530px']) ?>

    <?= $form->field($model, 'estiloAprendizagem')->dropDownList([$arrayDeEstilo],['prompt'=>'Selecione um estilo'],['style'=>'width:530px']) ?>

    <?= $form->field($model, 'descrProblema')->textInput(['maxlength' => true]), ?>

    <?= $form->field($model, 'naturezaProblema')->dropDownList(['Programação' => 'Programação', 
    'Matemática' => 'Matemática', 'Lógica' => 'Lógica'], 
    ['prompt'=>'Selecione a natureza da dúvida','style'=>'width:530px']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <a href="?r=descricao-problema/index" class="btn btn-default">Voltar</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
