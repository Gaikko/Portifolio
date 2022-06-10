<?php
require_once "conexao.php";
$conexao = new conexao();
$conexao->conectar();

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
            <li id="limenu"><a id="aidmenu" href="#">Login</a></li>
        </ul>
    </nav>
    <form method="post" action="cadastro.php" class="frmcad">
        <label for="frmcad">Logar-se</label>
        <label for="login" id="lbllogin">Login: </label>
        <input type="text" name="login" id="itlogin">
        <label for="password" id="lblpassword">Senha: </label>
        <input type="password" name="password" id="itpassword">
        <input type="submit" value="Logar-se" id="btncad">
    </form>
    <h6 id="h6js"></h6>
    <script src="JS/script.js"></script>
</body>
</html>