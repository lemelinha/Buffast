<div class="grid-cols-1 h-screen w-screen ml-20 p-5 sm:p-14">
  <div class=" h-full w-full bg-card rounded-2xl p-5">
    <h1 class="text-amber-300 main-font text-lg lg:text-4xl">
      Editar Perfil
    </h1>
    <div class="grid grid-cols-1 md:grid md:grid-cols-[4fr_2fr] h-full w-full">
      <div class="place-content-center md:px-28">
        <figure>
          <img src="" class="h-36 w-36 rounded-full justify-self-center" id="login-img">
        </figure>
        <div>
          <label for="nome" class="my-3 block text-base text-white">
            Nome do Buffet
          </label>
          <input type="text" name="nome" autofocus autocomplete required
            class="w-full py-2 px-6 rounded-lg bg-amber-300 border placeholder-black focus:border-blue-500 focus:bg-amber-200 focus:outline-none" />
        </div>
        <div>
          <label for="cnpj" class="my-3 block text-base text-white">
            Cnpj
          </label>
          <input type="text" name="cnpj" autofocus autocomplete required
            class="w-full py-2 px-6 rounded-lg bg-amber-300 border placeholder-black focus:border-blue-500 focus:bg-amber-200 focus:outline-none" />
        </div>
        <div>
          <label for="email" class="my-3 block text-base text-white">
            Email
          </label>
          <input type="text" name="email" autofocus autocomplete required
            class="w-full py-2 px-6 rounded-lg bg-amber-300 border placeholder-black focus:border-blue-500 focus:bg-amber-200 focus:outline-none" />
        </div>
        <div class="grid grid-rows-1 gap-2 mt-1 lg:grid lg:grid-cols-2">
          <div class="">
            <button type="submit"
              class="bg-amber-300 text-sm p-2 rounded-xl main-font font-tittle md:text-lg  lg:p-2">Alterar
            </button>
          </div>
          <div class="">
            <button data-modal-target="novasenha" data-modal-toggle="novasenha"
              class="bg-amber-300 text-sm  p-2 rounded-xl main-font font-tittle md:text-lg  lg:p-2">Alterar
              Senha</button>
          </div>
        </div>
      </div>
      <div>
        <div class="hidden md:grid grid-cols-3 place-content-center w-full h-full gap-10">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 mt-4 rounded-b-xl justify-self-center">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 rounded-b-xl justify-self-center">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 mt-4 rounded-b-xl justify-self-center">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 mt-4 rounded-b-xl justify-self-center">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 rounded-b-xl justify-self-center">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 mt-4 rounded-b-xl justify-self-center">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 mt-4 rounded-b-xl justify-self-center">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 rounded-b-xl justify-self-center">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 mt-4 rounded-b-xl justify-self-center">
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->renderView('modal', 'Admin/perfil') ?>