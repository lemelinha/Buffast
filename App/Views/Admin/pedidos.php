<body>
<main class="grid grid-rows-[2fr_6fr] ml-16 w-screen">
    <header class="text-center main-font text-white font-bold">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#803469"><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 77 666.7 77 833.3 28 1000 28V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 70 666.7 70 833.3 16 1000 16V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 63 666.7 63 833.3 4 1000 4V0H0Z"></path></svg>
    <div class="grid grid-cols-1 lg:grid lg:grid-cols-[1fr_3fr_1fr]">
        <h1 class="ml-4 font-tittle text-4xl p-2 md:text-5xl lg:col-start-2 lg:text-6xl lg:p-0">Pedidos</h1>
        </div>
    </header>
    <div class="flex-1 overflow-auto">
        <div class="cards scroll-container h-auto grid grid-cols-1 gap-12 sm:grid-cols-2 sm:gap-12 md:grid-cols-3 md:gap-12 md:text-sm xl:grid-cols-6 xl:text-base xl:gap-12 px-12 py-2">
                <?php
                    foreach ($pedidos as $pedido): ?>
                        <div id="<?= $pedido->cd_pedido ?>" class="card-pedido bg-card rounded-lg shadow-2xl p-3 text-white main-font flex flex-col">
                                <header class="card-header text-base md:text-lg lg:text-lg">
                                <p class="pb-3"><span class="text-amber-300">Festa de:</span> <?= $pedido->nome_aniversariante ?> </p>
                                <div class="flex justify-center items-center">
                                    <img
                                    class="h-12"
                                    src="/assets/images/snack.svg"/>
                                </div>
                                </header>
                                <div class="flex align-end justify-end">
                                    <button class="p-1 bg-<?= $pedido->status_pedido=='P'?'red':'green' ?>-600 text-xs rounded-md">
                                        <p><?= $pedido->status_pedido=='P'?'Pendente':'Entregue' ?></p>
                                    </button>            
                                </div>
                                <section class="card-body grid grid-cols-1 p-2 text-xs md:text-sm lg:text-sm">
                                    <p><span class="text-amber-300">Mesa:</span> <span class="font-bold"><?= $pedido->numero_mesa ?></span></p>
                                    <p><span class="text-amber-300">Horario do pedido</span> : <span class="font-bold"><?= date_create($pedido->data_pedido)->format('H:i') ?></span></p>
                                    <p><span class="text-amber-300">Salgados:</span> <?php
                                        $first = true;
                                        $virgula = false;
                                        foreach ($pedido->itens as $item) {
                                            if ($virgula) {
                                                echo ", ";
                                            }
                                            if ($first) {
                                                $first = false;
                                                $virgula = true;
                                            }
                                            echo "{$item['quantidade']}x {$item['nome_produto']}";
                                        }
                                    ?></p>
                                </section>
                                <div class="flex align-center justify-center">
                                    <button class="concluir-pedido p-1 bg-amber-300 text-sm rounded-md font-tittle mr-5" cd_pedido="<?= $pedido->cd_pedido ?>">
                                        <p>Concluir</p>
                                    </button>            
                                    <button class="cancelar-pedido p-1 bg-amber-300 text-sm rounded-md font-tittle" cd_pedido="<?= $pedido->cd_pedido ?>">
                                        <p>Cancelar</p>
                                    </button>            
                                </div>
                        </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</main>
<script>
    $('button.cancelar-pedido').click(function () {
        let cd_pedido = $(this).attr('cd_pedido')
        console.log(`/painel/pedidos/cancelar/${cd_pedido}`)

        $.ajax({
            'url': `/painel/pedidos/cancelar/${cd_pedido}`,
            'type': 'POST',
            'dataType': 'text'
        })
        .done(function (data) {
            $(`.card-pedido#${cd_pedido}`).remove()
        })
        .catch(function (a) {
            console.log(a)
        })
    })

    $('button.concluir-pedido').click(function () {
        let cd_pedido = $(this).attr('cd_pedido')

        $.ajax({
            'url': `/painel/pedidos/concluir/${cd_pedido}`,
            'type': 'POST',
            'dataType': 'text'
        })
        .done(function (data) {
            $(`.card-pedido#${cd_pedido}`).remove()
        })
        .catch(function (a) {
            console.log(a)
        })
    })
</script>

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
    