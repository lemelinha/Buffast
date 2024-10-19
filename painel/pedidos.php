<?php require_once "header.php";?>

<?php require_once "side-bar.php";?>

<main class="grid grid-row ml-16 h-screen">
    <header class="text-center main-font text-white font-bold">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#803469"><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 77 666.7 77 833.3 28 1000 28V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 70 666.7 70 833.3 16 1000 16V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 63 666.7 63 833.3 4 1000 4V0H0Z"></path></svg>
     <h1 class="text-4xl font-tittle p-8 md:text-5xl lg:text-6xl lg:p-0">Pedidos</h1>
    </header>
    <div class="grid grid-rows-subgrid row-span-2 h-3/5">
        <div class="cards grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 md:text-sm lg:grid-cols-4 lg:text-base gap-12 lg:gap-12 p-12">
            <div class="bg-card  rounded-lg shadow-2xl p-3 text-white main-font">
                    <header class="card-header text-base md:text-lg lg:text-2xl">
                    <p class="pb-3">Coxinha</p>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoDeR4BcH8f1klSkGe46EDlwMn3AiJrs_vnw&s" class="rounded-lg shadow-2xl">
                    </header>
                    <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p>Quantidade no Pote: 5</p>
                        <p>Descricao do Produto: Coxinha de Frango</p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                        <button class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm">
                            Deletar
                        </button>
                    </footer>
            </div>
            <div class="bg-card  rounded-lg shadow-2xl p-3 text-white main-font">
                    <header class="card-header text-base md:text-lg lg:text-2xl">
                    <p class="pb-3">Bolinha</p>
                    <img src="../assets/queijo.jpg" class="rounded-lg shadow-2xl">
                    </header>
                    <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p>Quantidade no Pote: 5</p>
                        <p>Descricao do Produto: Bolinha de Queijo</p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                        <button class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm">
                            Deletar
                        </button>
                    </footer>
            </div>
            <div class="bg-card  rounded-lg shadow-2xl p-3 text-white main-font">
                    <header class="card-header text-base md:text-lg lg:text-2xl">
                    <p class="pb-3">Pastel</p>
                    <img src="../assets/pastel.jpg" class="rounded-lg shadow-2xl">
                    </header>
                    <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p>Quantidade no Pote: 3</p>
                        <p>Descricao do Produto: Pastel de Frango</p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                        <button class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm">
                            Deletar
                        </button>
                    </footer>
            </div>
            <div class="bg-card  rounded-lg shadow-2xl p-3 text-white main-font">
                    <header class="card-header text-base md:text-lg lg:text-2xl">
                    <p class="pb-3">Pastel</p>
                    <img src="../assets/pastel.jpg" class="rounded-lg shadow-2xl bg-cover">
                    </header>
                    <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p>Quantidade no Pote: 3</p>
                        <p>Descricao do Produto: Pastel de Carne</p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                        <button class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm">
                            Deletar
                        </button>
                    </footer>
            </div>
        </div>
    </div>
</main>

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
    