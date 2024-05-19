<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->title ?></title>
    <link rel="stylesheet" href="/assets/css/admin/style.css">
    <!-- HTMX -->
    <script src="https://unpkg.com/htmx.org@1.9.12" integrity="sha384-ujb1lZYygJmzgSwoxRggbCHcjc0rB2XoQrxeTUQyRjrOnlCoYta87iKBWq3EsdM2" crossorigin="anonymous"></script>
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/cdd96683ff.js" crossorigin="anonymous"></script>
    
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Gsap -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
</head>
<body>
    <header>
        <img src="" alt="logo">
        <h1>Admin Area</h1>
    </header>
    <nav>
        <button hx-get="/admin/buffet/register/form" hx-target="main">Cadastrar Buffet</button>
        <button hx-get="/admin/dashboard" hx-target="main">Buffets Cadastrados</button>
    </nav>
    
    <main>
        <?php $this->renderView('dashboard', 'Admin'); ?>
    </main>
    <script>
        htmx.on('htmx:beforeRequest', function (event) {
            if ($('main form').length){
                var arrayInputEmpty = $('form').serializeArray().map(function (input) {
                    if (input.value){
                        return true
                    }
                    return false
                })
                if (!arrayInputEmpty.every(input => input === false)) {
                    event.preventDefault()
                }
            }
        })
    </script>
</body>
</html>
