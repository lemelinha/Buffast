<!-- Modal de entrada -->
<div id="mdentrada" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
<div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-card-modal rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-white">
                    Adicionar ao Estoque
                </h3>
                <button type="button" class="text-white bg-transparent hover:bg-amber-300 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="mdentrada">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fechar Modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" id="e">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                    <div class="col-span-2">
                        <label for="produto" class="block mb-2 text-sm font-medium text-white">Selecione o produto</label>
                        <select name="produto" id="produto" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                            <option value="" selected style="display: none;">Escolha um produto</option>
                            <?php
                                foreach ($produtos as $produto): ?>
                                    <option value="<?= $produto->cd_produto ?>"><?= $produto->nome_produto ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                        <label for="entrada" class="block mb-2 text-sm font-medium text-white ">Quantidade de Entrada</label>
                        <input type="number" name="quantidade" id="entrada" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"required="">
                    </div>
                </div>
                <button type="submit" class="font-tittle inline-flex items-center bg-amber-300 hover:bg-amber-400 focus:ring-4 focus:outline-none focus:ring-primary-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Alterar
                </button>
                <p class="retorno"></p>
            </form>
        </div>
    </div>
</div>

<!-- Modal de saida -->
<div id="mdsaida" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
<div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-card-modal rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-white">
                    Remover do Estoque
                </h3>
                <button type="button" class="text-white bg-transparent hover:bg-amber-300 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="mdsaida">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fechar Modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" id="s">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                    <div class="col-span-2">
                        <label for="produto" class="block mb-2 text-sm font-medium text-white">Selecione o produto</label>
                        <select name="produto" id="produto" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                            <option value="" selected style="display: none;">Escolha um produto</option>
                            <?php
                                foreach ($produtos as $produto): ?>
                                    <option value="<?= $produto->cd_produto ?>"><?= $produto->nome_produto ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                        <label for="saida" class="block mb-2 text-sm font-medium text-white ">Quantidade de saida</label>
                        <input type="number" name="quantidade" id="saida" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"required="">
                    </div>
                </div>
                <button type="submit" class="font-tittle inline-flex items-center bg-amber-300 hover:bg-amber-400 focus:ring-4 focus:outline-none focus:ring-primary-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Alterar
                </button>
                <p class="retorno"></p>
            </form>
        </div>
    </div>
</div>

<script>
    function objectifyForm(formArray) {
        //serialize data function
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++){
            returnArray[formArray[i]['name']] = formArray[i]['value'];
        }
        return returnArray;
    }

    $('button.entrada-produto, button.saida-produto').click(function () {
        $('input#saida').val('')
        $('input#entrada').val('')
        $('select').val('')
    })

    $('form').submit(function (e) {
        e.preventDefault()
        let type = $(this).attr('id')
        let data = objectifyForm($(this).serializeArray())
        let produto = data.produto
        let quantidade = data.quantidade

        let url = '/painel/estoque/'+type+'/'+produto+'/'+quantidade

        $.ajax({
            'url': url,
            'type': 'POST',
            'dataType': 'json'
        })
        .done(function (data) {
            if (data.ok) {
                $('input#saida').val('')
                $('input#entrada').val('')
                $('select').val('')
            }
            $('form p.retorno').text(data.msg)
        })
        .catch(function (a) {
            console.log(a)
        })
    })
</script>
