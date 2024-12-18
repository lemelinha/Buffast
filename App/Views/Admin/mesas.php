<?php use App\Tools\Tools; ?>
<body>
<main class="grid grid-rows-[2fr_6fr_1fr] ml-16 w-screen">
    <header class="ml-4 text-center main-font text-white font-bold h-1/5">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="#803469"><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 77 666.7 77 833.3 28 1000 28V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 70 666.7 70 833.3 16 1000 16V0H0Z" opacity=".5"></path><path d="M0 0v100c166.7 0 166.7-66 333.3-66S500 63 666.7 63 833.3 4 1000 4V0H0Z"></path></svg>
    <div class="grid grid-cols-1 lg:grid lg:grid-cols-[1fr_3fr_1fr]">
        <h1 class="ml-4 font-tittle text-4xl p-2 md:text-5xl lg:col-start-2 lg:text-6xl lg:p-0">Mesas</h1>
    </div>
    </header>

    <div class="flex-1 overflow-auto">
    <div class="cards scroll-container h-auto grid grid-cols-1 gap-12 sm:grid-cols-2 sm:gap-12 md:grid-cols-3 md:gap-12 md:text-sm lg:grid-cols-4 lg:text-base lg:gap-12 px-12 py-2">
            <?php $this->renderView('listMesas', 'Admin/mesa', ['mesas' => $mesas]); ?>
        </div>
    </div>

    <div class="ml-4 grid grid-rows-subgrid  justify-center justify-items-center h-1/5 p-8 font-bold md: md:p-8 lg: lg:p-4">
        <?php
            if (Tools::emFesta($_SESSION['cd_buffet'])) {
                ?>
                <p class="main-font text-3xl font-tittle">Nao e autorizado alteracoes nas mesas enquanto estivermos em festa</p>
                <?php
            } else {
                ?>
                <button class="deletar-mesa row-start-3 bg-btn text-4xl h-16 p-2 rounded-full main-font text-amber-300 md:text-5xl lg:text-6xl lg:p-2 mr-10">-<span class="invisible sm:visible">Remover</span></button>
                <button class="adicionar-mesa row-start-3 bg-btn text-xl h-16 p-2 rounded-full main-font text-amber-300 md:text-5xl lg:text-6xl lg:p-2">+Adicionar</button>
                <?php
            }
        ?>
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
            $('.cards').html(data)
        })
    })

    $('button.deletar-mesa').click(function () {
        $('button.deletar-mesa').attr('disabled', 'disabled')

        $.ajax({
            'url': `/painel/mesas/deletar`,
            'type': 'POST',
            'dataType': 'html'
        })
        .done(function (data) {
            $('.cards').html(data)
            $('button.deletar-mesa').removeAttr('disabled')
        })
    })

    function downloadQRCode(qrcodeUrl, numero) {
        // Cria um novo elemento SVG
        const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
        svg.setAttribute("width", "700");
        svg.setAttribute("height", "700");
        svg.setAttribute("xmlns", "http://www.w3.org/2000/svg");

        // Cria uma imagem dentro do SVG
        const image = document.createElementNS("http://www.w3.org/2000/svg", "image");
        image.setAttributeNS("http://www.w3.org/1999/xlink", "href", qrcodeUrl);
        image.setAttribute("width", "700");
        image.setAttribute("height", "700");
        
        // Adiciona a imagem ao SVG
        svg.appendChild(image);

        // Converte o SVG para uma string
        const svgString = new XMLSerializer().serializeToString(svg);
        const blob = new Blob([svgString], {type: "image/svg+xml"});

        // Cria um link para download
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = `QRCode_Mesa_${numero}.svg`;
        
        // Adiciona, clica e remove o link
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        
        // Limpa o objeto URL
        URL.revokeObjectURL(link.href);
    }
</script>
<?php $this->renderView('footer', 'Admin') ?>
</body>


    