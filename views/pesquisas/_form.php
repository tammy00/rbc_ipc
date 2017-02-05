<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LogDeBuscas */
/* @var $form yii\widgets\ActiveForm */
?>

<script type="text/javascript"> 
    function toggle(chkbox, div_adicionais) { 
        var visSetting = (chkbox.checked) ? "visible" : "hidden"; 
        document.getElementById(div_adicionais).style.visibility = visSetting; 
    } 

    function OnChangeCheckbox (checkbox) {
         if (checkbox.checked) {
            $("#adicionais").prop("style", "display: block");
                //alert ("The check box is checked.");
        }
        else {
            $("#adicionais").prop("style", "display: none");
                //alert ("The check box is not checked.");
        }
    }

    function toggleObjeto(chkbox, div_adicionais) { 
        var visSetting = (chkbox.checked) ? "visible" : "hidden"; 
        document.getElementById(div_adicionais).style.visibility = visSetting; 
    } 

    function OnChangeCheckboxObjeto (checkbox) {
         if (checkbox.checked) {
            $("#adicionarobjeto").prop("style", "display: block");
                //alert ("The check box is checked.");
        }
        else {
            $("#adicionarobjeto").prop("style", "display: none");
                //alert ("The check box is not checked.");
        }
    }

</script> 

<div class="pesquisas-form">

    <?php $form = ActiveForm::begin(); ?>

        <!-- CAMPOS DO MODEL REFERENTE A SOLUÇÃO DE PROBLEMA -->
        <br>
        <p> 
            
            <div class="solucaoproblema-form">

            
            <?= $form->field($model, 'listadiagnosticos')->dropDownList([$arrayDiagnosticos],['prompt'=>'Selecione um diagnóstico'],['style'=>'width:530px']) ?>

                <input type="checkbox" id="checkForMoreInfo" onclick="OnChangeCheckbox(this)">
                <!-- <input type="checkbox" id="checkForMoreInfo" onclick="toggle(this,'adicionais')">-->
                <label for="checkForMoreInfo">Digitar novo diagnóstico</label>
                <br></br>
                <div id="adicionais" style="display: none">
                <?= $form->field($model, 'diagnostico')->textInput(['maxlength' => true, 'id' => '#digitar']) ?>

                </div>
                    
                    <?= $form->field($model, 'acao')->textInput(['maxlength' => true]) ?>



                <input type="checkbox" id="checkobjeto" onclick="OnChangeCheckboxObjeto(this)">
                <!-- <input type="checkbox" id="checkForMoreInfo" onclick="toggle(this,'adicionais')">-->
                <label for="checkobjeto">Selecionar Objeto de Aprendizagem</label>
                <br></br>
                <div id="adicionarobjeto" style="display: none">
                
                <?= $form->field($model, 'objeto')->dropDownList([$arrayDeObjeto],['prompt'=>'Selecione um objeto'],['style'=>'width:530px']) ?>

                </div>
                   
            </div>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Submeter' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                <a href="?r=pesquisas/professor" class="btn btn-default">Voltar</a>
            </div>
        </p>

    <?php ActiveForm::end(); ?>

</div>
