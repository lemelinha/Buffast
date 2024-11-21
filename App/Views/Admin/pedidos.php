<body>
<main class="grid grid-rows-[2fr_6fr_1fr] ml-16 w-screen">
    <header class="text-center main-font text-white font-bold">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#803469"><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 77 666.7 77 833.3 28 1000 28V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 70 666.7 70 833.3 16 1000 16V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 63 666.7 63 833.3 4 1000 4V0H0Z"></path></svg>
    <div class="grid grid-cols-1 lg:grid lg:grid-cols-[1fr_3fr_1fr]">
        <h1 class="ml-4 font-tittle text-4xl p-2 md:text-5xl lg:col-start-2 lg:text-6xl lg:p-0">Pedidos</h1>
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
    <div class="grid grid-rows-subgrid row-span-2">
    <div class="cards scroll-container h-full grid grid-cols-1 gap-12 sm:grid-cols-2 sm:gap-12 md:grid-cols-3 md:gap-12 md:text-sm lg:grid-cols-4 lg:text-base lg:gap-12 lg:gap-y-56 px-12 py-2">
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font w-card h-card">
                    <header class="card-header text-base md:text-lg lg:text-lg">
                    <p class="pb-3"><span class="text-amber-300">Festa de:</span> Lucas</p>
                    <div class="flex justify-center items-center">
                        <img
                        class="h-16 sm:h-36"
                        src="/assets/images/snack.svg"/>
                    </div>
                    </header>
                    <div class="flex align-end justify-end">
                        <button class="p-1 bg-red-600 text-xs rounded-md">
                            <p>Pendente</p>
                        </button>            
                    </div>
                    <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-sm">
                        <p><span class="text-amber-300">Mesa:</span> <span class="font-bold">10</span></p>
                        <p><span class="text-amber-300">Horario do pedido</span> : <span class="font-bold">19:23</span></p>
                        <p><span class="text-amber-300">Salgados:</span> Coxinha, Bolinha de Queijo e Pastel</p>
                    </section>
                    <div class="flex align-center justify-center">
                        <button class="p-1 bg-amber-300 text-sm rounded-md">
                            <p>Concluir</p>
                        </button>            
                    </div>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font w-card h-card">
                    <header class="card-header text-base md:text-lg lg:text-lg">
                    <p class="pb-3"><span class="text-amber-300">Festa de:</span> Lucas</p>
                    <div class="flex justify-center items-center">
                        <img
                        class="h-16 sm:h-36"
                        src="/assets/images/snack.svg"/>
                    </div>
                    </header>
                    <div class="flex align-end justify-end">
                        <button class="p-1 bg-red-600 text-xs rounded-md">
                            <p>Pendente</p>
                        </button>            
                    </div>
                    <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-sm">
                        <p><span class="text-amber-300">Mesa:</span><span class="font-bold"> 1</span></p>
                        <p><span class="text-amber-300">Horario do pedido :</span><span class="font-bold"> 19:40</span></p>
                        <p><span class="text-amber-300">Salgados:</span> Coxinha, Bolinha de Queijo e Pastel</p>
                    </section>
                    <div class="flex align-center justify-center">
                        <button class="p-1 bg-amber-300 text-sm rounded-md">
                            <p>Concluir</p>
                        </button>            
                    </div>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font w-card h-card">
                    <header class="card-header text-base md:text-lg lg:text-lg">
                    <p class="pb-3"><span class="text-amber-300">Festa de:</span> Lucas</p>
                    <div class="flex justify-center items-center">
                        <img
                        class="h-16 sm:h-36"
                        src="/assets/images/snack.svg"/>
                    </div>
                    </header>
                    <div class="flex align-end justify-end">
                        <button class="p-1 bg-green-600 text-xs rounded-md">
                            <p>Entregue</p>
                        </button>            
                    </div>
                    <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-sm">
                        <p><span class="text-amber-300">Mesa: </span><span class="font-bold">7</span></p>
                        <p><span class="text-amber-300">Horario do pedido :</span><span class="font-bold"> 19:12</span></p>
                        <p><span class="text-amber-300">Salgados:</span> Coxinha, Bolinha de Queijo e Pastel</p>
                    </section>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font w-card h-card">
                    <header class="card-header text-base md:text-lg lg:text-lg">
                    <p class="pb-3"><span class="text-amber-300">Festa de: </span>Lucas</p>
                    <div class="flex justify-center items-center">
                        <img
                        class="h-16 sm:h-36"
                        src="/assets/images/snack.svg"/>
                    </div>
                    </header>
                    <div class="flex align-end justify-end">
                        <button class="p-1 bg-green-600 text-xs rounded-md">
                            <p>Entregue</p>
                        </button>            
                    </div>
                    <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-sm">
                        <p><span class="text-amber-300">Mesa:</span><span class="font-bold"> 5</span></p>
                        <p><span class="text-amber-300">Horario do pedido :</span><span class="font-bold"> 19:10</span></p>
                        <p><span class="text-amber-300">Salgados:</span> Coxinha, Bolinha de Queijo e Pastel</p>
                    </section>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font w-card h-card">
                    <header class="card-header text-base md:text-lg lg:text-lg">
                    <p class="pb-3"><span class="text-amber-300">Festa de:</span> Lucas</p>
                    <div class="flex justify-center items-center">
                        <img
                        class="h-16 sm:h-36"
                        src="/assets/images/snack.svg"/>
                    </div>
                    </header>
                    <div class="flex align-end justify-end">
                        <button class="p-1 bg-red-600 text-xs rounded-md">
                            <p>Pendente</p>
                        </button>            
                    </div>
                    <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-sm">
                        <p><span class="text-amber-300">Mesa:</span> <span class="font-bold">10</span></p>
                        <p><span class="text-amber-300">Horario do pedido</span> : <span class="font-bold">19:23</span></p>
                        <p><span class="text-amber-300">Salgados:</span> Coxinha, Bolinha de Queijo e Pastel</p>
                    </section>
                    <div class="flex align-center justify-center">
                        <button class="p-1 bg-amber-300 text-sm rounded-md">
                            <p>Concluir</p>
                        </button>            
                    </div>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font w-card h-card">
                    <header class="card-header text-base md:text-lg lg:text-lg">
                    <p class="pb-3"><span class="text-amber-300">Festa de:</span> Lucas</p>
                    <div class="flex justify-center items-center">
                        <img
                        class="h-16 sm:h-36"
                        src="/assets/images/snack.svg"/>
                    </div>
                    </header>
                    <div class="flex align-end justify-end">
                        <button class="p-1 bg-red-600 text-xs rounded-md">
                            <p>Pendente</p>
                        </button>            
                    </div>
                    <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-sm">
                        <p><span class="text-amber-300">Mesa:</span><span class="font-bold"> 1</span></p>
                        <p><span class="text-amber-300">Horario do pedido :</span><span class="font-bold"> 19:40</span></p>
                        <p><span class="text-amber-300">Salgados:</span> Coxinha, Bolinha de Queijo e Pastel</p>
                    </section>
                    <div class="flex align-center justify-center">
                        <button class="p-1 bg-amber-300 text-sm rounded-md">
                            <p>Concluir</p>
                        </button>            
                    </div>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font w-card h-card">
                    <header class="card-header text-base md:text-lg lg:text-lg">
                    <p class="pb-3"><span class="text-amber-300">Festa de:</span> Lucas</p>
                    <div class="flex justify-center items-center">
                        <img
                        class="h-16 sm:h-36"
                        src="/assets/images/snack.svg"/>
                    </div>
                    </header>
                    <div class="flex align-end justify-end">
                        <button class="p-1 bg-green-600 text-xs rounded-md">
                            <p>Entregue</p>
                        </button>            
                    </div>
                    <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-sm">
                        <p><span class="text-amber-300">Mesa: </span><span class="font-bold">7</span></p>
                        <p><span class="text-amber-300">Horario do pedido :</span><span class="font-bold"> 19:12</span></p>
                        <p><span class="text-amber-300">Salgados:</span> Coxinha, Bolinha de Queijo e Pastel</p>
                    </section>
            </div>
            <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font w-card h-card">
                    <header class="card-header text-base md:text-lg lg:text-lg">
                    <p class="pb-3"><span class="text-amber-300">Festa de: </span>Lucas</p>
                    <div class="flex justify-center items-center">
                        <img
                        class="h-16 sm:h-36"
                        src="/assets/images/snack.svg"/>
                    </div>
                    </header>
                    <div class="flex align-end justify-end">
                        <button class="p-1 bg-green-600 text-xs rounded-md">
                            <p>Entregue</p>
                        </button>            
                    </div>
                    <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-sm">
                        <p><span class="text-amber-300">Mesa:</span><span class="font-bold"> 5</span></p>
                        <p><span class="text-amber-300">Horario do pedido :</span><span class="font-bold"> 19:10</span></p>
                        <p><span class="text-amber-300">Salgados:</span> Coxinha, Bolinha de Queijo e Pastel</p>
                    </section>
            </div>
        </div>
    </div>
    <div class="grid grid-rows-subgrid row-span-2 h-3/5">
    </div>
</main>
<?php $this->renderView('footer', 'Admin') ?>
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
    