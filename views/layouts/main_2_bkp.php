<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use app\assets\AppAsset;
use app\models\Periodo;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
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
                    <div class="col-md-2">
                        <img src="icomp.png" width="150px" />
                    </div>
                    <div class="col-md-8">
                        <h2 style="text-align:center;">Sistema RBC para Introdução à <br>Programação de Computadores</h2>
                    </div>
                    <div class="col-md-2">
                        <img src="ufam.png" width="70px" />
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
                        <ul class="nav" id="side-menu">  <!--
                            <li class="sidebar-search">
                                <div class="input-group">
                                    Olá, 
                                    <b><?= Yii::$app->user->identity->name ?></b>, você está logado como: 
                                    <b><?= Yii::$app->user->identity->perfil ?></b>.

                                </div> 
                                <div class="input-group">
                                    <?php $p = Periodo::find()->orderBy(['id' => SORT_DESC])->one(); 
                                    if ($p == null) $periodo = '';
                                    else $periodo = $p->codigo;  ?>
                                    <b>Período Atual:</b> <?php echo $periodo; ?> 
                                </div>
                                
                            </li>  -->
                            <!--
                            <?php if(Yii::$app->user->identity->perfil == 'Aluno')
                            { ?>
                            <li>
                                <a href="?r=usuario/questionario-estilo-aprendizagem"> Questionário de Estilo<br>de Aprendizagem</a>
                            </li>
                            <li>
                                <a href="?r=solucao-problema/aluno-feedback"> Feedbacks</a>
                            </li>
                            <?php } ?>
                            <?php } ?>

                            <?php if(Yii::$app->user->identity->perfil == 'Administrador')
                            { ?>
                            <li>
                                <a href="?r=usuario/questionario-estilo-aprendizagem"> Questionário de Estilo<br>de Aprendizagem</a>
                            </li>
                            <li>
                                <a href="?r=solucao-problema/aluno-feedback"> Feedbacks</a>
                            </li>
                            <li>
                                <a href="?r=solucao-problema/professor-feedback"> Feedbacks</a>
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
                            <?php } ?>

                            <?php if(Yii::$app->user->identity->perfil == 'Professor')
                            { ?>
                            <li>
                                <a href="?r=solucao-problema/professor-feedback"> Feedbacks</a>
                            </li>
                            <?php } ?>
-->
                             <li>
                                <a href="?r=site/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                <h5>Sistema Desenvolvido no Contexto da Disciplina - UFAM - ICOMP</h5>
            </div>
        </footer>
        <?php $this->endBody() ?>
    </body>
    <!-- Scripts -->
</html>
<?php $this->endPage() ?>