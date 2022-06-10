<?php

class conexao {

    private $conn;

    public function conectar(){
        $username = 'root';
        $password = '';
        $conn = new PDO('mysql:host=localhost;dbname=senac-portifolio', $username, $password);
        
        try {
            $conn = new PDO('mysql:host=localhost;dbname=senac-portifolio', $username, $password);
            echo "Conexão OK!";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

    }

    public function cadastrar($nome, $senha)
    {
        global $conn;

        $sql = $conn->prepare("SELECT email FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$nome);
        $sql->execute();
        if($sql->rowCount()>0)
        {
            return false; //email já cadastrado
        }
        else
        {

        $sql = $conn->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
        $sql->bindValue(":n",$nome);
        $sql->bindValue(":s",$senha);
        $sql->execute();
        return true; //tudo ok
        }
    }
}

?>