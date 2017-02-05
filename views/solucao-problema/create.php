<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SolucaoProblema */

$this->title = 'Cadastrar Caso Novo [Solução]';
?>
<div class="solucao-problema-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'descricao' => $descricao,
        'arrayDeObjeto' => $arrayDeObjeto,
    ]) ?>

</div>
