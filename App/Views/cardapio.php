<style>
     <?php
                foreach ($produtos as $produto) {
                    ?>
#prod-img {
	background-image: url("<?= $produto->url_imagem ?>");
	background-size: 100% 100%;
	background-position: center;
	background-repeat: no-repeat;
}
<?php
                }
            ?>
</style>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buffast</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="/assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
</head>
<body>
<main class="grid grid-rows-[2fr_6fr] w-screen painel">
    <header class="text-center main-font text-white font-bold">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#803469"><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 77 666.7 77 833.3 28 1000 28V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 70 666.7 70 833.3 16 1000 16V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 63 666.7 63 833.3 4 1000 4V0H0Z"></path></svg>
    <div class="grid grid-cols-1 lg:grid lg:grid-cols-[1fr_3fr_1fr]">
        <h1 class="ml-4 font-tittle text-4xl p-2 md:text-5xl lg:col-start-2 lg:text-6xl lg:p-0">Cardápio</h1>
        <form class="w-10/12 sm:col-start-3 sm:w-full mx-auto sm:pr-2">
                <label for="search" class="mb-2 text-sm font-medium text-amber-300 sr-only">Pesquisar</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-amber-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="search" class="block w-full p-4 ps-10 text-sm text-amber-300 border border-gray-300 rounded-lg bg-card-modal focus:ring-blue-500 focus:border-blue-500 placeholder:text-amber-300" placeholder="Pesquisar" required />
                    <button type="submit" class="font-tittle absolute end-2.5 bottom-2.5 bg-amber-300 hover:bg-amber-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-1 py-2 ">Pesquisar</button>
                </div>
            </form>
        </div>
    </header>
    <div class="flex-1 overflow-auto">
        <div class="cards scroll-container h-auto grid grid-cols-1 gap-12 sm:grid-cols-2 sm:gap-12 md:grid-cols-3 md:gap-12 md:text-sm lg:grid-cols-4 lg:text-base lg:gap-12 px-12 py-2">
            <?php
                foreach ($produtos as $produto) {
                    ?>
                        <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font flex flex-col">
                            <header class="card-header grid justify-items-center text-base md:text-lg lg:text-xl">
                                <p class="pb-3 text-amber-300"><?= $produto->nome_produto ?></p>
                                <div class="rounded-lg shadow-2xl h-40 w-72" id="prod-img"></div>
                            </header>
                            <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-base lg:text-lg">
                                <p><span class="text-amber-300">Quantidade por Pote:</span> <span class="font-bold"><?= $produto->quantidade_pote ?></span></p>
                            </section>
                            <footer class="flex justify-end mt-auto">
                                <button data-modal-target="editar" data-modal-toggle="editar" class="editar-produto bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2" cd_produto="<?= $produto->cd_produto ?>" url_imagem="<?= $produto->url_imagem ?>" nome_produto="<?= $produto->nome_produto ?>" quantidade_pote="<?= $produto->quantidade_pote ?>" id_buffet="<?= $produto->id_buffet ?>">
                                    Alterar
                                </button>
                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="deletar-produto bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm" cd_produto="<?= $produto->cd_produto ?>">
                                    Deletar
                                </button>
                            </footer>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</main>
<?php $this->renderView('modal', 'Admin/produtos') ?>

<?php $this->renderView('footer', 'Admin') ?>
</body>


    