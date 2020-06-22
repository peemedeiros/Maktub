-- PROJETO DE Processo seletivo MAKTUB --

Autor: Pedro H L Medeiros.
Situação: Finalizado

Resumo do projeto: Deverá ser feito uma tela inicial contendo um menu com as opções “Home”, “Contato”,
“Sobre nós” e “Suporte”. A disposição de todas as interfaces fica por criatividade própria.

Home: Haverá um slide na parte superior, um resumo sobre a empresa abaixo do slide e
uma área para simulação para cotar um plano. A simulação consiste em pedir as faixas
etárias das pessoas interessadas no plano (As faixas etárias são sempre nos ranges: 0-18,
19-23, 24-28, 29-33, 34-38, 39-43, 44-48, 49-53, 54-58 e 59+). Cada plano possui uma
operadora e um reembolso. É possível que um mesmo plano contenha as modalidades E
(Enfermaria) e A (Apartamento) sendo a modalidade A sempre mais cara que a modalidade
E. Cada faixa etária tem um preço diferente e normalmente crescente de acordo com a
idade. O usuário poderá escolher algum plano e esta escolha enviará um contato para o
banco de dados aonde será mantido essa escolha e retornando uma mensagem que em
breve um de nossos corretores entrará em contato.

Contato: Área de formulário simples contendo algumas informações da empresa como
número de telefone, e-mail e endereço. O formulário deverá pedir o Nome,
Telefone/Celular, E-mail (opcional), e Observação.

Sobre nós: Área contendo textos sobre a empresa podendo conter imagens, mas não
sendo obrigatório.

Suporte: A área de suporte haverá um sistema de FAQ aonde o usuário poderá digitar sua
dúvida e logo em seguida haverá tópicos relacionados com a dúvida. Exemplos de
perguntas: Vocês vendem seguros de veículos? R: No momento só trabalhamos com
seguros saúde, mas temos como objetivo cobrir toda a área de seguros num futuro próximo.



O teste funcionará como uma avaliação de suas habilidades como programadores e sua
criatividade sobre um sistema até então desconhecido.

Para testar o projeto:

Após clonar o projeto, importe a base de dados que se encontra em "./database/basededados.sql" no seu banco de dados local.
Configure o arquivo de conexão que se encontra em "./functions/conexao.php" com suas credenciais de preferência.

Ao finalizar a importação do banco de dados e as configurações do arquivo de conexao ('conexao.php'), será criado um usuario padrão para acessar as sessões bloqueadas.

email: aragon@admin.com
senha: 123

Utilize essas credenciais para entrar no painel de administrador, onde terá acesso ao cadastro de operadores, responder perguntas e visualizar mensagens de contato.

Ao cadastrar um operador, ele tera acesso ao cadastro de planos e as cotações enviadas para os planos que ele mesmo cadastrou. Isso para que o operador consiga ter o contato mais próximo com usuário que o enviou a cotação.