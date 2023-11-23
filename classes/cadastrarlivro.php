<?php

class livro{
    private $pdo;
    public $msgErro ="";

    private $servername = "localhost";
    private $username = "root";
    private $password = ""; 

    // Função para conectar ao banco de dados
    public function conectar()
    {
            global $pdo;
            global $servername;
            global $username;
            global $password;
            try {
                $conn = new PDO("mysql:host=$servername;dbname=sistema_livrariapjint", $username, $password);
                echo "Conexão com banco de dados realizada com sucesso.";
            } catch (PDOException $e) {
                echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $e->getMessage();
            }

       // try
        //{
       // $pdo = new PDO("mysql:dbname=".$nome.";host=".$edtora,$titulo_l,$autor_l,$ano_l,$preco_l,$quant_l,$tipo_l);
       // }catch (PDOExeption $e){

        //    $msgErro= $e->getMessage();// Para guarda mesagem de erro! 
        //}  
    }
    public function cadastrar($edtora,$titulo_l,$autor_l,$ano_l,$preco_l,$quant_l,$tipo_l)
    {
        global $pdo;

        // verificar se o livro já esta cadastrado.

        $sql = $pdo->prepara("SELECT idEditora FROM Nomedaeditora
        WHERE edtora = :e");
        $sql->bindValue(":e",$edtora);
        $sql->execute();
        if($sql->rowCount()> 0)
        {


            return false;
            //já está cadastrado.
        }
        // Caso não livro não esteja cadastrado fazer cadastro.
        else{
            $sql = $pdo->prepara("INSERT INTO acervo01(Nomedaeditora, Titulodolivro, Nomedoautor,
             Ano, Preço, Quantidade, Cadastrarlivro) VALUES (:e, :t, :a, :p, :q,:tp)");

            $sql->bindValue(":e",$edtoratora);
            $sql->bindValue(":t",$titulo_l);
            $sql->bindValue(":a",$autor_l);
            $sql->bindValue(":p",$preco_l);
            $sql->bindValue(":q",$quant_l);
            $sql->bindValue(":tp",$tipo_l);
            $sql->execute();
            return true;// foi cadrastado com sucesso.
        }

    }
   
}


?>
