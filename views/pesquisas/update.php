<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\LogDeBuscas */

$this->title = 'Atualizar dúvida';
?>
<div class="pesquisas-update">


    <h1><?= Html::encode($this->title) ?></h1>

    <b>Descrição do problema:</b>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tema',
            'topico',
            'estilo',
            'duvida',
            'natureza',
        ],
    ]) ?>

    <b>Solução apresentada:</b>

    <?= DetailView::widget([
        'model' => $solucao,        
        'attributes' => [
            'diagnostico',
            'acaoPedagogica',
        ],
    ]) ?>

    <b>Similaridade: </b> <?php echo $model->similaridade; ?>

    <br><br><b>Objeto de Aprendizagem apresentado: </b>

    <?php if ( $obj->localizacao_objeto != null ) {  ?>
       <?= DetailView::widget([
            'model' => $obj,
            'attributes' => [
                'titulo_objeto',
                'descricao_objeto',
                'localizacao_objeto:url',
            ],
        ]) ?>
    <?php }  else {   ?>
      <?=  DetailView::widget([
            'model' => $obj,
            'attributes' => [
                'titulo_objeto',
                'descricao_objeto',
                'formato_objeto',
                'tamanho_objeto',
            ],
        ]) ?>

        <?= Html::a('Obter Recurso Didático', Url::base().'/'.$obj->pathArquivo, ['target'=>'_blank', 'class' => 'btn btn-default'])  ?>
    <?php } ?> 

    <?= $this->render('_form', [
        'model' => $model,
        'arrayDeObjeto' => $arrayDeObjeto,
        'arrayDiagnosticos' => $arrayDiagnosticos,
    ]) ?>

</div>
