<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ObjetosDeAprendizagem */

$this->title = 'Atualizar Objeto: ' . $model->titulo_objeto;
?>
<div class="objetos-de-aprendizagem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrayDeEstilo' => $arrayDeEstilo,
    ]) ?>

</div>
