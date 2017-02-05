<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Estilo */

$this->title = 'Cadastrar Estilo';
?>
<div class="estilo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
