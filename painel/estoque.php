<?php require_once "header.php";?>

<?php require_once "side-bar.php";?>

<?php require_once "./estoque/modal.php";?>


<body>
<main class="grid grid-rows-[1fr_1fr_1fr] ml-16 h-screen">
    <header class="text-center main-font text-white font-bold h-1/5">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#803469"><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 77 666.7 77 833.3 28 1000 28V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 70 666.7 70 833.3 16 1000 16V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 63 666.7 63 833.3 4 1000 4V0H0Z"></path></svg>
     <h1 class="text-4xl font-tittle p-8 md:text-5xl lg:text-6xl lg:p-0">Estoque</h1>
    </header>
    <div class="cards scroll-container h-96 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 md:text-sm lg:grid-cols-4 lg:text-base gap-12 lg:gap-12 px-12 py-2 xl:grid-cols-4">
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font max-h-96 max-w-96">
                    <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                    <p class="pb-3">Coxinha</p>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoDeR4BcH8f1klSkGe46EDlwMn3AiJrs_vnw&s" class="rounded-lg shadow-2xl">
                    </header>
                    <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Quantidade Estoque:</span> <span class="font-bold"> 500</span></p>
                        <p><span class="text-amber-300">Quantidade minima Estoque:</span> <span class="font-bold"> 200</span></p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="upload" data-modal-toggle="upload" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                    </footer>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font max-h-96 max-w-96">
                    <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                    <p class="pb-3">Bolinha</p>
                    <img src="../assets/queijo.jpg" class="rounded-lg shadow-2xl">
                    </header>
                    <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Quantidade Estoque:</span> <span class="font-bold"> 500</span></p>
                        <p><span class="text-amber-300">Quantidade minima Estoque:</span> <span class="font-bold"> 200</span></p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="upload" data-modal-toggle="upload" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                    </footer>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font max-h-96 max-w-96">
                    <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                    <p class="pb-3">Pastel de Queijo</p>
                    <img src="../assets/pastel.jpg" class="rounded-lg shadow-2xl">
                    </header>
                    <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Quantidade Estoque:</span> <span class="font-bold"> 500</span></p>
                       <p><p><span class="text-amber-300">Quantidade minima Estoque:</span> <span class="font-bold"> 200</span></p></p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="upload" data-modal-toggle="upload" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar 
                        </button>
                    </footer>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font max-h-96 max-w-96">
                    <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                    <p class="pb-3">Pastel de Carne</p>
                    <img src="../assets/pastel.jpg" class="rounded-lg shadow-2xl bg-cover">
                    </header>
                    <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Quantidade Estoque:</span> <span class="font-bold"> 500</span></p>
                        <p><span class="text-amber-300">Quantidade minima Estoque:</span> <span class="font-bold"> 200</span></p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="edit" data-modal-toggle="edit" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                    </footer>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font max-h-96 max-w-96">
                    <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                    <p class="pb-3">Coxinha</p>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoDeR4BcH8f1klSkGe46EDlwMn3AiJrs_vnw&s" class="rounded-lg shadow-2xl">
                    </header>
                    <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Quantidade Estoque:</span> <span class="font-bold"> 500</span></p>
                        <p><span class="text-amber-300">Quantidade minima Estoque:</span> <span class="font-bold"> 200</span></p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="upload" data-modal-toggle="upload" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                    </footer>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font max-h-96 max-w-96">
                    <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                    <p class="pb-3">Bolinha</p>
                    <img src="../assets/queijo.jpg" class="rounded-lg shadow-2xl">
                    </header>
                    <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Quantidade Estoque:</span> <span class="font-bold"> 500</span></p>
                        <p><span class="text-amber-300">Quantidade minima Estoque:</span> <span class="font-bold"> 200</span></p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="upload" data-modal-toggle="upload" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                    </footer>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font max-h-96 max-w-96">
                    <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                    <p class="pb-3">Pastel de Queijo</p>
                    <img src="../assets/pastel.jpg" class="rounded-lg shadow-2xl">
                    </header>
                    <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Quantidade Estoque:</span> <span class="font-bold"> 500</span></p>
                       <p><p><span class="text-amber-300">Quantidade minima Estoque:</span> <span class="font-bold"> 200</span></p></p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="upload" data-modal-toggle="upload" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar 
                        </button>
                    </footer>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font max-h-96 max-w-96">
                    <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                    <p class="pb-3">Pastel de Carne</p>
                    <img src="../assets/pastel.jpg" class="rounded-lg shadow-2xl bg-cover">
                    </header>
                    <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Quantidade Estoque:</span> <span class="font-bold"> 500</span></p>
                        <p><span class="text-amber-300">Quantidade minima Estoque:</span> <span class="font-bold"> 200</span></p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="edit" data-modal-toggle="edit" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                    </footer>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font max-h-96 max-w-96">
                    <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                    <p class="pb-3">Coxinha</p>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoDeR4BcH8f1klSkGe46EDlwMn3AiJrs_vnw&s" class="rounded-lg shadow-2xl">
                    </header>
                    <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Quantidade Estoque:</span> <span class="font-bold"> 500</span></p>
                        <p><span class="text-amber-300">Quantidade minima Estoque:</span> <span class="font-bold"> 200</span></p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="upload" data-modal-toggle="upload" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                    </footer>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font max-h-96 max-w-96">
                    <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                    <p class="pb-3">Bolinha</p>
                    <img src="../assets/queijo.jpg" class="rounded-lg shadow-2xl">
                    </header>
                    <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Quantidade Estoque:</span> <span class="font-bold"> 500</span></p>
                        <p><span class="text-amber-300">Quantidade minima Estoque:</span> <span class="font-bold"> 200</span></p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="upload" data-modal-toggle="upload" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                    </footer>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font max-h-96 max-w-96">
                    <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                    <p class="pb-3">Pastel de Queijo</p>
                    <img src="../assets/pastel.jpg" class="rounded-lg shadow-2xl">
                    </header>
                    <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Quantidade Estoque:</span> <span class="font-bold"> 500</span></p>
                       <p><p><span class="text-amber-300">Quantidade minima Estoque:</span> <span class="font-bold"> 200</span></p></p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="upload" data-modal-toggle="upload" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar 
                        </button>
                    </footer>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font max-h-96 max-w-96">
                    <header class="card-header grid justify-items-center text-base md:text-lg lg:text-2xl">
                    <p class="pb-3">Pastel de Carne</p>
                    <img src="../assets/pastel.jpg" class="rounded-lg shadow-2xl bg-cover">
                    </header>
                    <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Quantidade Estoque:</span> <span class="font-bold"> 500</span></p>
                        <p><span class="text-amber-300">Quantidade minima Estoque:</span> <span class="font-bold"> 200</span></p>
                    </section>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="edit" data-modal-toggle="edit" class="bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                            Alterar
                        </button>
                    </footer>
            </div>
        </div>
</main>
<?php require_once "footer.php";?>
</body>

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
    