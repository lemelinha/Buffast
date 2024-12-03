<style>
    #prod-img {
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
    }
</style>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#803469">
    <title>Buffast</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="/assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <link rel="icon" type="image/png" href="/assets/images/Logo-Buffast2.png" class="h-8 w-8">
</head>
<body>
<main class="grid grid-rows-[2fr_6fr] w-screen painel">
    <header class="text-center main-font text-white font-bold">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#803469"><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 77 666.7 77 833.3 28 1000 28V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 70 666.7 70 833.3 16 1000 16V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 63 666.7 63 833.3 4 1000 4V0H0Z"></path></svg>
    <div class="grid grid-cols-1 lg:grid lg:grid-cols-[1fr_3fr_1fr]">
    
        <h1 class="ml-4 font-tittle text-4xl p-2 md:text-5xl lg:col-start-2 lg:text-6xl lg:p-0">Cardapio Mesa <?= $numero_mesa ?></h1>
        <div class="sm:col-start-3 p-2">
            <button data-modal-target="Carrinho" data-modal-toggle="Carrinho" onclick="gerarHtmlCarrinho()"><img src="/assets/images/cart.svg" class="h-20 p-3 bg-card rounded-2xl"></button>
            </div>
        </div>
    </header>
    <div class="flex-1 overflow-auto">
        <div class="cards scroll-container h-auto grid grid-cols-1 gap-12 sm:grid-cols-2 sm:gap-12 md:grid-cols-3 md:gap-12 md:text-sm lg:grid-cols-4 lg:text-base lg:gap-12 px-12 py-2">
            <?php
                foreach ($produtos as $produto) {
                    $maxima = $produto->quantidade_maxima;
                    if ($produto->quantidade_maxima > $produto->quantidade_estoque) {
                        $maxima = $produto->quantidade_estoque;
                        $produto->quantidade_maxima = $maxima;
                    }
                    ?>
                        <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font flex flex-col">
                            <header class="card-header grid justify-items-center text-base md:text-lg lg:text-xl">
                                <p class="pb-3 text-amber-300"><?= $produto->nome_produto ?></p>
                                <div class="rounded-lg shadow-2xl h-32 w-full sm:h-10 md:h-28 lg:h-32 xl:h-40 flex justify-center items-center" id="prod-img" style="background-image: url('<?= $produto->url_imagem ?>'); <?= $produto->quantidade_estoque == 0?'backdrop-filter: blur(20px);':'' ?>">
                                    <?php 
                                        if ($produto->quantidade_estoque == 0) {
                                            ?>
                                            <img src="/assets/images/carimbo-esgotado.avif" alt="">
                                            <?php
                                        }
                                    ?>
                                </div>
                            </header>
                            <section class="card-body grid justify-items-center grid-cols-1 p-2 text-xs md:text-base lg:text-lg">
                                <p><span class="text-amber-300">Quantidade máxima:</span> <span class="font-bold"><?= $maxima ?></span></p>
                                
                                <!-- Controles de quantidade -->
                                <div class="flex items-center space-x-2 mt-2">
                                    <button onclick="alterarQuantidade('<?= $produto->cd_produto ?>', 'diminuir', <?= $produto->bebida ? 'true' : 'false' ?>)" 
                                            class="bg-red-500 text-white px-2 py-1 rounded">-</button>
                                    
                                    <span id="quantidade-<?= $produto->cd_produto ?>" class="quantidade-produto">0/<?= $produto->bebida? '1':$maxima ?></span>
                                    
                                    <button onclick="alterarQuantidade('<?= $produto->cd_produto ?>', 'aumentar', <?= $produto->bebida ? 'true' : 'false' ?>)" 
                                            class="bg-green-500 text-white px-2 py-1 rounded">+</button>
                                </div>
                            </section>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</main>
    <script>
        let $produtos = <?= json_encode($produtos) ?>;
        let carrinho = []

        function gerarHtmlCarrinho() {
            $('p.retorno').text('')
            let display_produtos = $('#Carrinho #display-produtos')

            let html = '';

            // Percorre os itens do carrinho
            for (const [cdProduto, [nome_produto, quantidade]] of Object.entries(carrinho)) {
                // Busca as informações do produto
                const produto = $produtos.find(p => p.cd_produto === cdProduto);

                if (produto && quantidade > 0) {
                html += `
                    <div class="grid grid-cols-2 border-amber-300 border-4 rounded-2xl p-3 mb-3">
                    <p class="text-slate-200">Nome: <span class="text-white">${produto.nome_produto}</span></p>
                    <p class="text-slate-200">Qtd: <span class="text-white">${quantidade}</span></p>
                    </div>
                `;
                }
            }

            display_produtos.html(html)
        }

        // Variável global para armazenar o carrinho
        function alterarQuantidade(cdProduto, acao, ehBebida) {
            // Converte o cdProduto para string para garantir a consistência
            cdProduto = String(cdProduto);

            // Inicializa o produto no carrinho se não existir
            if (!carrinho[cdProduto]) {
                carrinho[cdProduto] = [$produtos.find(p => p.cd_produto === cdProduto).nome_produto, 0];
            }

            // Lógica para bebidas (máximo 1)
            if (ehBebida) {
                if (acao === 'aumentar' && carrinho[cdProduto] < 1) {
                    carrinho[cdProduto] = [$produtos.find(p => p.cd_produto === cdProduto).nome_produto, 1];
                } else if (acao === 'diminuir') {
                    carrinho[cdProduto] = [$produtos.find(p => p.cd_produto === cdProduto).nome_produto, 0];
                }
            } 
            // Lógica para comidas (máximo 3)
            else {
                if (acao === 'aumentar' && carrinho[cdProduto][1] < $produtos.find(p => p.cd_produto === cdProduto).quantidade_maxima) {
                    carrinho[cdProduto][1]++;
                } else if (acao === 'diminuir' && carrinho[cdProduto][1] > 0) {
                    carrinho[cdProduto][1]--;
                }
            }

            // Atualiza o display da quantidade
            atualizarDisplayQuantidade(cdProduto, ehBebida);
        }

        function atualizarDisplayQuantidade(cdProduto, ehBebida) {
            const displayElement = document.getElementById(`quantidade-${cdProduto}`);
            const quantidade = carrinho[cdProduto][1];
            
            // Determina o máximo baseado no tipo de produto
            const maximo = ehBebida ? 1 : ($produtos.find(p => p.cd_produto === cdProduto).quantidade_maxima);
            
            displayElement.textContent = `${quantidade}/${maximo}`;
        }
    </script>
<?php $this->renderView('modal', 'cardapio', ['numero_mesa' => $numero_mesa, 'cd_buffet' => $cd_buffet]) ?>

<?php $this->renderView('footer', 'Admin') ?>
</body>



    