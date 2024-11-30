<?php

foreach ($mesas as $mesa): 
    $link = "https://buffast.com.br/cardapio/" . $mesa->id_buffet . "/m/" . hash('sha256', $mesa->numero_mesa);
    $qrcode = (new \chillerlan\QRCode\QRCode)->render($link);
    ?>
    <div class="bg-card rounded-lg shadow-2xl p-3 text-white main-font flex flex-col" id="<?= $mesa->cd_mesa ?>">
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
            src="<?= $qrcode ?>" id="image-<?= $mesa->cd_mesa ?>"/>
        </div>
        <footer class="flex justify-end mt-auto">
            <button class="bg-amber-300 font-tittle w-10 rounded-lg p-2  text-sm mr-2" onclick="downloadQRCode('<?= $qrcode ?>', '<?= $mesa->numero_mesa ?>')">
                <img src="/assets/images/donwload-icon.svg" alt="">
            </button>
            <button class="deletar-mesa bg-amber-300 font-tittle w-20 rounded-lg p-2  text-sm mr-2" cd_mesa="<?= $mesa->cd_mesa ?>" numero_mesa="<?= $mesa->numero_mesa ?>">
                Deletar
            </button>
        </footer>
    </div>
<?php endforeach; ?>

<script>
    $('button.deletar-mesa').click(function () {
        $('button.deletar-mesa').attr('disabled', 'disabled')
        
        let cd_mesa     = $(this).attr('cd_mesa')
        let numero_mesa = $(this).attr('numero_mesa')

        $.ajax({
            'url': `/painel/mesas/deletar/${cd_mesa}/${numero_mesa}`,
            'type': 'POST',
            'dataType': 'html'
        })
        .done(function (data) {
            $('.cards').html(data)
            $('button.deletar-mesa').removeAttr('disabled')
        })
    })
</script>
