<?php require_once "header.php";?>

<?php require_once "side-bar.php";?>


<main class="ml-16">
    <header class="text-center main-font text-white font-bold">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#803469"><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 77 666.7 77 833.3 28 1000 28V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 70 666.7 70 833.3 16 1000 16V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 63 666.7 63 833.3 4 1000 4V0H0Z"></path></svg>
     <h1 class="text-3xl font-tittle md:text-4xl lg:text-6xl">Produtos Cadastrados</h1>
    </header>
    <aside class="pt-8 flex justify-end justify-items-center">
        <label class=" font-tittle main-font text-lg ml-4 md:text-2xl lg:text-3xl">Filtro</label>
        <input type="text" class="bg-btn text-white font-bold rounded-full p-2 ml-4 mr-8 w-40 h-8 md:w-52 md:h-8 lg:w-52 lg:h-8 "></input>
    </aside>
    <div class="grid grid-cols-1 md:text-sm lg:text-base gap-12 md:grid-cols-3 md:gap-16 lg:grid-cols-4 p-8 lg:gap-12">
        <div class="bg-card rounded-lg shadow-2xl p-3">
                <header class="card-header text-white font-bold text-base md:text-lg lg:text-xl">
                <p>Coxinha</p>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoDeR4BcH8f1klSkGe46EDlwMn3AiJrs_vnw&s" class="rounded-lg shadow-2xl">
                </header>
                <section class="card-body grid grid-cols-1 text-white font-bold p-2 text-xs md:text-sm lg:text-sm">
                    <p>Quantidade no Pote: 5</p>
                    <p>Descrição do Produto: Coxinha de Frango</p>
                </section>
                <footer class="flex align-end justify-end">
                    <button class="bg-amber-300 font-tittle w-20 rounded-lg p-1 font-bold text-sm mr-2">
                        Alterar
                    </button>
                    <button class="bg-amber-300 font-tittle w-20 rounded-lg p-1 font-bold text-sm">
                        Deletar
                    </button>
                </footer>
        </div>
        <div class="bg-card rounded-lg shadow-2xl p-3">
                <header class="card-header text-white font-bold  text-base md:text-lg lg:text-xl">
                <p>Bolinha</p>
                <img src="../assets/queijo.jpg" class="rounded-lg shadow-2xl">
                </header>
                 <section class="card-body grid grid-cols-1 text-white font-bold p-2 text-xs md:text-sm lg:text-sm">
                    <p>Quantidade no Pote: 5</p>
                    <p>Descrição do Produto: Bolinha de Queijo</p>
                </section>
                <footer class="flex align-end justify-end">
                    <button class="bg-amber-300 font-tittle w-20 rounded-lg p-1 font-bold text-sm mr-2">
                        Alterar
                    </button>
                    <button class="bg-amber-300 font-tittle w-20 rounded-lg p-1 font-bold text-sm">
                        Deletar
                    </button>
                </footer>
        </div>
        <div class="bg-card rounded-lg shadow-2xl p-3">
                <header class="card-header text-white font-bold  text-base md:text-lg lg:text-xl">
                <p>Pastel</p>
                <img src="../assets/pastel.jpg" class="rounded-lg shadow-2xl">
                </header>
                 <section class="card-body grid grid-cols-1 text-white font-bold p-2 text-xs md:text-sm lg:text-sm">
                    <p>Quantidade no Pote: 3</p>
                    <p>Descrição do Produto: Pastel de Frango</p>
                </section>
                <footer class="flex align-end justify-end">
                    <button class="bg-amber-300 font-tittle w-20 rounded-lg p-1 font-bold text-sm mr-2">
                        Alterar
                    </button>
                    <button class="bg-amber-300 font-tittle w-20 rounded-lg p-1 font-bold text-sm">
                        Deletar
                    </button>
                </footer>
        </div>
        <div class="bg-card rounded-lg shadow-2xl p-3">
                <header class="card-header text-white font-bold  text-base md:text-lg lg:text-xl">
                <p>Pastel</p>
                <img src="../assets/pastel.jpg" class="rounded-lg shadow-2xl bg-cover">
                </header>
                 <section class="card-body grid grid-cols-1 text-white font-bold p-2 text-xs md:text-sm lg:text-sm">
                    <p>Quantidade no Pote: 3</p>
                    <p>Descrição do Produto: Pastel de Carne</p>
                </section>
                <footer class="flex align-end justify-end">
                    <button class="bg-amber-300 font-tittle w-20 rounded-lg p-1 font-bold text-sm mr-2">
                        Alterar
                    </button>
                    <button class="bg-amber-300 font-tittle w-20 rounded-lg p-1 font-bold text-sm">
                        Deletar
                    </button>
                </footer>
        </div>
        
    </div>
</main>

<!-- else sem produtos cadastrados
                <div class="flex justify-center justify-items-center h-screen p-8 font-bold lg:pr-24 lg:pl-24 pt-4 lg:min-h-3.5">
        <h1 class="text-3xl main-font font-tittle mt-48 md:text-4xl lg:text-6xl">Sem Produtos Cadastrados!</h1>
    </div>