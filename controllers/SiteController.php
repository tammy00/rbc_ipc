<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\StudentForm;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Usuario;
use app\models\Pesquisas;
use app\models\Disciplina;
use app\models\Estilo;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }
    
    
    /*Nova action para inclusao do questionario para turma de experimentos*/
    
    public function actionForm()
    {
        $model = new StudentForm();

        if ( $model->load(Yii::$app->request->post()) ) 
        {
            $q1 = Yii::$app->request->post('q1'); 
            $q2 = Yii::$app->request->post('q2'); 
            $q3 = Yii::$app->request->post('q3'); 
            $q4 = Yii::$app->request->post('q4'); 
            $q5 = Yii::$app->request->post('q5'); 
            $q6 = Yii::$app->request->post('q6'); 
            $q7 = Yii::$app->request->post('q7'); 
            $q8 = Yii::$app->request->post('q8'); 
            $q9 = Yii::$app->request->post('q9'); 
            $q10 = Yii::$app->request->post('q10'); 
            $q11 = Yii::$app->request->post('q11'); 
            $q12 = Yii::$app->request->post('q12'); 
            $q13 = Yii::$app->request->post('q13'); 
            $q14 = Yii::$app->request->post('q14'); 
            $q15 = Yii::$app->request->post('q15');  
            $q16 = Yii::$app->request->post('q16');
            $q17 = Yii::$app->request->post('q17');
            $q18 = Yii::$app->request->post('q18');
            $q19 = Yii::$app->request->post('q19');
            $q20 = Yii::$app->request->post('q20');
            $q21 = Yii::$app->request->post('q21');
            $q22 = Yii::$app->request->post('q22');
            $q23 = Yii::$app->request->post('q23');
            $q24 = Yii::$app->request->post('q24');
            $q25 = Yii::$app->request->post('q25');
            $q26 = Yii::$app->request->post('q26');
            $q27 = Yii::$app->request->post('q27');
            $q28 = Yii::$app->request->post('q28');
            $q29 = Yii::$app->request->post('q29');
            $q30 = Yii::$app->request->post('q30');
            $q31 = Yii::$app->request->post('q31');
            $q32 = Yii::$app->request->post('q32');
            $q33 = Yii::$app->request->post('q33');
            $q34 = Yii::$app->request->post('q34');
            $q35 = Yii::$app->request->post('q35');
            $q36 = Yii::$app->request->post('q36');
            $q37 = Yii::$app->request->post('q37');
            $q38 = Yii::$app->request->post('q38');
            $q39 = Yii::$app->request->post('q39');
            $q40 = Yii::$app->request->post('q40');
            $q41 = Yii::$app->request->post('q41');  
            $q42 = Yii::$app->request->post('q42');
            $q43 = Yii::$app->request->post('q43');
            $q44 = Yii::$app->request->post('q44');

            return Yii::$app->runAction('site/alunologin',[
            'q1' => $q1, 'q2'=> $q2, 'q3'=> $q3, 'q4'=> $q4, 'q5'=> $q5, 
            'q6'=> $q6, 'q7'=> $q7, 'q8'=> $q8, 'q9'=> $q9, 'q10'=> $q10,
            'q11' => $q11, 'q12' => $q12, 'q13' => $q13, 'q14' => $q14, 'q15' => $q15, 
            'q16' => $q16, 'q17' => $q17, 'q18' => $q18, 'q19' => $q19, 'q20' => $q20,
            'q21' => $q21, 'q22' => $q22, 'q23' => $q23, 'q24' => $q24, 'q25' => $q25, 
            'q26' => $q26, 'q27' => $q27, 'q28' => $q28, 'q29' => $q29, 'q30' => $q30,
            'q31' => $q31, 'q32' => $q32, 'q33' => $q33, 'q34' => $q34, 'q35' => $q35, 
            'q36' => $q36, 'q37' => $q37, 'q38' => $q38, 'q39' => $q39, 'q40' => $q40,
            'q41' => $q41, 'q42' => $q42, 'q43' => $q43, 'q44' => $q44,
            'nome' => $model->nome,
            'email' => $model->email,
            'turma' => $model->turma]);
        }
        else
        {
            return $this->render('form', [
                'model' => $model,
            ]);
        }
    }  

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $qntdSubmetidos = 0;

        if (Yii::$app->user->identity->perfil === 'Professor' || Yii::$app->user->identity->perfil === 'Tutor')
        {
            $professor =  Usuario::findOne(['id_usuario' => Yii::$app->user->identity->id_usuario]);

            $disc = Disciplina::findOne(['id_disciplina' => $professor->disciplina_id]);

            $models = Pesquisas::find()->where(['turma' => $disc->turma])
                                    ->andWhere(['status' => "Submetido"])
                                    ->all();

            if ( $models == null ) $qntdSubmetidos = 0;
            else 
            {
                foreach ($models as $m)
                {
                    $qntdSubmetidos = $qntdSubmetidos + 1;
                }
            }
        }

        elseif ( Yii::$app->user->identity->perfil === 'Aluno' )
        {

            $models = Pesquisas::find()->where(['aluno_id' => Yii::$app->user->identity->id_usuario])
                                         ->andWhere(['status' => "Resolvido"])
                                         ->all();

            if ( $models == null ) $qntdSubmetidos = 0;
            else 
            {
                foreach ($models as $m)
                {
                    $qntdSubmetidos = $qntdSubmetidos + 1;
                }
            }
        }

        return $this->render('index', [
            'qntdSubmetidos' => $qntdSubmetidos,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
      public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) 
        {
            if ( Yii::$app->user->identity->perfil == "Aluno")
            {
                if (  Yii::$app->user->identity->termo == 0 || Yii::$app->user->identity->termo == 2)
                {
                    return $this->redirect(["usuario/termo", 'resposta' => 0]);
                }
            }
            return $this->redirect(["site/index"]);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
    * Login para alunos que foram direcionados por Code Bench
    * Parâmetros: // organizar - repostas das 44 questões e  
    * redireciona para o actionLogin () ?
    */

    public function actionAlunologin( $q1,  $q2,  $q3,  $q4,  $q5,  $q6,  $q7,  $q8,  $q9,  $q10,  $q11,  $q12,  $q13,  $q14,  $q15,  $q16,  $q17,  $q18,  $q19,  $q20,  $q21,  $q22,  $q23,  $q24,  $q25,  $q26,  $q27,  $q28,  $q29,  $q30,  $q31,  $q32,  $q33,  $q34,  $q35,  $q36,  $q37,  $q38,  $q39,  $q40,  $q41,  $q42, $q43, $q44, $nome, $email, $turma)
    {

        $ATIREF_a = 0;
        $ATIREF_b = 0;    
        if ($q1 == '1'){
            $ATIREF_a = $ATIREF_a+1;
        }else{
            $ATIREF_b = $ATIREF_b+1;
        }
        if ($q5 == '1'){
            $ATIREF_a = $ATIREF_a+1;
        }else{
            $ATIREF_b = $ATIREF_b+1;
        }
        if ($q9 == '1'){
            $ATIREF_a = $ATIREF_a+1;
        }else{
            $ATIREF_b = $ATIREF_b+1;
        }
        if ($q13 == '1'){
            $ATIREF_a = $ATIREF_a+1;
        }else{
            $ATIREF_b = $ATIREF_b+1;
        }
        if ($q17 == '1'){
            $ATIREF_a = $ATIREF_a+1;
        }else{
            $ATIREF_b = $ATIREF_b+1;
        }
        if ($q21 == '1'){
            $ATIREF_a = $ATIREF_a+1;
        }else{
            $ATIREF_b = $ATIREF_b+1;
        }
        if ($q25 == '1'){
            $ATIREF_a = $ATIREF_a+1;
        }else{
            $ATIREF_b = $ATIREF_b+1;
        }
        if ($q29 == '1'){
            $ATIREF_a = $ATIREF_a+1;
        }else{
            $ATIREF_b = $ATIREF_b+1;
        }
        if ($q33 == '1'){
            $ATIREF_a = $ATIREF_a+1;
        }else{
            $ATIREF_b = $ATIREF_b+1;
        }
        if ($q37 == '1'){
            $ATIREF_a = $ATIREF_a+1;
        }else{
            $ATIREF_b = $ATIREF_b+1;
        }
        if ($q41 == '1'){
            $ATIREF_a = $ATIREF_a+1;
        }else{
            $ATIREF_b = $ATIREF_b+1;
        }
        //Coluna SEM/INT
        $SEMINT_a = 0;
        $SEMINT_b = 0;
        if ($q2 == '1'){
            $SEMINT_a = $SEMINT_a+1;
        }else{
            $SEMINT_b = $SEMINT_b+1;
        }
        if ($q6 == '1'){
            $SEMINT_a = $SEMINT_a+1;
        }else{
            $SEMINT_b = $SEMINT_b+1;
        }
        if ($q10 == '1'){
            $SEMINT_a = $SEMINT_a+1;
        }else{
            $SEMINT_b = $SEMINT_b+1;
        }
        if ($q14 == '1'){
            $SEMINT_a = $SEMINT_a+1;
        }else{
            $SEMINT_b = $SEMINT_b+1;
        }
        if ($q18 == '1'){
            $SEMINT_a = $SEMINT_a+1;
        }else{
            $SEMINT_b = $SEMINT_b+1;
        }
        if ($q22 == '1'){
            $SEMINT_a = $SEMINT_a+1;
        }else{
            $SEMINT_b = $SEMINT_b+1;
        }
        if ($q26 == '1'){
            $SEMINT_a = $SEMINT_a+1;
        }else{
            $SEMINT_b = $SEMINT_b+1;
        }
        if ($q30 == '1'){
            $SEMINT_a = $SEMINT_a+1;
        }else{
            $SEMINT_b = $SEMINT_b+1;
        }
        if ($q34 == '1'){
            $SEMINT_a = $SEMINT_a+1;
        }else{
            $SEMINT_b = $SEMINT_b+1;
        }
        if ($q38 == '1'){
            $SEMINT_a = $SEMINT_a+1;
        }else{
            $SEMINT_b = $SEMINT_b+1;
        }
        if ($q42 == '1'){
            $SEMINT_a = $SEMINT_a+1;
        }else{
            $SEMINT_b = $SEMINT_b+1;
        }
        //Coluna VIS/VER
        $VISVER_a = 0;
        $VISVER_b = 0;
        if ($q3 == '1'){
            $VISVER_a = $VISVER_a+1;
        }else{
            $VISVER_b = $VISVER_b+1;
        }
        if ($q7 == '1'){
            $VISVER_a = $VISVER_a+1;
        }else{
            $VISVER_b = $VISVER_b+1;
        }
        if ($q11 == '1'){
            $VISVER_a = $VISVER_a+1;
        }else{
            $VISVER_b = $VISVER_b+1;
        }
        if ($q15 == '1'){
            $VISVER_a = $VISVER_a+1;
        }else{
            $VISVER_b = $VISVER_b+1;
        }
        if ($q19 == '1'){
            $VISVER_a = $VISVER_a+1;
        }else{
            $VISVER_b = $VISVER_b+1;
        }
        if ($q23 == '1'){
            $VISVER_a = $VISVER_a+1;
        }else{
            $VISVER_b = $VISVER_b+1;
        }
        if ($q27 == '1'){
            $VISVER_a = $VISVER_a+1;
        }else{
            $VISVER_b = $VISVER_b+1;
        }
        if ($q31 == '1'){
            $VISVER_a = $VISVER_a+1;
        }else{
            $VISVER_b = $VISVER_b+1;
        }
        if ($q35 == '1'){
            $VISVER_a = $VISVER_a+1;
        }else{
            $VISVER_b = $VISVER_b+1;
        }
        if ($q39 == '1'){
            $VISVER_a = $VISVER_a+1;
        }else{
            $VISVER_b = $VISVER_b+1;
        }
        if ($q43 == '1'){
            $VISVER_a = $VISVER_a+1;
        }else{
            $VISVER_b = $VISVER_b+1;
        }
            //Coluna SEQ/GLO
            $SEQGLO_a = 0;
            $SEQGLO_b = 0;
        if ($q4 == '1'){
            $SEQGLO_a = $SEQGLO_a+1;
        }else{
            $SEQGLO_b = $SEQGLO_b+1;
        }
        if ($q8 == '1'){
            $SEQGLO_a = $SEQGLO_a+1;
        }else{
            $SEQGLO_b = $SEQGLO_b+1;
        }
        if ($q12 == '1'){
            $SEQGLO_a = $SEQGLO_a+1;
        }else{
            $SEQGLO_b = $SEQGLO_b+1;
        }
        if ($q16 == '1'){
            $SEQGLO_a = $SEQGLO_a+1;
        }else{
            $SEQGLO_b = $SEQGLO_b+1;
        }
        if ($q20 == '1'){
            $SEQGLO_a = $SEQGLO_a+1;
        }else{
            $SEQGLO_b = $SEQGLO_b+1;
        }
        if ($q24 == '1'){
            $SEQGLO_a = $SEQGLO_a+1;
        }else{
            $SEQGLO_b = $SEQGLO_b+1;
        }
        if ($q28 == '1'){
            $SEQGLO_a = $SEQGLO_a+1;
        }else{
            $SEQGLO_b = $SEQGLO_b+1;
        }
        if ($q32 == '1'){
            $SEQGLO_a = $SEQGLO_a+1;
        }else{
            $SEQGLO_b = $SEQGLO_b+1;
        }
        if ($q36 == '1'){
            $SEQGLO_a = $SEQGLO_a+1;
        }else{
            $SEQGLO_b = $SEQGLO_b+1;
        }
        if ($q40 == '1'){
            $SEQGLO_a = $SEQGLO_a+1;
        }else{
            $SEQGLO_b = $SEQGLO_b+1;
        }
        if ($q44 == '1'){
            $SEQGLO_a = $SEQGLO_a+1;
        }else{
            $SEQGLO_b = $SEQGLO_b+1;
        }

        $ATIREF=0;
        if ($ATIREF_a > $ATIREF_b){
            //$ATIREF = $ATIREF_a - $ATIREF_b;
            //$ATIREF = $ATIREF.1;
            $ATIREF = $ATIREF_a;
        }else{
            //$ATIREF = $ATIREF_b - $ATIREF_a;
            //$ATIREF = $ATIREF.2;
            $ATIREF = $ATIREF_b;
        }
        $SEMINT=0;
        if ($SEMINT_a > $SEMINT_b){
            //$SEMINT = $SEMINT_a - $SEMINT_b;
            //$SEMINT = $SEMINT.1;
            $SEMINT = $SEMINT_a;
        }else{
            //$SEMINT = $SEMINT_b - $SEMINT_a;
            //$SEMINT = $SEMINT.2;
            $SEMINT = $SEMINT_b;
        }
        $VISVER=0;
        if ($VISVER_a > $VISVER_b){
            //$VISVER = $VISVER_a - $VISVER_b;
            $VISVER = $VISVER_a;
        }else{
            //$VISVER = $VISVER_b - $VISVER_a;
            //$VISVER = $VISVER.2;
            $VISVER = $VISVER_b;
        }
        $SEQGLO=0;
        if ($SEQGLO_a > $SEQGLO_b){
            //$SEQGLO = $SEQGLO_a - $SEQGLO_b;
            //$SEQGLO = $SEQGLO.1;
            $SEQGLO = $SEQGLO_a;
        }else{
            //$SEQGLO = $SEQGLO_b - $SEQGLO_a;
            $SEQGLO = $SEQGLO_b;
        }  // ($nome, $email, $turma, $cpf, $estilo)

        $estilo = "";

        if ( ($ATIREF > $SEMINT) && ($ATIREF > $VISVER) && ($ATIREF > $SEQGLO) ) // Preponderante: ativo e reflexivo
        {
            //$estilo = "ATIREF";//"ativo e reflexivo";
            if ( $ATIREF_a > $ATIREF_b ) $estilo = "Ativo";
            else $estilo = "Reflexivo";

        }
        elseif ( ($VISVER > $ATIREF) && ($VISVER > $SEMINT) && ($VISVER > $SEQGLO) ) // Preponderante: visual e veral
        {
            //$estilo = "VISVER";//"visual e veral";
            if ( $VISVER_a > $VISVER_b ) $estilo = "Visual";
            else $estilo = "Verbal";
        }
        elseif ( ($SEMINT > $ATIREF) && ($SEMINT > $VISVER) && ($SEMINT > $SEQGLO) ) // Preponderante: sensorial e intuitivo
        {
            //$estilo = "SEMINT" ;//"sensorial e intuitivo";
            if ( $SEMINT_a > $SEMINT_b ) $estilo = "Sensorial";
            else $estilo = "Intuitivo";
        }
        else  // Preponderante: sequencial e global
        {
            //$estilo = "SEQGLO";//"sequencial e global";
            if ( $SEQGLO_a > $SEQGLO_b ) $estilo = "Sequencial";
            else $estilo = "Global";
        }  

        if ( $estilo != "" ) 
        {
             //return $this->render('about');
            return Yii::$app->runAction('usuario/newstudent', ['nome' => $nome, 'email' => $email, 'turma' => $turma, 'estilo' => $estilo]);
        }
        else 
        {
                //return $this->redirect(["site/login"]);
            return $this->render('error');
        }

        
    }  

}
