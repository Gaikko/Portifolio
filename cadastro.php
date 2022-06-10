<?php
require_once "conexao.php";
$conexao = new conexao();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body class="corpo">
    <nav id="navmenu">
        <ul id="ulmenu">
            <li id="limenu"><a id="aidmenu" href="./index.html"><img id="imglogo" src="IMG/logo.png" alt="Logo"></a></li>
            <li id="limenu"><a id="aidmenu" href="./index.html">Home</a></li>
            <li id="limenu"><a id="aidmenu" href="#">Objetivo</a></li>
            <li id="limenu"><a id="aidmenu" href="#">Projetos</a></li>
            <li id="limenu"><a id="aidmenu" href="#">Contato</a></li>
            <li id="limenu"><a id="aidmenu" href="./login.php">Login</a></li>
        </ul>
    </nav>
    <form method="post" class="frmcad">
        <label for="frmcad">Cadastro</label>
        <label for="login" id="lbllogin">Login: </label>
        <input type="text" name="login" id="itlogin">
        <label for="password" id="lblpassword">Senha: </label>
        <input type="password" name="password" id="itpassword">
        <input type="submit" value="Cadastrar" id="btncad">
    </form>

    <?php
    if(isset($_POST['login']))
    {
        $login = addslashes($_POST['login']);
        $senha = addslashes($_POST['password']);
        //verificar se está preeenchido

        if(!empty($nome) && !empty($senha))
        {
            $conexao->conectar();
            if($conexao->msgErro == "") //tudo ok
            {
              echo "Conexao OK!";
                if($senha != null)
                {
                    if($conexao->cadastrar($nome, $senha))
                    {
                        ?>
                        <div id="msg-erro">
                            Cadastrado com Sucesso!
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div id="msg-erro">
                            Email já Cadastrado!
                        </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <div id="msg-erro">
                            Senha e Confirmar Senha Não Correspondem.
                        </div>
                        <?php
                }
            }
            else
            {
                ?>
                        <div id="msg-erro">
                            <?php echo"Erro: ".$conexao->msgErro ?>
                        </div>
                        <?php
            }
        }
        else
        {
            ?>
                        <div id="msg-erro">
                            Preencha todos os campos!
                        </div>
                        <?php
        }

    }
    
    
    ?>
    
    <h6 id="h6js"></h6>
    <script src="JS/script.js"></script>
</body>
</html>