<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LogDeBuscas */

$this->title = 'Dúvida';
?>
<div class="pesquisas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
