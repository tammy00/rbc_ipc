<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ObjetoEstilo */

$this->title = 'Atualização';
?>
<div class="objeto-estilo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrayDeEstilo' => $arrayDeEstilo,
        'arrayDeObjeto' => $arrayDeObjeto,
    ]) ?>

</div>
