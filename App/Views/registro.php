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
<section class="flex flex-col md:flex-row h-screen items-center">

  <div class="hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen" id="login-img">
  </div>

  <div class="bg-landing w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
        flex items-center justify-center">

    <div class="w-full h-100">


    <h1 class="text-xl text-white md:text-2xl font-bold leading-tight mb-5">Crie sua conta</h1>
        
        <form action="/registro" method="POST" enctype="multipart/form-data">
        
            <div class="mb-3">
                <label for="nome" class="mb-3 block text-base text-white">
                    Nome do Buffet
                </label>
                <input type="text" name="nome"  autofocus autocomplete required
                    class="w-full py-2 px-6 rounded-lg bg-amber-300 border placeholder-black focus:border-blue-500 focus:bg-amber-200 focus:outline-none" />
            </div>
            <div class="mb-3">
                <label for="cnpj" class="mb-3 block text-base text-white">
                    Cnpj
                </label>
                <input type="text" name="cnpj"  autofocus autocomplete required
                    class="w-full py-2 px-6 rounded-lg bg-amber-300 border placeholder-black focus:border-blue-500 focus:bg-amber-200 focus:outline-none" />
                <label for="pfp" class="mb-3 block text-base text-white">
                    Foto
                </label>
                <input type="file" name="pfp"  autofocus autocomplete required
                    class="w-full rounded-lg bg-amber-300 border placeholder-black focus:border-blue-500 focus:bg-amber-200 focus:outline-none" />
            </div>
            <div class="mb-3">
                <label for="email" class="mb-3 block text-base text-white">
                    Email
                </label>
                <input type="text" name="email"  autofocus autocomplete required
                    class="w-full py-2 px-6 rounded-lg bg-amber-300 border placeholder-black focus:border-blue-500 focus:bg-amber-200 focus:outline-none" />
            </div>
            <div class="mb-3">
                <label for="senha" class="mb-3 block text-base text-white">
                    Senha
                </label>
                <input type="text" name="senha"  autofocus autocomplete required
                    class="w-full py-2 px-6 rounded-lg bg-amber-300 border placeholder-black focus:border-blue-500 focus:bg-amber-200 focus:outline-none" />
            </div>
            <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
            <div>
                <input type="submit" value="Registrar"
                class="w-full block bg-amber-300 hover:bg-amber-400 focus:bg-amber-400 font-semibold rounded-lg
                px-4 py-3 mt-6">
            </div>
            <a href="/"><p class="justify-self-end text-slate-200 mt-5 border-b-2 border-slate-200 hover:text-white hover:border-white">Voltar</p></a>
        </form>
    </div>
  </div>

</section>