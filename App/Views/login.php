<?php
    if(isset($_SESSION['logged'])){
        header("Location: /{$_SESSION['logged']['type']}/dashboard");
        die();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body id="login">
    <form action="/login/auth" method="post">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha">
        <p>
            <?php
                if(isset($_SESSION['msg_erro'])){
                    echo $_SESSION['msg_erro'];
                    unset($_SESSION['msg_erro']);
                }
            ?>
        </p>
        <input type="submit" value="Entrar" name="login">
    </form>
</body>
</html>