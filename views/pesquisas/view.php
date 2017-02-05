<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\LogDeBuscas */

$this->title = 'Dúvida de ' . $model->aluno_id;
?>
<div class="pesquisas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?php if ( Yii::$app->user->identity->perfil === 'Professor' || Yii::$app->user->identity->perfil === 'Tutor' ) { ?>
            <a href="?r=pesquisas/professor" class="btn btn-default">Voltar</a>
        <?php } ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'options' => [
            'class' => 'table table-striped table-bordered detail-view',
            'style' => 'width:75%'
        ],
        'attributes' => [
            'aluno_id',
            'status',
            'duvida',
            'estilo',
            'topico',
            'tema',
            'natureza',
            'feedback',
            [
                'attribute' => 'acao',
                'label' => 'Ação Pedagógica',
                //'format' => ['date', 'php:d/m/Y']
            ],  
            [
                'attribute' => 'data_criacao',
                //'format' => ['date', 'php:d/m/Y']
            ],  
            'turma',
        ],
    ]) ?>

    <?php if ($obj != null ) { ?>
    <b>Objeto de Aprendizagem apresentado: </b>

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
    <?php } ?> 

</div>
