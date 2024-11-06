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
<!-- component 
 <header class="text-center main-font text-white font-bold h-1/5">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#803469"><path d="M0 1v99c134.3 0 153.7-99 296-99H0Z" opacity=".5"></path><path d="M1000 4v86C833.3 90 833.3 3.6 666.7 3.6S500 90 333.3 90 166.7 4 0 4h1000Z" opacity=".5"></path><path d="M617 1v86C372 119 384 1 196 1h421Z" opacity=".5"></path><path d="M1000 0H0v52C62.5 28 125 4 250 4c250 0 250 96 500 96 125 0 187.5-24 250-48V0Z"></path></svg>        
    </header>
    <div class="main-font flex justify-center align-center mt-36">
      <h6 class="font-tittle font-bold text-9xl">Buffast</h6>
    </div> 
-->
<section class="flex flex-col md:flex-row h-screen items-center">

  <div class="hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen" id="login-img">
  </div>

  <div class="bg-theme w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
        flex items-center justify-center">

    <div class="w-full h-100">


      <h1 class="text-xl text-white md:text-2xl font-bold leading-tight mt-12">Entre na sua conta</h1>

      <form class="mt-6" action="#" method="POST">
        <div>
          <label class="block text-white">Email</label>
          <input type="email" name="" id="" placeholder="Insira seu email" class="w-full px-4 py-3 rounded-lg bg-amber-300 mt-2 border placeholder-black focus:border-blue-500 focus:bg-amber-200 focus:outline-none" autofocus autocomplete required>
        </div>

        <div class="mt-4">
          <label class="block text-white">Senha</label>
          <input type="password" name="" id="" placeholder="Insira sua Senha" minlength="6" class="w-full px-4 py-3 rounded-lg bg-amber-300 mt-2 border placeholder-black focus:border-blue-500 focus:bg-amber-200 focus:outline-none" required>
        </div>

        <div class="text-right mt-2">
          <a href="#" class="text-sm font-semibold text-white hover:text-amber-300 focus:text-amber-300">Esqueceu a Senha?</a>
        </div>

        <button type="submit" class="w-full block bg-amber-300 hover:bg-amber-400 focus:bg-amber-400 font-semibold rounded-lg
              px-4 py-3 mt-6">Entrar</button>
      </form>

      <hr class="my-6 border-amber-300 w-full">

      <button type="button" class="w-full block bg-amber-300 hover:bg-amber-400 focus:bg-amber-400 text-gray-900 font-semibold rounded-lg px-4 py-3 border border-gray-300">
            <div class="flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="w-6 h-6" viewBox="0 0 48 48"><defs><path id="a" d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/></defs><clipPath id="b"><use xlink:href="#a" overflow="visible"/></clipPath><path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z"/><path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/><path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/><path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/></svg>
            <span class="ml-4">
            Entrar com o 
            Google</span>
            </div>
          </button>

      <p class="mt-8 text-white">Sem cadastro? <a href="#" class="text-amber-300 hover:text-amber-400 font-semibold">Crie uma conta aqui!</a></p>


    </div>
  </div>

</section>