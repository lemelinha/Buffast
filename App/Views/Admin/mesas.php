<body>
<main class="grid grid-rows-[2fr_6fr_1fr] ml-16 w-screen">
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

    <div class="flex-1 overflow-auto">
    <div class="cards scroll-container h-auto grid grid-cols-1 gap-12 sm:grid-cols-2 sm:gap-12 md:grid-cols-3 md:gap-12 md:text-sm lg:grid-cols-4 lg:text-base lg:gap-12 px-12 py-2">
            <?php
                foreach ($mesas as $mesa): 
                    $link = "https://buffast.com.br/cardapio/" . $mesa->id_buffet . "/m/" . hash('sha256', $mesa->numero_mesa);
                    $qrcode = (new \chillerlan\QRCode\QRCode)->render($link);
                    ?>
                    <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font flex flex-col">
                        <header class="card-header text-base md:text-lg lg:text-2xl">
                        <p class="pb-3"><span class="text-amber-300">Mesa:</span><span class="font-bold"><?= $mesa->numero_mesa ?></span></p>
                        <div class="flex justify-center items-center">
                            <img
                            class="h-16 sm:h-16"
                            src="/assets/images/table.svg"/>
                        </div>
                        </header>
                        <div class="flex flex-col items-start">
                        <label class="text-lg">QR-Code</label>
                            <img
                            class="h-16 sm:h-20 mb-5 mx-auto"
                            src="<?= $qrcode ?>"/>
                        </div>
                        <footer class="flex justify-end mt-auto">
                            <button class="deletar-mesa bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2">
                                Deletar
                            </button>
                        </footer>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="ml-4 grid grid-rows-subgrid  justify-center justify-items-center h-1/5 p-8 font-bold md: md:p-8 lg: lg:p-4">
        <button class="adicionar-mesa row-start-3 bg-btn text-4xl h-16 p-2 rounded-full main-font text-amber-300 md:text-5xl lg:text-6xl lg:p-2">+Adicionar</button>
    </div>
   
</main>
<script>
    $('button.adicionar-mesa').click(function () {
        $.ajax({
            'url': '/painel/mesas/cadastrar',
            'type': 'POST',
            'dataType': 'html'
        })
        .done(function (data) {
            $('.cards').append(data)
        })
    })

    $('button.deletar-mesa').click(async function () {
        $('button.deletar-mesa').attr('disabled', 'disabled')
        
        await $.ajax({
            
        })

        $('button.deletar-mesa').removeAttr('disabled')
    })

    function downloadQRCode() {
        // Cria um link de download diretamente da URL do QR Code
        const link = document.createElement('a');
        link.href = 'a';
        link.download = 'QRCode_Mesa.png';
        
        // Simula o clique para download
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>
<?php $this->renderView('footer', 'Admin') ?>
</body>


    