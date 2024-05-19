<?php
    if(isset($_SESSION['logged'])){
        header("Location: /{$_SESSION['logged']['type']}");
        die();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body id="login">
    <form action="/login/auth" method="post">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" required>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <p></p>
        <input type="submit" value="Entrar" name="login">
    </form>
    <script>
        $('form').on('submit', function (event) {
            event.preventDefault();
            
            var $form = $(this),
                url = $form.attr( "action" )

            $.ajax({
                url: '/login/auth',
                type: 'post',
                data: $form.serialize(),
                dataType: 'json',
                beforeSend: function (){
                    $form.find('input[type="submit"]').prop('disabled', true)
                }
            })
            .done(function (data) {
                $form.find('input[type="submit"]').prop('disabled', false)
                if (data.url) {
                    location.href = data.url
                }
                $form.find('p').html(data.erro)
            })
            .fail(function () {
                $form.find('input[type="submit"]').prop('disabled', false)
                $form.find('p').html('OOPS! Erro interno do servidor')
            })
        })
    </script>
</body>
</html>
