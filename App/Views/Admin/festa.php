<body>
<main class="grid grid-rows-[2fr_6fr_1fr] ml-16 w-screen">
<header class="ml-4 text-center main-font text-white font-bold h-1/5">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#803469"><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 77 666.7 77 833.3 28 1000 28V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 70 666.7 70 833.3 16 1000 16V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 63 666.7 63 833.3 4 1000 4V0H0Z"></path></svg>
    <div class="grid grid-cols-1 lg:grid lg:grid-cols-[1fr_3fr_1fr]">
        <h1 class="ml-4 font-tittle text-4xl p-2 md:text-5xl lg:col-start-2 lg:text-6xl lg:p-0">Festa</h1>
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

    <div class="flex-1 overflow-auto"> <!-- Changed to flex container -->
        <div class="cards grid grid-cols-1 gap-12 sm:grid-cols-2 sm:gap-12 md:grid-cols-3 md:gap-12 md:text-sm lg:grid-cols-4 lg:text-base lg:gap-12 px-12 py-2">
            <!-- Card component -->
            <?php

use App\Tools\Tools;

                foreach ($festas as $festa) {
                    $data = (new DateTime($festa->inicio))->format('Y-m-d');
                    $hora_inicio = (new DateTime($festa->inicio))->format('H:i');
                    $hora_fim = (new DateTime($festa->fim))->format('H:i');
                    ?>
                        <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font flex flex-col">
                            <header class="card-header text-base md:text-lg lg:text-lg">
                            <p class=""><span class="text-amber-300">Aniversariante:</span><br> <?= $festa->nome_aniversariante ?></p>
                            <div class="flex justify-center items-center">
                                <img
                            class="h-16 sm:h-16"
                                src="/assets/images/cake (1).svg"/>
                            </div>
                            </header>
                            <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-sm">
                                <p><span class="text-amber-300">Data de Nascimento:</span> <span class="font-bold"> <?= date_format(new DateTime($festa->data_aniversario), 'd/m/Y') ?></span></p>
                                <p><span class="text-amber-300">Responsável:</span> <?= $festa->nome_responsavel ?></p>
                                <p><span class="text-amber-300">Inicio Festa:</span> <span class="font-bold"> <?= date_format(new DateTime($festa->inicio), 'd/m/Y H:i') ?></span></p>
                                <p><span class="text-amber-300">Fim Festa:</span> <span class="font-bold"> <?= date_format(new DateTime($festa->fim), 'd/m/Y H:i') ?></span></p>
                                <p><span class="text-amber-300">Quantidade de Convidados:</span> <span class="font-bold"> <?= $festa->convidados ?></span></p>
                            </section>
                            <footer class="flex justify-end mt-auto">
                                <?php
                                    if (Tools::EmFesta($festa->id_buffet) != $festa->cd_festa) { 
                                        ?>
                                            <button data-modal-target="editar" data-modal-toggle="editar" class="editar-festa bg-amber-300 font-tittle w-16 rounded-lg p-2  text-xs mr-2" cd_festa="<?= $festa->cd_festa ?>" id_buffet="<?= $festa->id_buffet ?>" nome_aniversariante="<?= $festa->nome_aniversariante ?>" data_aniversario="<?= $festa->data_aniversario ?>" convidados="<?= $festa->convidados ?>" nome_responsavel="<?= $festa->nome_responsavel ?>" cpf_responsavel="<?= $festa->cpf_responsavel ?>" date-start="<?= $data ?>" time-start="<?= $hora_inicio ?>" time-end="<?= $hora_fim ?>">
                                                Alterar
                                            </button>
                                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="deletar-festa bg-amber-300 font-tittle w-16 rounded-lg p-2  text-xs mr-2" cd_festa="<?= $festa->cd_festa ?>">
                                                Deletar
                                            </button>
                                        <?php
                                    } else {
                                        ?>
                                            Em execucao
                                        <?php
                                    }
                                ?>
                            </footer>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>

    <div class="ml-4 grid grid-rows-subgrid  justify-center justify-items-center h-1/5 p-8 font-bold md: md:p-8 lg: lg:p-4">
        <button data-modal-target="upload" data-modal-toggle="upload" class="cadastrar-festa row-start-3 bg-btn text-4xl h-16 p-2 rounded-full main-font text-amber-300 md:text-5xl lg:text-6xl lg:p-2">+Cadastrar</button>
    </div>
    
</main>
<script>
    let horarios = <?= json_encode($horarios) ?>;
</script>
<?php $this->renderView('modal', 'Admin/festas') ?>
<?php $this->renderView('footer', 'Admin') ?>
</body>


    