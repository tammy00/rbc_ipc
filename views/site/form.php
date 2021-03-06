
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Learning Styles - Felder e Silverman';
?>

<H3>Questionário Index Learning Styles - Felder e Silverman</H3>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true])->label('Nome') ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('E-mail') ?>
    <?= $form->field($model, 'turma')->radioList(array('TE01'=>'TE01', 'TE02'=>'TE02'))->label('Turma') ?>


<LI>Eu compreendo melhor um assunto depois que:<BR>
			<INPUT TYPE=radio NAME=q1 VALUE=1> &nbsp; <B>(a)</B> Experimento.<BR> 
			<INPUT TYPE=radio NAME=q1 VALUE=2> &nbsp; <B>(b)</B> Penso sobre o mesmo.</LI><P>
		<!-- Questao 2-->	
		<LI>Eu prefiro ser considerado(a):<BR>
			<INPUT TYPE=radio NAME=q2 VALUE=1> &nbsp; <B>(a)</B> Uma pessoa realista.<BR>
			<INPUT TYPE=radio NAME=q2 VALUE=2> &nbsp; <B>(b)</B> Uma pessoa inovadora.</LI><P>
		<!-- Questao 3-->	
		<LI> Quando eu penso sobre o que eu fiz ontem, normalmente faço uso de:<BR>
			<INPUT TYPE=radio NAME=q3 VALUE=1> &nbsp; <B>(a)</B>Uma imagem.<BR> 
			<INPUT TYPE=radio NAME=q3 VALUE=2> &nbsp; <B>(b)</B>Uma palavra.</LI><P> 
		<!-- Questao 4-->	
		<LI>Tenho tendência a:<BR>
			<INPUT TYPE=radio NAME=q4 VALUE=1> &nbsp; <B>(a)</B>Compreender detalhes de um assunto, mas fico confuso 
			(a) em relação à sua estrutura geral.<BR> 
			<INPUT TYPE=radio NAME=q4 VALUE=2> &nbsp; <B>(b)</B>Compreender a estrutura geral, 
			mas me confundo com os detalhes.</LI><P>
		<!-- Questao 5-->
		<LI>Quando estou aprendendo algo novo, ajuda-me muito:<BR>
			<INPUT TYPE=radio NAME=q5 VALUE=1> &nbsp; <B>(a)</B>Falar sobre o assunto.<BR> 
			<INPUT TYPE=radio NAME=q5 VALUE=2> &nbsp; <B>(b)</B>Pensar sobre o assunto.</LI><P>
		<!-- Questao 6-->
		<LI>Se eu fosse professor, eu preferiria dar um curso que:<BR>
			<INPUT TYPE=radio NAME=q6 VALUE=1> &nbsp; <B>(a)</B>Lidasse com fatos e situações reais.<BR> 
			<INPUT TYPE=radio NAME=q6 VALUE=2> &nbsp; <B>(b)</B>Lidasse com ideias e teorias.</LI><P>
		<!-- Questao 7-->
		<LI>Para obter informações novas eu prefiro:<BR>
			<INPUT TYPE=radio NAME=q7 VALUE=1> &nbsp; <B>(a)</B>Diagramas, gráficos ou mapas.<BR> 
			<INPUT TYPE=radio NAME=q7 VALUE=2> &nbsp; <B>(b)</B>Instruções escritas ou dados verbais.</LI><P>
		<!-- Questao 8-->
		<LI>Assim eu compreendo:<BR>
			<INPUT TYPE=radio NAME=q8 VALUE=1> &nbsp; <B>(a)</B>Todas as partes, eu compreendo o todo.<BR> 
			<INPUT TYPE=radio NAME=q8 VALUE=2> &nbsp; <B>(b)</B>O Todo, eu consigo visualizar as partes.</LI><P> 
		<!-- Questao 9-->
		<LI>Em um grupo de estudos, trabalhando com um material difícil, possivelmente:<BR>
			<INPUT TYPE=radio NAME=q9 VALUE=1> &nbsp; <B>(a)</B>Me envolvo e contribuo com ideias.<BR> 
			<INPUT TYPE=radio NAME=q9 VALUE=2> &nbsp; <B>(b)</B>Me sento e escuto a discussão.</LI><P> 
		<!-- Questao 10-->
		<LI>Acho que é mais fácil: aprender os fatos:<BR>
			<INPUT TYPE=radio NAME=q10 VALUE=1> &nbsp; <B>(a)</B>Aprender os fatos.<BR> 
			<INPUT TYPE=radio NAME=q10 VALUE=2> &nbsp; <B>(b)</B>Aprender os conceitos.</LI><P> 
		<!-- Questao 11-->
		<LI>Em um livro que tenha gravuras e quadros, normalmente:<BR>
			<INPUT TYPE=radio NAME=q11 VALUE=1> &nbsp; <B>(a)</B>Verifico as gravuras e quadros cuidadosamente.<BR> 
			<INPUT TYPE=radio NAME=q11 VALUE=2> &nbsp; <B>(b)</B>Presto atenção ao texto escrito.</LI><P> 
		<!-- Questao 12-->
		<LI>1Quando resolvo problemas de matemática:<BR>
			<INPUT TYPE=radio NAME=q12 VALUE=1> &nbsp; <B>(a)</B>Normalmente os soluciono passo-a-passo.<BR> 
			<INPUT TYPE=radio NAME=q12 VALUE=2> &nbsp; <B>(b)</B>Frequentemente só visualizo os resultados, 
			e sinto dificuldades para entender seus passos.</LI><P> 
		<!-- Questao 13-->
		<LI>Nas aulas que frequentei:<BR>
			<INPUT TYPE=radio NAME=q13 VALUE=1> &nbsp; <B>(a)</B>Normalmente fiz amizade com muitos alunos.<BR> 
			<INPUT TYPE=radio NAME=q13 VALUE=2> &nbsp; <B>(b)</B>Raramente fiz amizade com muitos alunos.</LI><P> 
		<!-- Questao 14-->
		<LI>Em leituras que não são de ficção, prefiro:<BR>
			<INPUT TYPE=radio NAME=q14 VALUE=1> &nbsp; <B>(a)</B>Aquelas que me ensinam fatos novos ou que me digam como fazer algo.<BR> 
			<INPUT TYPE=radio NAME=q14 VALUE=2> &nbsp; <B>(b)</B>Aquelas que me despertam novas ideias.</LI><P> 
		<!-- Questao 15-->
		<LI>Gosto dos professores:<BR>
			<INPUT TYPE=radio NAME=q15 VALUE=1> &nbsp; <B>(a)</B>Que colocam diagramas no quadro.<BR> 
			<INPUT TYPE=radio NAME=q15 VALUE=2> &nbsp; <B>(b)</B>Que passam muito tempo explicando.</LI><P> 
		<!-- Questao 16-->
		<LI>Quando estou analisando uma história ou novela:<BR>
			<INPUT TYPE=radio NAME=q16 VALUE=1> &nbsp; <B>(a)</B>Eu penso nos incidente se tento uni-los para compreender os temas.<BR> 
			<INPUT TYPE=radio NAME=q16 VALUE=2> &nbsp; <B>(b)</B>Somente sei quais são os temas quando termino de ler e, então, 
			tenho que voltar à leitura para encontrar os incidentes que os apontam.</LI><P>
		<!-- Questao 17-->	
		<LI>Quando começo a resolver um problema dado como de casa, normalmente:<BR>
			<INPUT TYPE=radio NAME=q17 VALUE=1> &nbsp; <B>(a)</B>Começo a trabalhar imediatamente para encontrar a solução.<BR> 
			<INPUT TYPE=radio NAME=q17 VALUE=2> &nbsp; <B>(b)</B>Tento compreender todo o problema primeiro.</LI><P>
		<!-- Questao 18-->	
		<LI>Prefiro a ideia da:<BR>
			<INPUT TYPE=radio NAME=q18 VALUE=1> &nbsp; <B>(a)</B>Certeza.<BR>
			<INPUT TYPE=radio NAME=q18 VALUE=2> &nbsp; <B>(b)</B>Teoria.</LI><P> 
		<!-- Questao 19-->		
		<LI>Lembro-me melhor:<BR>
			<INPUT TYPE=radio NAME=q19 VALUE=1> &nbsp; <B>(a)</B>Daquilo que vejo.<BR> 
			<INPUT TYPE=radio NAME=q19 VALUE=2> &nbsp; <B>(b)</B>Daquilo que ouço.</LI><P>
		<!-- Questao 20-->	
		<LI>É mais importante para mim que o professor ou o instrutor:<BR>
			<INPUT TYPE=radio NAME=q20 VALUE=1> &nbsp; <B>(a)</B>Apresente todo o material de maneira sequencial e clara.<BR>
			<INPUT TYPE=radio NAME=q20 VALUE=2> &nbsp; <B>(b)</B>Ofereça-me um quadro geral e 
			relacione o material a outros assuntos.</LI><P>
		<!-- Questao 21-->		
		<LI>Prefiro estudar:<BR>
			<INPUT TYPE=radio NAME=q21 VALUE=1> &nbsp; <B>(a)</B>Em grupo.<BR> 
			<INPUT TYPE=radio NAME=q21 VALUE=2> &nbsp; <B>(b)</B>Sozinho(a).</LI><P> 
		<!-- Questao 22-->	
		<LI>Prefiro que me considerem como alguém que é:<BR>
			<INPUT TYPE=radio NAME=q22 VALUE=1> &nbsp; <B>(a)</B>Minucioso (a) com o meu trabalho.<BR> 
			<INPUT TYPE=radio NAME=q22 VALUE=2> &nbsp; <B>(b)</B>Criativo (a) com o meu trabalho.</LI><P> 
		<!-- Questao 23-->	
		<LI>Quando necessito de instruções para ir a um local desconhecido, prefiro:<BR>
			<INPUT TYPE=radio NAME=q23 VALUE=1> &nbsp; <B>(a)</B>Um mapa.<BR>
			<INPUT TYPE=radio NAME=q23 VALUE=2> &nbsp; <B>(b)</B>Instruções escritas.</LI><P> 
		<!-- Questao 24-->		
		<LI>Eu aprendo:<BR>
			<INPUT TYPE=radio NAME=q24 VALUE=1> &nbsp; <B>(a)</B>Em ritmo regular. Se estudar muito, vou entender tudo.<BR> 
			<INPUT TYPE=radio NAME=q24 VALUE=2> &nbsp; <B>(b)</B>“Aos trancos e barrancos”. Fico totalmente confuso (a). 
			De repente, tudo se encaixa.</LI><P> 
		<!-- Questao 25-->	
		<LI>Primeiramente eu prefiro:<BR>
			<INPUT TYPE=radio NAME=q25 VALUE=1> &nbsp; <B>(a)</B>Experimentar as coisas.<BR> 
			<INPUT TYPE=radio NAME=q25 VALUE=2> &nbsp; <B>(b)</B>Pensar em como vou fazê-la.</LI><P> 
		<!-- Questao 26-->	
		<LI>Quando estou lendo como lazer, gosto dos escritores que: <BR>
			<INPUT TYPE=radio NAME=q26 VALUE=1> &nbsp; <B>(a)</B>Dizem claramente o que desejam (usam um estilo direto).<BR> 
			<INPUT TYPE=radio NAME=q26 VALUE=2> &nbsp; <B>(b)</B>Dizem as coisas de maneira criativa e interessante 
			(usam um estilo mais rebuscado).</LI><P> 
		<!-- Questao 27-->	
		<LI>Quando vejo um diagrama ou um esquema em uma aula, geralmente me lembro mais facilmente:<BR>
			<INPUT TYPE=radio NAME=q27 VALUE=1> &nbsp; <B>(a)</B>Das gravuras.<BR> 
			<INPUT TYPE=radio NAME=q27 VALUE=2> &nbsp; <B>(b)</B>Daquilo que o professor disse.</LI><P> 
		<!-- Questao 28-->	
		<LI>Ao considerar o corpo de uma informação, normalmente eu:<BR>
			<INPUT TYPE=radio NAME=q28 VALUE=1> &nbsp; <B>(a)</B>Presto atenção aos detalhes e ignoro a mensagem geral.<BR> 
			<INPUT TYPE=radio NAME=q28 VALUE=2> &nbsp; <B>(b)</B>Tento compreender a mensagem geral antes de verificar os detalhes.</LI><P> 
		<!-- Questao 29-->
		<LI> Eu me lembro mais facilmente:<BR>
			<INPUT TYPE=radio NAME=q29 VALUE=1> &nbsp; <B>(a)</B>Daquilo que fiz.<BR> 
			<INPUT TYPE=radio NAME=q29 VALUE=2> &nbsp; <B>(b)</B>Daquilo que pensei bastante a respeito.</LI><P>
		<!-- Questao 30-->
		<LI>Quando tenho que desempenhar uma tarefa, prefiro:<BR>
			<INPUT TYPE=radio NAME=q30 VALUE=1> &nbsp; <B>(a)</B>Traçar uma maneira de executá-la.<BR> 
			<INPUT TYPE=radio NAME=q30 VALUE=2> &nbsp; <B>(b)</B>Trazer jeitos novos de fazê-la.</LI><P> 
		<!-- Questao 31-->		
		<LI>Quando alguém está me mostrando alguns dados, eu prefiro: :<BR>
			<INPUT TYPE=radio NAME=q31 VALUE=1> &nbsp; <B>(a)</B>Tabelas e gráficos.<BR> 
			<INPUT TYPE=radio NAME=q31 VALUE=2> &nbsp; <B>(b)</B>Textos que resumem os resultados.</LI><P> 
		<!-- Questao 32-->			
		<LI>Quando estou escrevendo algum documento, normalmente:<BR>
			<INPUT TYPE=radio NAME=q32 VALUE=1> &nbsp; <B>(a)</B>Faço um trabalho (penso e escrevo) 
			que vai do princípio ao fim progressivamente.<BR>
			<INPUT TYPE=radio NAME=q32 VALUE=2> &nbsp; <B>(b)</B>Faço um trabalho (penso e escrevo) 
			que envolve diferentes partes do documento. Só depois eu coloco em ordem.</LI><P> 
		<!-- Questao 33-->
		<LI>Quando tenho que trabalhar em um projeto de grupo, primeiramente eu desejo:<BR>
			<INPUT TYPE=radio NAME=q33 VALUE=1> &nbsp; <B>(a)</B>Fazer “tempestade de ideias” envolvendo todo o grupo
			para todos contribuírem com ideias.<BR>
			<INPUT TYPE=radio NAME=q33 VALUE=2> &nbsp; <B>(b)</B>Trazer jeitos novos de fazê-la.</LI><P>
		<!-- Questao 34-->	
		<LI>Eu considero elogio enorme chamar alguém de:<BR>
			<INPUT TYPE=radio NAME=q34 VALUE=1> &nbsp; <B>(a)</B>Sensível.<BR> 
			<INPUT TYPE=radio NAME=q34 VALUE=2> &nbsp; <B>(b)</B>Imaginativo.</LI><P> 
		<!-- Questao 35-->	
		<LI>Quando encontro as pessoas em uma festa, lembro-me mais facilmente:<BR>
			<INPUT TYPE=radio NAME=q35 VALUE=1> &nbsp; <B>(a)</B>De como elas eram.<BR> 
			<INPUT TYPE=radio NAME=q35 VALUE=2> &nbsp; <B>(b)</B>Do que disseram sobre si mesmas.</LI><P> 
		<!-- Questao 36-->	
		<LI>Quando estou aprendendo uma matéria nova, eu prefiro:<BR>
			<INPUT TYPE=radio NAME=q36 VALUE=1> &nbsp; <B>(a)</B>	Concentrar-me no assunto, aprendendo o máximo que eu puder.<BR> 
			<INPUT TYPE=radio NAME=q36 VALUE=2> &nbsp; <B>(b)</B>Tentar fazer conexões entre aquele assunto e 
			outros que sejam relacionados.</LI><P>
		<!-- Questao 37-->	
		<LI>Prefiro que me considerem:<BR>
			<INPUT TYPE=radio NAME=q37 VALUE=1> &nbsp; <B>(a)</B>	Extrovertido (a).<BR> 
			<INPUT TYPE=radio NAME=q37 VALUE=2> &nbsp; <B>(b)</B>Reservado (a).</LI><P> 
		<!-- Questao 38-->	
		<LI>Prefiro cursos que enfatizem o:<BR>
			<INPUT TYPE=radio NAME=q38 VALUE=1> &nbsp; <B>(a)</B>Material concreto (fatos, dados).<BR> 
			<INPUT TYPE=radio NAME=q38 VALUE=2> &nbsp; <B>(b)</B>Material abstrato (conceitos, teorias).</LI><P> 
		<!-- Questao 39-->	
		<LI>Para o lazer, eu prefiro:<BR>
			<INPUT TYPE=radio NAME=q39 VALUE=1> &nbsp; <B>(a)</B>Assistir à televisão.<BR> 
			<INPUT TYPE=radio NAME=q39 VALUE=2> &nbsp; <B>(b)</B>Ler um livro.</LI><P>
		<!-- Questao 40-->		
		<LI>Alguns professores começam a sua aula com um esboço sobre o que vão expor, que são:<BR>
			<INPUT TYPE=radio NAME=q40 VALUE=1> &nbsp; <B>(a)</B>De certa forma útil para mim.<BR> 
			<INPUT TYPE=radio NAME=q40 VALUE=2> &nbsp; <B>(b)</B>Muito úteis para mim.</LI><P> 
		<!-- Questao 41-->		
		<LI>A ideia de fazer o dever de casa em grupo, com uma nota para o grupo inteiro: <BR>
			<INPUT TYPE=radio NAME=q41 VALUE=1> &nbsp; <B>(a)</B>Me atrai.<BR> 
			<INPUT TYPE=radio NAME=q41 VALUE=2> &nbsp; <B>(b)</B>Não me atrai.</LI><P> 
		<!-- Questao 42-->			
		<LI>Quando estou fazendo cálculos longos:<BR>
			<INPUT TYPE=radio NAME=q42 VALUE=1> &nbsp; <B>(a)</B>Tenho a tendência de repetir todos os 
			meus passos e verificar meu trabalho com cuidado.<BR> 
			<INPUT TYPE=radio NAME=q42 VALUE=2> &nbsp; <B>(b)</B>Acho que verificar o trabalho é 
			algo cansativo e tenho que forçar para fazer isso.</LI><P> 
		<!-- Questao 43-->	
		<LI>Tenho tendência a descrever os locais nos quais já estive:<BR>
			<INPUT TYPE=radio NAME=q43 VALUE=1> &nbsp; <B>(a)</B>Facilmente e como são.<BR> 
			<INPUT TYPE=radio NAME=q43 VALUE=2> &nbsp; <B>(b)</B>Com dificuldade e sem muitos detalhes.</LI><P> 
		<!-- Questao 44-->	
		<LI>Quando estou resolvendo problemas em grupo, muito provavelmente:<BR>
			<INPUT TYPE=radio NAME=q44 VALUE=1> &nbsp; <B>(a)</B>Considero os passos do processo que levam à solução.<BR> 
			<INPUT TYPE=radio NAME=q44 VALUE=2> &nbsp; <B>(b)</B>Considero as possíveis consequências ou aplicações
			da solução em diferentes áreas.</LI><P> 

    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
    </div>

    </div>


<?php ActiveForm::end(); ?>
