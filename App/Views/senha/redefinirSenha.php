<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buffast</title>
    <link href="/assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
    <div class="center bg-landing h-screen w-screen text-center place-content-center">
        <div class="col-span-2">
            <label for="Nsenha" class="text-amber-300 text-5xl p-2 main-font">Nova Senha</label>
            <input type="password" name="senha" id="Nsenha" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-56 justify-self-center"required="">
        </div>
        <div class="col-span-2">
            <label for="N2senha" class="text-amber-300 text-5xl p-2 main-font">Repita a Nova Senha</label>
            <input type="password" name="senha-confirmacao" id="N2senha" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-56 justify-self-center"required="">
        </div>
    <button type="button" id="trocar" class="w-72 justify-self-center block bg-amber-300 hover:bg-amber-400 focus:bg-amber-400 font-semibold rounded-lg
    px-4 py-3 mt-6">Trocar</button>
    <p class="retorno" style="height: 1rem"></p>
  </div>
</form>

<script>
    $('button#trocar').click(function () {
        if ($('#Nsenha').val() !== $('#N2senha').val()) {
            $('p.retorno').text('As senhas não coincidem');
            return
        }
        $('form').trigger('submit')
    });
</script>
