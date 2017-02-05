<?php

/* @var $this yii\web\View */


$this->title = 'Recomendação de Ação Pedagógica';
?>
<div class="site-index">

    <div class="body-content">
		
        <h3> Seja bem-vindo!</h3>
    </div>

    <?php if ( $qntdSubmetidos != 0 ) { ?>
   
        <div class="body-content">
			
            <?php if (Yii::$app->user->identity->perfil === 'Professor' || Yii::$app->user->identity->perfil === 'Tutor' )  { ?>
                <div class="row">
                    <div style="border: 10px solid #2a6a84;border-top-right-radius: 35px;border-top-left-radius: 10px;border-bottom-left-radius: 35px;border-bottom-right-radius: 10px;padding: 15px 25px 15px 25px;margin-top: 0px;margin-bottom: 10px;margin-right: 800px;margin-left: 25px;">
                        <font color="red"> <h4><b>Atenção!</b></h4> </font>
                        Existe(m) <b> <?= $qntdSubmetidos ?>  </b>alunos(s) com dificuldades.
                    </div>
                </div>
                 <div class="info">
                    <div style="margin-right: 850px;margin-left: 25px;">
                        <h4><b>Instruções:</b></h4> 
                        <p><b><a href="">Tutorial - Professor</a>
                        <p><b><a href="">Tutorial - Aluno</a>

                     </div>
                </div>
            <?php }  ?>
            <?php }  
            
            else {  ?>	
					<?php if (Yii::$app->user->identity->perfil === 'Professor' || Yii::$app->user->identity->perfil === 'Tutor' )  { ?>
							<div class="row">
							<div style="border: 10px solid #2a6a84;border-top-right-radius: 35px;border-top-left-radius: 10px;border-bottom-left-radius: 35px;border-bottom-right-radius: 10px;padding: 15px 25px 15px 25px;margin-top: 0px;margin-bottom: 10px;margin-right: 800px;margin-left: 25px;">
							<font color="red"> <h4><b>Atenção!</b></h4> </font>
							<p><b>Não existe nenhuma solicitação de aluno.</p></b>
							</div>
					<div class="info">
                    <div style="margin-right: 850px;margin-left: 25px;">
                        <h4><b>Instruções:</b></h4> 
                        <p><b><a href="">Tutorial - Professor</a>
                        <p><b><a href="">Tutorial - Aluno</a>
                     </div>
                </div>
            <?php }  ?>  
            </div>       
            <?php }  ?>  
           
		<?php if ( $qntdSubmetidos != 0 ) { ?>
                 <div class="body-content"> 
                   <?php if (Yii::$app->user->identity->perfil === 'Aluno' )  { ?>
						<div class="row">							
							<div style="border: 10px solid #2a6a84;border-top-right-radius: 35px;border-top-left-radius: 10px;border-bottom-left-radius: 35px;border-bottom-right-radius: 10px;padding: 15px 25px 15px 25px;margin-top: 0px;margin-bottom: 10px;margin-right: 800px;margin-left: 25px;">
								<font color="red"> <h4><b>Atenção!</b></h4> </font>
								<b> <?= $qntdSubmetidos ?> </b> dúvida(s) foram respondidas! 
								<br></br>
								<a href="?r=pesquisas/aluno" class="btn btn-primary">Histórico de Pesquisas</a>
							</div>                 
                    <div class="info">
						<div style="margin-right: 850px;margin-left: 25px;">
							<h4><b>Instruções:</b></h4>
							<b><a href="" >Tutorial - Aluno</a>
						  </div>
                     </div>
                </div>
            <?php }  ?>
            </div>
            <?php }  
            
            else {  ?>		
					        <?php if (Yii::$app->user->identity->perfil === 'Aluno')  { ?>
                            <div class="row">
								<div style="border: 10px solid #2a6a84;border-top-right-radius: 35px;border-top-left-radius: 10px;border-bottom-left-radius: 35px;border-bottom-right-radius: 10px;padding: 15px 25px 15px 25px;margin-top: 0px;margin-bottom: 10px;margin-right: 800px;margin-left: 25px;">
									<font color="red"> <h4><b>Atenção!</b></h4> </font>
									<p><b>Não existe nenhuma solicitação respondida.</p></b>
								</div>
                            </div>
					<div class="info">
                    <div style="margin-right: 850px;margin-left: 25px;">
                        <h4><b>Instruções:</b></h4> 
                        <p><b><a href="">Tutorial - Aluno</a>
                    </div>
                    </div>
                    <?php }  ?> 
             </div>
            <?php } ?>


</div>
