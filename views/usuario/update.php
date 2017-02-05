<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Atualizar dados do usuário: ' . $model->nome;
?>
<div class="usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'arrayDeCurso' => $arrayDeCurso,
         'arrayDeDisciplina' => $arrayDeDisciplina,

    ]) ?>

</div>
