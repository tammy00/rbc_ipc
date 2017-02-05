<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\SolucaoProblema */

$this->title = "Solução encontrada";
?>
<div class="solucao-problema-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->user->identity->perfil === 'Professor' || Yii::$app->user->identity->perfil === 'Administrador' || Yii::$app->user->identity->perfil === 'Tutor') { ?>
    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_solucaoProblema], ['class' => 'btn btn-primary']) ?>
    </p>
    <?php } ?>
    <p>
        <a href="?r=descricao-problema/searchsolution" class="btn btn-primary">Fazer outra busca</a>
        <a href="?r=site/index" class="btn btn-default">Voltar</a>
    </p>

    <p> ID da solução: <?php echo $model->id_solucaoProblema ?> </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'diagnostico',
            'acaoPedagogica',
        ],
    ]) ?>

    
        <?php if ( $obj != null ) {  ?>
	    <?php if ( $obj->localizacao_objeto != null ) {  ?>
	       <?php echo 'Objeto de Aprendizagem:'; ?>
	       <br>
	       <?= DetailView::widget([
		    'model' => $obj,
		    'attributes' => [
		        'titulo_objeto',
		        'descricao_objeto',
		        'localizacao_objeto:url',
		    ],
		]) ?>
		
		<iframe width="500" height="315" src="<?php echo $obj->localizacao_objeto?>" frameborder="0" allowfullscreen></iframe>

	    <?php } else {   ?>
	       <?php echo 'Objeto de Aprendizagem:'; ?>
	       <br>
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

    <br>

    <div class="texto-similaridade">
                    <div style="margin-bottom: 20px;margin-top: 20px">
                        <b>A solução apresentada é  <?= $similaridade ?>%  similar ao caso existente no banco de dados. </b>
                     </div>
    
    <p>
        <b>A ação pedagógica recomendada ajudou na sua dúvida?</b>

          <?php $url = '?r=solucao-problema/didhelp&idsol='.$model->id_solucaoProblema.'&tema='.$tema.'&topic='.$topico.'&desc='.$des.'&natureza='.$natureza.'&estilo='.$estilo; 
        ?>
        <a href='<?php echo $url ?>' class="btn btn-primary">Sim</a>
        
        <?php $link = '?r=solucao-problema/didnothelp&idsol=&tema='.$tema.'&topic='.$topico.'&desc='.$des.'&natureza='.$natureza.'&estilo='.$estilo; ?>

        <a href='<?php echo $link ?>' class="btn btn-default">Não</a>
        
      


    </p>
</div>
