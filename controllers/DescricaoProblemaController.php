<?php

namespace app\controllers;

use Yii;
use app\models\DescricaoProblema;
use app\models\DescricaoProblemaSearch;
use app\models\SolucaoProblema;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\EstiloSearch;
use app\models\Estilo;

/**
 * DescricaoProblemaController implements the CRUD actions for DescricaoProblema model.
 */
class DescricaoProblemaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'acess' => [
                'class' => AccessControl::className(),
                'only' => ['create','index','update', 'view', 'delete', 'searchsolution', 'done', 'newcasedescription'],
                'rules' => [
                    [
                        'actions' => ['create','index','update', 'view', 'delete', 'searchsolution', 'done', 'newcasedescription'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            if (!Yii::$app->user->isGuest)
                            {
                                if ( Yii::$app->user->identity->perfil === 'Tutor' ) 
                                {
                                    return Yii::$app->user->identity->perfil == 'Tutor'; 
                                }
                                elseif ( Yii::$app->user->identity->perfil === 'Professor' ) 
                                {
                                    return Yii::$app->user->identity->perfil == 'Professor'; 
                                }
                                elseif ( Yii::$app->user->identity->perfil === 'Aluno' && Yii::$app->user->identity->termo === 1)
                                {
                                    return Yii::$app->user->identity->perfil == 'Aluno'; 
                                }
                                elseif ( Yii::$app->user->identity->perfil === 'Administrador' ) 
                                {
                                    return Yii::$app->user->identity->perfil == 'Administrador'; 
                                }
                            }
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DescricaoProblema models.
     * @return mixed
     */
    public function actionIndex()
    {
        if ( Yii::$app->user->identity->perfil === 'Administrador' ||
           Yii::$app->user->identity->perfil === 'Professor' ||
           Yii::$app->user->identity->perfil === 'Tutor' )
        {
            $searchModel = new DescricaoProblemaSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single DescricaoProblema model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDone($id, $mensagem)
    {
        return $this->render('done', [
            'model' => $this->findModel($id),
            'mensagem' => $mensagem,
        ]);
    }

    public function actionSearchsolution()  // Função que recupera o caso mais similar
    {
        $model = new DescricaoProblema();
        $tema = "";
        $topico = "";
        $des = "";
        $estiloApr = "";
        $natureza = "";

        $model->estiloAprendizagem = Yii::$app->user->identity->estilo;

        if ($model->load(Yii::$app->request->post()))
        {
             
            //estilo = Estilo::find()->where(['id_estilo' => $model->estiloAprendizagem])->one();

            $tema = $model->tema;
            $topico = $model->topico;
            $des = $model->descrProblema;
            //$estiloApr = $estilo->nome_estilo;
            $estiloApr = $model->estiloAprendizagem;
            $natureza = $model->naturezaProblema;

            // Enviar json pelo CURL
            //Cria a array com os dados recebido, sendo q o ID é gerado pelo WS
            $postArray = array(
                "tema" => $model->tema,
                "topico" => $model->topico,
                "descricaoProblema" => $model->descrProblema,
                "naturezaProblema" => $model->naturezaProblema,
                //"estiloDeAprendizagem" => $estilo->nome_estilo,
                "estiloDeAprendizagem" => $model->estiloAprendizagem,
            );

            // Converte os dados para o formato jSon
            $json = json_encode( $postArray );

            // receber resposta do servidor

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_PORT => "8080", //porta do WS
                CURLOPT_URL => "http://localhost:8080/ServerRBC/ServerRBC/casos/caso", //Caminho do WS que vai receber o POST
                CURLOPT_RETURNTRANSFER => true, //Recebe resposta
                CURLOPT_ENCODING => "JSON", //Decodificação
                CURLOPT_MAXREDIRS => 5,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST", //metodo
                CURLOPT_POSTFIELDS => $json, //string com dados à serem postados
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($json)),
            ));
            $result = curl_exec($curl); //recebe o resultado em json
            $err = curl_error($curl); //recebe o erro da classe ou WS
            curl_close($curl); //Encerra a biblioteca

            // tratar erros

            if ($err)
            {
                
                return $this->render('searchsolution', [
                    'model' => $model,
                    'erro' => $err,
                ]);  
                //return $this->actionIndex();

            } // ELSE pegar o id do caso, criar variável de similaridade, return view do Solução
            else
            {
                
                $data = json_decode($result,true);

                $idSolucao = $data['solucaoId'];
                $similaridadeCalculada = $data['similaridade'];

                if ( $idSolucao == null || $similaridadeCalculada == null ) return $this->actionIndex();

                //É para isso acontecer mesmo? Verificar com a Pri
                //$salvarModel = $this->findModel($idSolucao);
                //$salvarModel->descrProblema = $model->descrProblema;
                // $tema, $topico, $des, $estilo, $natureza
                
                return Yii::$app->runAction('solucao-problema/solutionfound', 
                    ['idSolucao' => $idSolucao, 
                    'similaridade' => $similaridadeCalculada, 
                    'etapa' => 1,
                    'tema' => $model->tema,
                    'topico' => $model->topico,
                    'des' => $model->descrProblema,
                    'estilo' => $model->estiloAprendizagem,
                    'natureza' => $model->naturezaProblema
                    ]);  /*
                    ($idSolucao, $similaridade, $etapa, $tema, $topico, $des, $estilo, $natureza)
                return $this->redirect(Url::toRoute(['solucao-problema/solutionfound', [
                    'idSolucao' => $idSolucao, 
                    'similaridade' => $similaridadeCalculada, 
                    'etapa' => 1,
                    'tema' => $model->tema,
                    'topico' => $model->topico,
                    'des' => $model->descrProblema,
                    'estilo' => $model->estiloAprendizagem,
                    'natureza' => $model->naturezaProblema
                    ]]));  */
            }
        }
        else 
        {
            //$arrayDeEstilo = ArrayHelper::map(EstiloSearch::find()->all(), 'id_estilo', 'nome_estilo');
            
            //modulos
            $arrayModulos = array('Variáveis' => 'Variáveis', 
                'Estrutura Condicional' =>'Estrutura Condicional', 
                'Estruturas Condicionais Encadeadas' => 'Estruturas Condicionais Encadeadas', 
                'Repetição por Condição' => 'Repetição por Condição', 
                'Vetores' => 'Vetores', 
                'Strings' => 'Strings', 
                'Repetição por Contagem' => 'Repetição por Contagem', 
                'Matrizes' => 'Matrizes'                
                );

            //Topicos
            $arrayTopicos = array ('Variáveis' => 'Variáveis', 
                'Tipos de Variáveis' => 'Tipos de Variáveis', 'Strings'=> 'Strings', 'Entrada de Dados' => 'Entrada de Dados', 'Bibliotecas' => 'Bibliotecas', 'Comentários' => 'Comentários', 
                 'Estrutura Condicional Simples (Comando if)' => 'Estrutura Condicional Simples (Comando if)', 'Operadores Relacionais' => 'Operadores Relacionais', 'Prioridade de Operadores' => 'Prioridade de Operadores', 'Estruturas Condicionais Compostas (Comando if e else)' => 'Estruturas Condicionais Composta (Comando if e else)', 
                 'Estruturas Condicionais Encadeadas (Comando if e else aninhados) ' => 'Estruturas Condicionais Encadeadas (Comando if e else aninhados)', 
                 'Repetição por Condição (Comando while)' => 'Repetição por Condição (Comando while)', 'Repetição aninhados' => 'Repetição aninhados', 
                 'Vetores' => 'Vetores', 
                 'Strings' => 'Strings', 
                 'Matrizes'=> 'Matrizes');



            return $this->render('searchsolution', [
                'model' => $model,
                //'arrayDeEstilo' => $arrayDeEstilo,
                'arrayTopicos' => $arrayTopicos,
                'arrayModulos' => $arrayModulos,
            ]);
        }
    }

    public function actionList_topics ($tema)
    {
        $list_topics;

        if ( $tema === 'Variáveis') 
        { // Variáveis
            $list_topics = array('Variáveis' => 'Variáveis', 
                'Tipos de Variáveis' => 'Tipos de Variáveis', 'Strings'=> 'Strings', 'Entrada de Dados' => 'Entrada de Dados', 'Bibliotecas' => 'Bibliotecas', 'Comentários' => 'Comentários');
        }
        // Estruturas Condicionais
        if ( $tema === 'Estrutura Condicional') 
        { 
            $list_topics = array('Estrutura Condicional Simples (Comando if)' => 'Estrutura Condicional Simples (Comando if)', 'Operadores Relacionais' => 'Operadores Relacionais', 'Prioridade de Operadores' => 'Prioridade de Operadores', 'Estruturas Condicionais Compostas (Comando if e else)' => 'Estruturas Condicionais Composta (Comando if e else)');
        }
        // Estrutura Condicional Encadeada,
        if ( $tema === 'Estruturas Condicionais Encadeadas') 
        { 
            $list_topics = array('Estruturas Condicionais Encadeadas (Comando if e else aninhados) ' => 'Estruturas Condicionais Encadeadas (Comando if e else aninhados)');
        }
        // Repetição por Condição
        if ( $tema === 'Repetição por Condição') 
        { 
            $list_topics = array('Repetição por Condição (Comando while)' => 'Repetição por Condição (Comando while)', 'Repetição aninhados' => 'Repetição aninhados');
        } 
        // Vetores
        if ( $tema === 'Vetores') 
        { 
            $list_topics = array('Vetores' => 'Vetores');
        }
        //Strings
        if ($tema == 'Strings')
        {
            $list_topics = array('Strings' => 'Strings');
        }
        //Repetição por Contagem
        if($tema == 'Repetição por Contagem')
        {
            $list_topics = array('Repetição por Contagem (Comando for)' => 'Repetição por Contagem (Comando for)');
        }
        //Matrizes
        if($tema == 'Matrizes')
        {
            $list_topics = array('Matrizes'=> 'Matrizes');
        }

        //return ;
        foreach ($list_topics as $key => $value) {
            echo "<option value'".$key."'>".$value."</option>";
            # code...
        }
    }

    /**
     * Creates a new DescricaoProblema model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if ( Yii::$app->user->identity->perfil === 'Administrador' ||
            Yii::$app->user->identity->perfil === 'Professor' ||
            Yii::$app->user->identity->perfil === 'Tutor')
        {
            $model = new DescricaoProblema();

            if ($model->load(Yii::$app->request->post()) && $model->save()) 
            {
                //return  Yii::$app->runAction('solucao-problema/create');
                //return $this->redirect(['view', 'id' => $model->id_descProblema]);
                
                return $this->redirect(['done', 'id' => $model->id_descProblema, 'mensagem' => 'Descrição cadastrada com sucesso!']);
            } else {
                $arrayDeEstilo = ArrayHelper::map(EstiloSearch::find()->all(), 'id_estilo', 'nome_estilo');
                $arrayTopicos = array ('Estrutura Condicional Simples' => 'Estrutura Condicional Simples', 
    'Estrutura Condicional Composta' => 'Estrutura Condicional Composta', 
    'Operadores Lógicos' => 'Operadores Lógicos',
    'Funções' => 'Funções',
    'Estruturas de Repetição com teste no início' => 'Estruturas de Repetição com teste no início',
    'Estruturas de Repetição com teste no fim' => 'Estruturas de Repetição com teste no fim',
    'Declaração de Variáveis' => 'Declaração de Variáveis');

                return $this->render('create', [
                    'model' => $model,
                    'arrayDeEstilo' => $arrayDeEstilo,
                    'arrayTopicos' => $arrayTopicos,
                ]);
            }
        }
    }

    /**
     * Updates an existing DescricaoProblema model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if ( Yii::$app->user->identity->perfil === 'Administrador' ||
            Yii::$app->user->identity->perfil === 'Professor' ||
            Yii::$app->user->identity->perfil === 'Tutor')
        {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                //return $this->redirect(['view', 'id' => $model->id_descProblema]);
                return $this->redirect(['done', 'id' => $model->id_descProblema, 'mensagem' => 'Modificação realizada com sucesso!']);
            } else {
                $arrayDeEstilo = ArrayHelper::map(EstiloSearch::find()->all(), 'id_estilo', 'nome_estilo');
                $arrayTopicos = array ('Estrutura Condicional Simples' => 'Estrutura Condicional Simples', 
    'Estrutura Condicional Composta' => 'Estrutura Condicional Composta', 
    'Operadores Lógicos' => 'Operadores Lógicos',
    'Funções' => 'Funções',
    'Estruturas de Repetição com teste no início' => 'Estruturas de Repetição com teste no início',
    'Estruturas de Repetição com teste no fim' => 'Estruturas de Repetição com teste no fim',
    'Declaração de Variáveis' => 'Declaração de Variáveis');
                return $this->render('update', [
                    'model' => $model,
                    'arrayDeEstilo' => $arrayDeEstilo,
                    'arrayTopicos' => $arrayTopicos,
                ]);
            }
        }
    }

    /**
     * Deletes an existing DescricaoProblema model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if ( Yii::$app->user->identity->perfil === 'Administrador' ||
            Yii::$app->user->identity->perfil === 'Professor' ||
            Yii::$app->user->identity->perfil === 'Tutor')
        {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the DescricaoProblema model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DescricaoProblema the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DescricaoProblema::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página requistada não existe.');
        }
    }
/*
    public function actionNewcasedescription ($desc, $tema, $topico, $estilo, $natureza)
    {

    }  */
}
