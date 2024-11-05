<?php require_once "header.php";?>

<?php require_once "side-bar.php";?>

<?php require_once "./produtos/modal.php";?>

<body>
<main class="grid grid-rows-[4fr_6fr_2fr] ml-16 h-screen">
    <header class="text-center main-font text-white font-bold">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#803469"><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 77 666.7 77 833.3 28 1000 28V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 70 666.7 70 833.3 16 1000 16V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 63 666.7 63 833.3 4 1000 4V0H0Z"></path></svg>
     <h1 class="text-4xl font-tittle p-8 md:text-5xl lg:text-6xl lg:p-0">Produtos Cadastrados</h1>
    </header>
    <div class="grid grid-rows-subgrid row-span-2">
        <div class="cards grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 md:text-sm lg:grid-cols-4 lg:text-base gap-12 lg:gap-12 p-12 xl:grid-cols-4">
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font ">
                    <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                    <p class="pb-3 text-amber-300">Coxinha</p>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoDeR4BcH8f1klSkGe46EDlwMn3AiJrs_vnw&s" class="rounded-lg shadow-2xl w-full h-11/12">
                    </header>
                    <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Quantidade por Pote:</span> <span class="font-bold">  5</span></p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="editar" data-modal-toggle="editar" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm">
                            Deletar
                        </button>
                    </footer>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font ">
                    <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                    <p class="pb-3 text-amber-300">Bolinha</p>
                    <img src="../assets/queijo.jpg" class="rounded-lg shadow-2xl w-full h-11/12">
                    </header>
                    <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Quantidade por Pote:</span> <span class="font-bold"> 5</span></p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="editar" data-modal-toggle="editar" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm">
                            Deletar
                        </button>
                    </footer>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font ">
                    <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                    <p class="pb-3 text-amber-300">Pastel de Queijo</p>
                    <img src="../assets/pastel.jpg" class="rounded-lg shadow-2xl w-full h-11/12">
                    </header>
                    <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Quantidade por Pote:</span> <span class="font-bold">  3</p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="editar" data-modal-toggle="editar" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm">
                            Deletar
                        </button>
                    </footer>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font ">
                    <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                    <p class="pb-3 text-amber-300">Pastel de Carne</p>
                    <img src="../assets/pastel.jpg" class="rounded-lg shadow-2xl w-full h-11/12">
                    </header>
                    <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Quantidade por Pote:</span> <span class="font-bold"> 3</span></p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="editar" data-modal-toggle="editar" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm">
                            Deletar
                        </button>
                    </footer>
            </div>
        </div>
    </div>
    <div class="grid grid-rows-subgrid row-span-3 justify-center justify-items-center p-8 font-bold md: md:p-8 lg: lg:p-8">
        <button data-modal-target="upload" data-modal-toggle="upload" class="row-start-3 bg-btn text-4xl h-16 p-2 rounded-full main-font text-amber-300 md:text-5xl lg:text-6xl lg:p-2">+Cadastrar</button>
    </div>
</main>
<?php require_once "footer.php";?>
</body>


    