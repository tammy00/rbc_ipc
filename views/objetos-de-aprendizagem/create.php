<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ObjetosDeAprendizagem */

$this->title = 'Cadastro de Objeto';
?>
<div class="objetos-de-aprendizagem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrayDeEstilo' => $arrayDeEstilo,
    ]) ?>

</div>
