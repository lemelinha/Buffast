<body>
<main class="grid grid-rows-[4fr_6fr_1fr] ml-16 w-screen">

    <header class="ml-4 text-center main-font text-white font-bold h-1/5">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#803469"><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 77 666.7 77 833.3 28 1000 28V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 70 666.7 70 833.3 16 1000 16V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 63 666.7 63 833.3 4 1000 4V0H0Z"></path></svg>
    <div class="grid grid-cols-1 lg:grid lg:grid-cols-[1fr_3fr_1fr]">
        <h1 class="ml-4 font-tittle text-4xl p-2 md:text-5xl lg:col-start-2 lg:text-6xl lg:p-0">Mesas</h1>
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

    <div class="grid grid-rows-subgrid row-span-2">
    <div class="cards scroll-container h-87 grid grid-cols-1 sm:m-0 sm:grid-cols-2 md:grid-cols-2 md:text-sm lg:grid-cols-3 lg:text-base gap-12 lg:gap-12 px-12 py-2 xl:grid-cols-4">
            <div class="bg-card h-5/6 sm:h-full rounded-lg shadow-2xl p-3 text-white main-font">
                    <header class="card-header text-base md:text-lg lg:text-2xl">
                    <p class="pb-3"><span class="text-amber-300">Mesa:</span><span class="font-bold">1</span></p>
                    <div class="flex justify-center items-center">
                        <img
                       class="h-12 sm:h-16"
                        src="/assets/images/table.svg"/>
                    </div>
                    </header>
                    <div class="flex flex-col items-start">
                    <label>QR-Code</label>
                        <img
                        class="h-16 sm:h-24 mb-5 mx-auto"
                        src="/assets/images/qr_code.png"/>
                    </div>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="editar" data-modal-toggle="editar" class="bg-amber-300 font-tittle w-16 rounded-lg p-2  text-xs mr-2">
                            Alterar
                        </button>
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="bg-amber-300 font-tittle w-16 rounded-lg p-2  text-xs mr-2">
                            Deletar
                        </button>
                    </footer>
            </div>
            <div class="bg-card h-5/6 sm:h-full rounded-lg shadow-2xl p-3 text-white main-font">
                    <header class="card-header text-base md:text-lg lg:text-2xl">
                    <p class="pb-3"><span class="text-amber-300">Mesa:</span><span class="font-bold">2</span></p>
                    <div class="flex justify-center items-center">
                        <img
                       class="h-12 sm:h-16"
                        src="/assets/images/table.svg"/>
                    </div>
                    </header>
                    <div class="flex flex-col items-start">
                    <label>QR-Code</label>
                        <img
                        class="h-16 sm:h-24 mb-5 mx-auto"
                        src="/assets/images/qr_code.png"/>
                    </div>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="editar" data-modal-toggle="editar" class="bg-amber-300 font-tittle w-16 rounded-lg p-2  text-xs mr-2">
                            Alterar
                        </button>
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="bg-amber-300 font-tittle w-16 rounded-lg p-2  text-xs mr-2">
                            Deletar
                        </button>
                    </footer>
            </div>
            <div class="bg-card h-5/6 sm:h-full rounded-lg shadow-2xl p-3 text-white main-font">
                    <header class="card-header text-base md:text-lg lg:text-2xl">
                    <p class="pb-3"><span class="text-amber-300">Mesa:</span><span class="font-bold">3</span></p>
                    <div class="flex justify-center items-center">
                        <img
                       class="h-12 sm:h-16"
                        src="/assets/images/table.svg"/>
                    </div>
                    </header>
                    <div class="flex flex-col items-start">
                    <label>QR-Code</label>
                        <img
                        class="h-16 sm:h-24 mb-5 mx-auto"
                        src="/assets/images/qr_code.png"/>
                    </div>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="editar" data-modal-toggle="editar" class="bg-amber-300 font-tittle w-16 rounded-lg p-2  text-xs mr-2">
                            Alterar
                        </button>
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="bg-amber-300 font-tittle w-16 rounded-lg p-2  text-xs mr-2">
                            Deletar
                        </button>
                    </footer>
            </div>
            <div class="bg-card h-5/6 sm:h-full rounded-lg shadow-2xl p-3 text-white main-font">
                    <header class="card-header text-base md:text-lg lg:text-2xl">
                    <p class="pb-3"><span class="text-amber-300">Mesa:</span><span class="font-bold">4</span></p>
                    <div class="flex justify-center items-center">
                        <img
                       class="h-12 sm:h-16"
                        src="/assets/images/table.svg"/>
                    </div>
                    </header>
                    <div class="flex flex-col items-start">
                    <label>QR-Code</label>
                        <img
                        class="h-16 sm:h-24 mb-5 mx-auto"
                        src="/assets/images/qr_code.png"/>
                    </div>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="editar" data-modal-toggle="editar" class="bg-amber-300 font-tittle w-16 rounded-lg p-2  text-xs mr-2">
                            Alterar
                        </button>
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="bg-amber-300 font-tittle w-16 rounded-lg p-2  text-xs mr-2">
                            Deletar
                        </button>
                    </footer>
            </div>
            <div class="bg-card h-5/6 sm:h-full rounded-lg shadow-2xl p-3 text-white main-font">
                    <header class="card-header text-base md:text-lg lg:text-2xl">
                    <p class="pb-3"><span class="text-amber-300">Mesa:</span><span class="font-bold">5</span></p>
                    <div class="flex justify-center items-center">
                        <img
                       class="h-12 sm:h-16"
                        src="/assets/images/table.svg"/>
                    </div>
                    </header>
                    <div class="flex flex-col items-start">
                    <label>QR-Code</label>
                        <img
                        class="h-16 sm:h-24 mb-5 mx-auto"
                        src="/assets/images/qr_code.png"/>
                    </div>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="editar" data-modal-toggle="editar" class="bg-amber-300 font-tittle w-16 rounded-lg p-2  text-xs mr-2">
                            Alterar
                        </button>
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="bg-amber-300 font-tittle w-16 rounded-lg p-2  text-xs mr-2">
                            Deletar
                        </button>
                    </footer>
            </div>
            <div class="bg-card h-5/6 sm:h-full rounded-lg shadow-2xl p-3 text-white main-font">
                    <header class="card-header text-base md:text-lg lg:text-2xl">
                    <p class="pb-3"><span class="text-amber-300">Mesa:</span><span class="font-bold">6</span></p>
                    <div class="flex justify-center items-center">
                        <img
                       class="h-12 sm:h-16"
                        src="/assets/images/table.svg"/>
                    </div>
                    </header>
                    <div class="flex flex-col items-start">
                    <label>QR-Code</label>
                        <img
                        class="h-16 sm:h-24 mb-5 mx-auto"
                        src="/assets/images/qr_code.png"/>
                    </div>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="editar" data-modal-toggle="editar" class="bg-amber-300 font-tittle w-16 rounded-lg p-2  text-xs mr-2">
                            Alterar
                        </button>
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="bg-amber-300 font-tittle w-16 rounded-lg p-2  text-xs mr-2">
                            Deletar
                        </button>
                    </footer>
            </div>
            <div class="bg-card h-5/6 sm:h-full rounded-lg shadow-2xl p-3 text-white main-font">
                    <header class="card-header text-base md:text-lg lg:text-2xl">
                    <p class="pb-3"><span class="text-amber-300">Mesa:</span><span class="font-bold">7</span></p>
                    <div class="flex justify-center items-center">
                        <img
                       class="h-12 sm:h-16"
                        src="/assets/images/table.svg"/>
                    </div>
                    </header>
                    <div class="flex flex-col items-start">
                    <label>QR-Code</label>
                        <img
                        class="h-16 sm:h-24 mb-5 mx-auto"
                        src="/assets/images/qr_code.png"/>
                    </div>
                    <footer class="flex align-end justify-end">
                        <button data-modal-target="editar" data-modal-toggle="editar" class="bg-amber-300 font-tittle w-16 rounded-lg p-2  text-xs mr-2">
                            Alterar
                        </button>
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="bg-amber-300 font-tittle w-16 rounded-lg p-2  text-xs mr-2">
                            Deletar
                        </button>
                    </footer>
            </div>
        </div>
    </div>

    <div class="ml-4 grid grid-rows-subgrid row-span-3 justify-center justify-items-center h-1/5 p-8 font-bold md: md:p-8 lg: lg:p-2">
        <button data-modal-target="upload" data-modal-toggle="upload"class="row-start-3 bg-btn text-4xl h-16 p-2 rounded-full main-font text-amber-300 md:text-5xl lg:text-6xl lg:p-2">+Adicionar</button>
    </div>
   
</main>
<?php $this->renderView('footer', 'Admin') ?>
</body>


    