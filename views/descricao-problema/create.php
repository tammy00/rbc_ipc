<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DescricaoProblema */

$this->title = 'Cadastrar Caso Novo [Descrição]';
?>
<div class="descricao-problema-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'arrayDeEstilo' => $arrayDeEstilo,
        'arrayTopicos' => $arrayTopicos,
    ]) ?>

</div>
