<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use app\assets\AppAsset;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
		 <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/icone.ico" type="image/x-icon" /> 
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        </head>
    <body>
        <?php $this->beginBody() ?>
        <header style="border-bottom:1px solid #e7e7e7; padding:5px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <img src="icomp.png" width="150px" />
                    </div>
                    <div class="col-md-6">
						<img src="marca.png" width="220px" />
                       
                    </div>
                    <div class="col-md-1">
                        <img src="ufam.png" width="70px"  />
                    </div>
                </div>
            </div>
        </header>
        
            <div id="wrapper">
                <!-- /.navbar-top-links -->
<!--
                <?php if(isset(Yii::$app->user->identity)){ ?>   -->


                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">  
                            <li class="sidebar-search">
                                <div class="input-group">
                                    Olá, 
                                    <b><?= Yii::$app->user->identity->nome ?></b>, você está logado como: 
                                    <b><?= Yii::$app->user->identity->perfil ?></b>.

                                </div> 
                                
                            </li>  
                            
                            <?php if(Yii::$app->user->identity->perfil == 'Aluno')
                            { ?>

                            <li>
                               <a href="?r=descricao-problema/searchsolution"> Buscar solução </a>
                            </li>
                            <li>
                                <a href="?r=pesquisas/aluno"> Histórico de Pesquisas</a>
                            </li>
                            <li>
                                <?php $link_address = "?r=usuario/view&id=" . Yii::$app->user->identity->id_usuario; ?>
                                <a href="<?php echo $link_address;?>"> Meus Dados</a>
                            </li>
                            <?php } ?>

                            <?php if(Yii::$app->user->identity->perfil == 'Administrador')
                            { ?>
                            <li>
                                <a href="?r=pesquisas/aluno"> Histórico de Pesquisas (alunos)</a>
                            </li>
                            <li>
                                <a href="?r=pesquisas/professor"> Histórico de Pesquisas (Tutor/Professor)</a>
                            </li>
                            <li>
                                <a href="?r=curso/index"> Cursos</a>
                            </li>
                            <li>
                                <a href="?r=disciplina/index"> Disciplinas</a>
                            </li>
                            <li>
                                <a href="?r=usuario/index"> Usuários</a>
                            </li>
                            <li>
                                <a href="?r=estilo/index"> Estilos de Aprendizagem</a>
                            </li>
                            <li>
                                <a href="?r=objetos-de-aprendizagem/index"> Objetos de Aprendizagem</a>
                            </li>
                            <li>
                                <a href="?r=objeto-estilo/index"> Objetos-estilos</a>
                            </li>
                            <?php } ?>

                            <?php if(Yii::$app->user->identity->perfil == 'Professor' || Yii::$app->user->identity->perfil == 'Tutor') { ?>
                            <li>
                                <a href="?r=pesquisas/professor"> Dúvidas e respostas (Tutor/Professor)</a>
                            </li>
                            <li>
                                <a href="?r=objetos-de-aprendizagem/index"> Objetos de Aprendizagem</a>
                            </li>
                            <li>
                                <?php $link_address = "?r=usuario/view&id=" . Yii::$app->user->identity->id_usuario; ?>
                                <a href="<?php echo $link_address;?>"> Meus Dados</a>
                            </li>
                            <li>
                                <a href="?r=estilo/index"> Estilos de Aprendizagem</a>
                            </li>
                            <li>
                                <a href="?r=objeto-estilo/index"> Objetos-estilos</a>
                            </li>
                            <?php } ?>

                             <li>
                                <a href="?r=site/logout"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                            </li>

                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
                <!--
                <?php } ?>
                -->
                <div id="page-wrapper" style="padding:10px; overflow:auto;">
                    <?= $content ?>
                </div>
            </div>
            
        
        <footer style="text-align:center; border-top:1px solid #e7e7e7;">
            <div class="col-md-12">
                <h5>Sistema Desenvolvido pelo Grupo de Sistemas Inteligentes - UFAM - ICOMP</h5>
            </div>
        </footer>
        <?php $this->endBody() ?>
    </body>
    <!-- Scripts -->
</html>
<?php $this->endPage() ?>
