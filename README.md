<h1>Instructions / Instruções</h1>

<h4>EN - English</h4>

To use the code, you will first need to create a database called "ci4api", and then, create a table with the following comand:<br/>
(In case you want to change the names of the database or table, you will need to reconfigure the Database.php file located at App/Config/Database.php)

CREATE TABLE `ci4api`.`usuarios` ( `id` INT NOT NULL AUTO_INCREMENT ,
`nome` VARCHAR(30) NOT NULL , `email` VARCHAR(30) NOT NULL ,
`senha` VARCHAR(30) NOT NULL , PRIMARY KEY (`id`));

To begin testing the API, you'll need to use the postman app (https://www.postman.com/).

<h3> -- List all users -- </h3>

To list all users, select the method GET and use the following URL: http://localhost/ci4api/public/usuarios.

<h3> -- List a specific user -- </h3>

To list a specific user, you'll also use the method GET, but you'll need to add the id of the user you want to list at the end of the URL.<br/>
Example: http://localhost/ci4api/public/usuarios/id. (use the number of the id instead of "id" in the end of the URL)

<h3> -- Create a new user -- </h3>

To create a new user, select the method POST, then you'll need to inform the parameters of the validation token and the data of the user you want to create.<br/>
First, go to "Headers". In the the KEY column you'll inform the name of the key (token), then in the VALUE column the value of the key (allowaccess).<br/>
Now, go to "Body" and select the "form-data" option. The keys are the name of the fields in the database and the values is the data you want to give for that field.<br/>
Example: "Key: name, Value: Pedro"; "Key: email, Value: pedro@system.com"; "Key: password, Value: 123".<br/>
Use the following URL to create a new user: http://localhost/ci4api/public/usuarios.

<h3> -- Update a user -- </h3>

To update a user, select the method PUT. First go to "Headers" and inform the parameters of the validation token (as described in the POST steps).<br/>
In the "Body", select the "raw" option and write the data you want to update.<br/>
Example: {"name": "Pedro", "email": "pedro@system.com", "password": "123"}<br/>
Then use the following URL to update the user: http://localhost/ci4api/public/usuarios/id. (use the number of the id instead of "id" in the end of the URL)

<h3> -- Remove a user -- </h3>

To remove a user, select the method DELETE. First go to "Headers" and inform the parameters of the validation token (as described in the POST steps).<br/>
Then use the following URL to remove the user: http://localhost/ci4api/public/usuarios/id. (use the number of the id instead of "id" in the end of the URL)

<h4>NOTICE</h4>

The name of the database's fields are in portuguese, for that we have:
<ul>
  <li> "nome" = name;</li>
  <li>"email" = email;</li>
  <li>"senha" = password;</li>
</ul>
In case you don't change the names in the database and the variables in the code, you'll need to use the name of the fields in portuguese for the API to work.<br/>

<br/>
<h4>PT - Português (Brasil)</h4>

Para começar a utilizar o código, você deverá primeiro criar um banco de dados chamado "ci4api", e então criar uma tabela usando o seguinte comando:<br/>
(Caso você queira alterar os nomes do banco de dados ou tabela, você precisará reconfigurar o arquivo Database.php localizado em App/Config/Database.php)

CREATE TABLE `ci4api`.`usuarios` ( `id` INT NOT NULL AUTO_INCREMENT ,
`nome` VARCHAR(30) NOT NULL , `email` VARCHAR(30) NOT NULL ,
`senha` VARCHAR(30) NOT NULL , PRIMARY KEY (`id`));

Para começarmos a realizar testes com a API, precisaremos utilizar o aplicativo postman (https://www.postman.com/).

<h3> -- Listar todos usuários -- </h3>

Para listar todos os usuários, selecione o método GET e informe a seguinte URL: http://localhost/ci4api/public/usuarios.

<h3> -- Listar um usuário específico -- </h3>

Para listar um usuário em específico, utilizamos o método GET, porém devemos adicionar o id do usuário no final da URL.<br/>
Exemplo: http://localhost/ci4api/public/usuarios/id. (use o número do id ao invés de "id" no final da URL)

<h3> -- Criar um novo usuário -- </h3>

Para criar um novo usuário, selecione o método POST. Precisaremos informar os parâmetros do token de validação e as informações do usuários que será criado.<br/>
Primeiro, clique em "Headers". A coluna KEY representa o nome da chave (insira a palavra token) e a coluna VALUE o valor da chave (insira a palavra allowaccess).<br/>
Agora, clique em "Body" e selecione a opção "form-data". Nas colunas "Key", você deve informar o nome dos campos da tabela usuários e nas colunas "Value" os valores.<br/>
Exemplo: "Key: nome, Value: Pedro"; "Key: email, Value: pedro@sistema.com"; "Key: senha, Value: 123";<br/>
Use a seguinte URL para criar um novo usuário: http://localhost/ci4api/public/usuarios.

<h3> -- Atualizar um usuário -- </h3>

Para atualizar um usuário, selecione o método PUT. Vá em "Headers" e informe os parâmetros do token de validação (descrito nos passos do método POST).<br/>
Em "Body", selecione a opção "raw" e escreva as infomações que serão atualizadas.<br/>
Exemplo: {"nome": "Pedro", "email": "pedro@sistema.com", "senha": "123"}<br/>
Então, use a seguinte URL para realizar a atualização: http://localhost/ci4api/public/usuarios/id. (use o número do id ao invés de "id" no final da URL)

<h3> -- Remover um usuário -- </h3>

Para remover um usuários, selecione o método DELETE.  Vá em "Headers" e informe os parâmetros do token de validação (descrito nos passos do método POST).<br/>
Então, use a seguinte URL para realizar a remoção: http://localhost/ci4api/public/usuarios/id. (use o número do id ao invés de "id" no final da URL)
