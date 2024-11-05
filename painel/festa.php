<?php require_once "header.php";?>

<?php require_once "side-bar.php";?>

<?php require_once "./festas/modal.php";?>

<body>
<main class="grid grid-rows-[4fr_6fr_1fr] ml-16 h-screen">

    <header class="text-center main-font text-white font-bold h-1/5">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#803469"><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 77 666.7 77 833.3 28 1000 28V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 70 666.7 70 833.3 16 1000 16V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 63 666.7 63 833.3 4 1000 4V0H0Z"></path></svg>
     <h1 class="text-4xl font-tittle p-8 md:text-5xl lg:text-6xl lg:p-0">Festas</h1>
    </header>

    <div class="grid grid-rows-subgrid row-span-2 h-3/5">
        <div class="cards grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 md:text-sm lg:grid-cols-3 lg:text-base gap-12 lg:gap-12 p-12">
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font">
                    <header class="card-header text-base md:text-lg lg:text-2xl">
                    <p class="pb-3"><span class="text-amber-300">Aniversariante:</span> Lucas</p>
                    <div class="flex justify-center items-center">
                        <img
                        class="h-36"
                        src="../assets/cake (1).svg"/>
                    </div>
                    </header>
                    <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Data de Nascimento:</span> <span class="font-bold"> 23/08/2009</span></p>
                        <p><span class="text-amber-300">Responsável:</span> Isaac</p>
                        <p><span class="text-amber-300">Inicio Festa: </span><span class="font-bold"> 30/11/2024 19:00</span></p>
                        <p><span class="text-amber-300">Fim Festa: </span><span class="font-bold"> 30/11/2024 23:00</span></p>
                        <p><span class="text-amber-300">Quantidade de Convidados:</span> <span class="font-bold"> 50</span></p>
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
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font">
                    <header class="card-header text-base md:text-lg lg:text-2xl">
                    <p class="pb-3"><span class="text-amber-300">Aniversariante:</span> Matheus</p>
                    <div class="flex justify-center items-center">
                        <img
                        class="h-36"
                        src="../assets/cake (1).svg"/>
                    </div>
                    </header>
                    <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Data de Nascimento:</span> <span class="font-bold"> 10/01/2010</span></p>
                        <p><span class="text-amber-300">Responsável:</span> Joao</p>
                        <p><span class="text-amber-300">Inicio Festa:</span> <span class="font-bold"> 03/12/2024 19:00</span></p>
                        <p><span class="text-amber-300">Fim Festa:</span> <span class="font-bold"> 03/12/2024 23:00</span></p>
                        <p><span class="text-amber-300">Quantidade de Convidados:</span> <span class="font-bold"> 45</span></p>
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
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font">
                    <header class="card-header text-base md:text-lg lg:text-2xl">
                    <p class="pb-3"><span class="text-amber-300">Aniversariante:</span> Luísa</p>
                    <div class="flex justify-center items-center">
                        <img
                        class="h-36"
                        src="../assets/cake (1).svg"/>
                    </div>
                    </header>
                    <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Data de Nascimento:</span> <span class="font-bold"> 12/04/2011</span></p>
                        <p><span class="text-amber-300">Responsável:</span> Pedro</p>
                        <p><span class="text-amber-300">Inicio Festa:</span> <span class="font-bold"> 05/12/2024 19:00</span></p>
                        <p><span class="text-amber-300">Fim Festa:</span> <span class="font-bold"> 03/12/2024 23:00</span></p>
                        <p><span class="text-amber-300">Quantidade de Convidados: </span><span class="font-bold"> 30</span></p>
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
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font">
                    <header class="card-header text-base md:text-lg lg:text-2xl">
                    <p class="pb-3"><span class="text-amber-300">Aniversariante: </span>Maria</p>
                    <div class="flex justify-center items-center">
                        <img
                        class="h-36"
                        src="../assets/cake (1).svg"/>
                    </div>
                    </header>
                    <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-lg">
                        <p><span class="text-amber-300">Data de Nascimento:</span> <span class="font-bold"> 23/08/2009</span></p>
                        <p><span class="text-amber-300">Responsável:</span> Marcos</p>
                        <p><span class="text-amber-300">Inicio Festa: </span><span class="font-bold"> 07/12/2024 19:00</span></p>
                        <p><span class="text-amber-300">Fim Festa:</span> <span class="font-bold"> 07/12/2024 23:00</span></p>
                        <p><span class="text-amber-300">Quantidade de Convidados:</span> <span class="font-bold"> 40</span></p>
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

    <div class="grid grid-rows-subgrid row-span-3 justify-center justify-items-center h-1/5 p-8 font-bold md: md:p-8 lg: lg:p-8">
        <button data-modal-target="upload" data-modal-toggle="upload"class="row-start-3 bg-btn text-4xl h-16 p-2 rounded-full main-font text-amber-300 md:text-5xl lg:text-6xl lg:p-2">+Cadastrar</button>
    </div>
    
</main>
<?php require_once "footer.php";?>
</body>


    