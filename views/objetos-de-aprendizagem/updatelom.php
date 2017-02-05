<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SolucaoProblema */

$this->title = "Atualização do Objeto de Aprendizagem";
?>
<div class="solucao-problema-updatelom">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <h3>Informações sobre a solução</h3>    
    <?= DetailView::widget([
        'model' => $modelSolucao,
        'attributes' => [
            'diagnostico',
            'acaoPedagogica',
        ],
    ]) ?>

    <br>
    <h3>Formulário do Objeto de Aprendizagem</h3>
    

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo_objeto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estilo_objeto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao_objeto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'formato_objeto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'localizacao_objeto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idioma_objeto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'palavraschaves_objeto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tamanho_objeto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requisitos_objeto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipointeratividade_objeto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dificuldade_objeto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estrutura_objeto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recurso_objeto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
