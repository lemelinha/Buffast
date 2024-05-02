<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->title ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body id="adminLayout">
    <header>
        Admin Area
    </header>
    <img src="" alt="logo">
    <nav>
        <a href="/admin/cadastrar/buffet">Cadastrar Buffet</a>
        <a href="/admin/dashboard">Buffets Cadastrados</a>
    </nav>
    <?php $this->loadView() ?>
</body>
</html>
