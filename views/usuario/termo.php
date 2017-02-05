<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Termo de Consentimento Livre e Esclarecido';
?>

<div class="usuario-form">

	 <h2><?= Html::encode($this->title) ?></h2>

    <?php $form = ActiveForm::begin(); ?>


		<div class="termo">

		     <div style="margin-bottom: 20px;margin-top: 20px; text-align:justify; margin-right: 60px; margin-left: 30px"> 

		                    	<h4><p> Prezado(a) <b><?= $model->nome ?></b>

		                        <p>Você está sendo convidado(a) a participar da Pesquisa sobre  Recomendação de Ação Pedagógica no Ensino de Introdução à Programação por meio de Raciocínio Baseado em  Casos sob a responsabilidade das pesquisadoras Priscilla Batista do Nascimento e Tammy Hikari Gusmão. 
		                      	Essa pesquisa pretende fornecer dados para uma ferramenta que irá sugerir recomendações de ações pedagógicas aos alunos, e quando não forem suficientes o sistema solicitará a intervenção do professor.

								<p>Sua participação é voluntária e se dará por meio da utilização do ambiente Sistema de Recomendação de Ação Pedagógica que utiliza informações básicas provenientes do sistema de correção automática de código – Codebench, no IComp, seja pelo computador ou dispositivos móveis. A ferramenta sugere aos alunos ações pedagógicas que podem ser um objeto de aprendizagem relacionados com a dúvida em determinado assunto da disciplina de Introdução à Programação. Se você aceitar participar, estará contribuindo para a melhoria de aprendizado em programação.
								<p>Se depois de consentir em sua participação você desistir de continuar participando, tem o direito e a liberdade de retirar seu consentimento em qualquer fase da pesquisa, seja antes, durante ou depois da coleta dos dados, independente do motivo e sem prejuízo a sua pessoa. Você não terá qualquer despesa e também não receberá nenhuma remuneração. Em nenhum momento você será identificado. Os resultados da pesquisa serão publicados e ainda assim a sua identidade será preservada.
								<p>Para qualquer outra informação adicional ou esclarecimentos, você poderá entrar em contato com as pesquisadoras no endereço <a href="mailto:priscilla.batista18@gmail.com">priscilla.batista18@gmail.com</a>, <a href="mailto:tammyhikari@gmail.com">tammyhikari@gmail.com</a></h4>
								<p></p>
								<p></p>
								<h4> Obrigada pela sua colaboração!</h4>

			<!-- $form->field($model, 'termo')->textInput(['style'=>'width:530px']) ?>  -->

			<!-- ->radioList(array(1=>'Concordo', 2 => 'Não concordo')); ?>  -->
<!--
			<Input type = 'Radio' Name ='termo' value= 1> Concordo
			<Input type = 'Radio' Name ='termo' value= 2> Não concordo
			  Html::input('radio','email') ?>
			   Html::input('text','email') ?>
			<br>    -->
			<!-- $form->field($model, 'termo')->radioList([
    			1 => 'Concordo', 
    			2 => 'Não concordo'
			]) ?>  -->

			<!-- Html::submitButton('Submeter', ['class' => 'btn btn-primary']) ?>  -->

			<?php $link = '?r=usuario/termo&resposta=1'; ?>

             <a href='<?php echo $link ?>' class="btn btn-primary"> Concordo</a>

			<?php $url = '?r=usuario/termo&resposta=2'; ?>

             <a href='<?php echo $url ?>' class="btn btn-default"> Não Concordo</a>


    <?php ActiveForm::end(); ?>

</div>
