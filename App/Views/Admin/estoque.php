<style>
    #prod-img {
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
<body>
<main class="grid grid-rows-[2fr_6fr] ml-16 w-screen">
    <header class="text-center main-font text-white font-bold h-1/5">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#803469"><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 77 666.7 77 833.3 28 1000 28V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 70 666.7 70 833.3 16 1000 16V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 63 666.7 63 833.3 4 1000 4V0H0Z"></path></svg>
    <div class="grid grid-cols-1 lg:grid lg:grid-cols-[1fr_3fr_1fr]">
        <h1 class="ml-4 font-tittle text-4xl p-2 md:text-5xl lg:col-start-2 lg:text-6xl lg:p-0">Estoque</h1>
        <form class="mt-10 w-10/12 sm:col-start-3 sm:w-full mx-auto sm:pr-2">
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
        <div class="p-2">
            <button data-modal-target="mdentrada" data-modal-toggle="mdentrada" class="entrada-produto bg-btn text-base h-16  p-2 ml-10 rounded-xl main-font text-amber-300 md:text-lg lg:text-xl lg:p-2">+Entrada</button> 
            <button data-modal-target="mdsaida" data-modal-toggle="mdsaida" class="saida-produto bg-btn text-base h-16 w-20 p-2 rounded-xl main-font text-amber-300 md:text-lg lg:text-xl lg:p-2">-Saida</button>
        </div>
        <div class="cards scroll-container h-auto grid grid-cols-1 gap-12 sm:grid-cols-2 sm:gap-12 md:grid-cols-3 md:gap-12 md:text-sm xl:grid-cols-4 xl:text-base xl:gap-12 px-12 py-2">
                <?php
                    foreach ($produtos as $produto): ?>
                        <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font flex flex-col">
                                <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                                <p class="pb-3"><?= $produto->nome_produto ?></p>
                                <div class="rounded-lg shadow-2xl h-32 w-full sm:h-10  md:h-28  lg:h-32 xl:h-40" id="prod-img" style="background-image: url('<?= $produto->url_imagem ?>');"></div>
                                </header>
                                <section class="card-body grid justify-items-center text-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                                    <p><span class="text-amber-300">Quantidade Estoque:</span> <span class="font-bold" id="<?= $produto->cd_produto ?>"> <?= $produto->quantidade_estoque ?></span></p>
                                </section>
                                <footer class="flex justify-end mt-auto">
                                </footer>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
</main>
<?php $this->renderView('modal', 'Admin/estoque', ['produtos' => $produtos]) ?>

<?php $this->renderView('footer', 'Admin') ?>
</body>
<script>
     document.getElementById("search").addEventListener("input", function () {
    const searchTerm = this.value.toLowerCase(); // Texto digitado no campo de busca
    const cards = document.querySelectorAll(".cards > div"); // Seleciona todos os cards

    cards.forEach(card => {
        const cardText = card.querySelector(".card-header p").textContent.toLowerCase(); // Conteúdo do nome do produto
        if (cardText.includes(searchTerm)) {
            card.style.display = "block"; // Mostra o card
        } else {
            card.style.display = "none"; // Esconde o card
        }
    });
});

</script>
<!-- <div class="grid h-screen p-8 grid-cols-1 lg:pr-24 lg:pl-24 pt-4 lg:min-h-3.5">
        <div class="bg-card-cad rounded-lg shadow-2xl p-4">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoDeR4BcH8f1klSkGe46EDlwMn3AiJrs_vnw&s" class="rounded-lg shadow-2xl">
                <section class="grid grid-cols-1 text-white font-bold p-2 text-xs md:text-sm lg:text-sm">
                    <a href=".">Nome do Produto: Coxinha</a>
                    <a href=".">Quantidade no Pote: 5</a>
                    <a href=".">Descrição do Produto: Coxinha de Frango</a>
                </section>
        </div>
    </div>
    