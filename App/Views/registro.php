<form action="/registro" method="POST">
    <input type="text" name="nome">
    <input type="text" name="cnpj">
    <input type="file" name="pfp">
    <input type="text" name="senha">
    <input type="text" name="email">
    <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <input type="submit" value="asd">
</form>