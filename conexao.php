<?php

class conexao {

    private $conn;

    public function conectar(){
        $username = 'root';
        $password = '';
        $conn = new PDO('mysql:host=localhost;dbname=senac-portifolio', $username, $password);
        
        try {
            $conn = new PDO('mysql:host=localhost;dbname=senac-portifolio', $username, $password);
            echo "Conexão conexao.php - OK!";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

    }

    public function cadastrar($login, $senha)
    {
        global $conn;

        $sql = $conn->prepare("SELECT email FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$login);
        $sql->execute();
        if($sql->rowCount()>0)
        {
            return false; //email já cadastrado
        }
        else
        {
        $sql = $conn->prepare("INSERT INTO usuarios (id, login, senha, id_status) VALUES ('', :n, :s, '')");
        $sql->bindValue(":n",$login);
        $sql->bindValue(":s",$senha);
        $sql->execute();
        return true; //tudo ok
        }
    }

    public function logar($login, $senha)
    {
        global $conn;

        //verificar se o email e a senha estão cadastrados, se sim
        $sql = $conn->prepare("SELECT email FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $login);
        $sql->bindValue(":s",$senha);
        $sql->execute();
        if($sql->rowCount()>0){

            //entrar no sistema
            $dado = $sql->fetch();
            session_start();
            $_SESSION['email'] = $dado['email'];
            return true;//usuário cadastrado
        }
        else{
            echo "Usuário Não Encontrado!";
            return false; //não foi possível logar
        }
    }
}

?>