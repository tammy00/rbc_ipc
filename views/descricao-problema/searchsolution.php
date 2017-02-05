<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\controllers\DescricaoProblemaController;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\DescricaoProblema */
/* @var $form yii\widgets\ActiveForm */
$this->title = "Buscar solução";
?>

<div class="descricao-problema-form">
    <p>
           <?php 
            if(isset($erro))
            {
                echo "<p class='col-sm-4 alert alert-danger'>";
                echo $erro ;
                echo "</p>";
            }
        ?>
    </p>

    <?php $form = ActiveForm::begin(
    ); ?>

    <?= $form->field($model, 'tema')->dropDownList([$arrayModulos], 
    ['style' => 'width:500px',
    'prompt' => "Selecione um tema", 
    'onchange'=>'$.get( "'.Url::toRoute(['descricao-problema/list_topics']).'", { tema : $(this).val() })
        .done(function(data) {
            $( "#'.Html::getInputId($model, 'topico').'").html(data);
    });']) 
    ?>

    <?= $form->field($model, 'topico')->dropDownList([$arrayTopicos],
    ['style' => 'width:500px',
    'prompt' => "Selecione um tópico",]); ?>  
    
    <?= $form->field($model, 'descrProblema')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'naturezaProblema')->dropDownList(['Programação' => 'Programação', 
    'Matemática' => 'Matemática', 'Lógica' => 'Lógica'], 
    ['prompt'=>'Selecione a natureza do problema','style'=>'width:530px']); ?>
<!--
    dropDownList(['Visual' => 'Visual', 'Teórico' => 'Teórico', 'Analítico' => 'Analítico']); ?>  -->

    <!-- < ? = $form->field($model, 'estiloAprendizagem')->dropDownList([$arrayDeEstilo],['prompt'=>'Selecione um estilo','style'=>'width:530px']) ?>  -->

    <div class="form-group">
        <?= Html::submitButton('Buscar solução', ['class' => 'btn btn-primary']) ?>
        <a href="?r=site/index" class="btn btn-default">Voltar</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>

