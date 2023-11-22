    <!--Usada para incorporar código PHP neste aquivo.  -->
<?php
require_once 'classes/cadrastrarlivro.php';
$l = new livro;
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login LIVRARIA</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <!-- Criando os campos do formulário, para fazer o cadastro dos livros -->
    
    <div id="corpo-form">
   <h1>Cadastrar livro</h1>
    <form method="POST">
        <input type="text" name="edtora" placeholder="Nome da editora">
        <input type="text" name="titulo_l" placeholder="Titulo do livro">
        <input type="text" name="autor_l" placeholder="Nome do autor">
        <input type="text" name="ano_l" placeholder="Ano">
        <input type="text" name="preco_l" placeholder="Preço">
        <input type="text" name="quant_l" placeholder="Quantidade">
        <input type="text" name="tipo_l" placeholder="Tipo">
        <input type="submit" name="name" value="Cadastrar livro">
    </form>
    </div>

   <?php
   //verificar se a pessoa clicou no botao
   if(isset($_POST['name']))
   {
    $edtora = addslashes($_POST['edtora']);
    $titulo_l = addslashes($_POST['titulo_l']);
    $autor_l= addslashes($_POST['autor_l']);
    $ano_l = addslashes($_POST['ano_l']);
    $preco_l = addslashes($_POST['preco_l']);
    $quant_l = addslashes($_POST['quant_l']);
    $tipo_l = addslashes($_POST['tipo_l']);

    //verificar se os campos estão vazio.

    if(!empty ($edtora) && !empty ($titulo_l) && !empty ($autor_l)
            && !empty ($ano_l) && !empty ($preco_l) && !empty ($quant_l) && !empty ($tipo_l))
            {
                
                $u->conectar("login_livrariapjt","localhost","root",""); 
                if($l->msgErro == "")//Se a mensagem de erro estiver vazia estar tudo certo.
                {
                    if($u->cadastrar($edtora,$titulo_l,$autor_l,$ano_l,$preco_l,$quant_l,$tipo_l))
                    {
                        echo "Cadastrado com sucesso!;
                    } 
                    else{
                        echo "Livro já cadastrado";
                        } 
                }
                else {
                echo "Erro:" .$l->msgErro;
                } 
        else{
            <!-- Informa ao usuário que falta preencher um campo ainda!-->

            echo "Preencha todos os campos!";
            }
    }
?>
</body>
</html>