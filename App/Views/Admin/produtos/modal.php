<!-- Main modal -->
<div id="upload" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
<div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-card-modal rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-white">
                    Adicionar Produto
                </h3>
                <button type="button" class="text-white bg-transparent hover:bg-amber-300 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="upload">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fechar Modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="/painel/produtos/cadastrar" method="POST" enctype="multipart/form-data" id="cadastrar">
                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div class="rounded-lg shadow-2xl h-32 w-full sm:h-10  md:h-28  lg:h-32 xl:h-40 prod-img" id="prod-img-cadastrar" style="background-image: url('/assets/images/Logo-Buffast2.png');"></div>
                    <div class="col-span-2">
                        <label for="imagem-cadastrar" class="block mb-2 text-sm font-medium text-white ">Imagem</label>
                        <input type="file" name="imagem" id="imagem-cadastrar" class="block w-full text-sm font-tittle border border-gray-300 rounded-lg cursor-pointer bg-amber-300 placeholder-gray-400 focus:ring-primary-600"  required="" accept=".png, .jpg, .jpeg" onchange="previewFile('cadastrar')">
                    </div>
                    <div class="col-span-2">
                        <label for="produto" class="block mb-2 text-sm font-medium text-white ">Nome do Produto</label>
                        <input type="text" name="nome" id="nome" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 block w-full p-2.5"  required="">
                    </div>
                    <div class="col-span-2">
                        <label for="quantidade" class="block mb-2 text-sm font-medium text-white ">Quantidade máxima por pedido</label>
                        <input type="number" name="quantidade" id="quantidade" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"required="">
                    </div>
                    <div class="col-span-2">
                        <label for="" class="block mb-2 text-sm font-medium text-white ">Tipo</label>
                        <input type="radio" name="bebida" value="0" checked="checked"> <span class="inline-block mb-2 text-sm font-medium text-white ">Comida</span>
                        <input type="radio" name="bebida" value="1" id="bebida"> <span class="inline-block mb-2 text-sm font-medium text-white ">Bebida</span>
                    </div>
                </div>
                <button type="submit" class="font-tittle inline-flex items-center bg-amber-300 hover:bg-amber-400 focus:ring-4 focus:outline-none focus:ring-primary-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Adicionar
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Edit modal -->
<div id="editar" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
<div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-card-modal rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-white">
                    Alterar Produto
                </h3>
                <button type="button" class="text-white bg-transparent hover:bg-amber-300 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="editar">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fechar Modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" id="editar" action="/painel/produtos/alterar" method="POST" enctype="multipart/form-data">
                <div class="grid gap-4 mb-4 grid-cols-1">
                    <div class="rounded-lg shadow-2xl h-32 w-full sm:h-10  md:h-28  lg:h-32 xl:h-40 prod-img" id="prod-img-alterar"></div>
                    <div class="col-span-2">
                        <label for="imagem-alterar" class="block mb-2 text-sm font-medium text-white ">Imagem (vazio para manter)</label>
                        <input type="file" name="imagem" id="imagem-alterar" class="block w-full text-sm font-tittle border border-gray-300 rounded-lg cursor-pointer bg-amber-300 placeholder-gray-400 focus:ring-primary-600" accept=".png, .jpg, .jpeg" onchange="previewFile('alterar')">
                    </div>
                    <div class="col-span-2">
                        <label for="produto" class="block mb-2 text-sm font-medium text-white ">Nome do Produto</label>
                        <input type="text" name="nome" id="nome" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"  required="">
                    </div>
                    <div class="col-span-2">
                        <label for="quantidade" class="block mb-2 text-sm font-medium text-white ">Quantidade máxima por pedido</label>
                        <input type="number" name="quantidade" id="quantidade" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"required="">
                    </div>
                </div>
                <button type="submit" class="font-tittle inline-flex items-center bg-amber-300 hover:bg-amber-400 focus:ring-4 focus:outline-none focus:ring-primary-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Alterar
                </button>
            </form>
        </div>
    </div>
</div>

<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-card-modal rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-white bg-transparent hover:bg-amber-300 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-amber-300 w-12 h-12 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-white">Você tem certeza que deseja deletar esse produto?</h3>
                <form id="deletar" method="POST">
                    <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Sim, Eu tenho
                    </button>
                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium font-tittle bg-amber-300 focus:outline-none rounded-lg border border-amber-500 hover:bg-amber-400 focus:z-10 focus:ring-4 focus:ring-gray-100">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('form#cadastrar input[name="bebida"]').change(function () {
        let quantidade = $('form#cadastrar input[name="quantidade"]')

        if ($(this).attr('id') == 'bebida') {
            quantidade.val('1')
            quantidade.attr('readonly', 'readonly')
        } else {
            quantidade.removeAttr('readonly')
        }
    })

    $('button.editar-produto').click(function () {
        $('form#editar input#nome').val($(this).attr('nome_produto'))
        $('form#editar input#quantidade').val($(this).attr('quantidade_maxima'))
        
        let id_buffet = $(this).attr('id_buffet')
        let url_imagem = $(this).attr('url_imagem')
        $('form#editar div#prod-img-alterar').css('background-image', `url("${url_imagem}")`)
        let cd_produto = $(this).attr('cd_produto')

        $('form#editar').submit(function (e) {
            $("<input>").attr({
                type: "hidden",
                name: "cd_produto",
                value: cd_produto
            }).appendTo(this);

            $("<input>").attr({
                type: "hidden",
                name: "id_buffet",
                value: id_buffet
            }).appendTo(this);

            $("<input>").attr({
                type: "hidden",
                name: "remover_imagem",
                value: url_imagem
            }).appendTo(this);
            return True
        })
    })

    $('button.deletar-produto').click(function () {
        let cd_produto = $(this).attr('cd_produto')
        $('form#deletar').attr('action', '/painel/produtos/deletar/' + cd_produto)

        $('form#deletar').submit(function (e) {
            $("<input>").attr({
                type: "hidden",
                name: "cd_produto",
                value: cd_produto
            }).appendTo(this);

            return True
        })
    })

    function previewFile(type) {
        const preview = document.getElementById('prod-img-'+type);
        const file = document.getElementById('imagem-'+type).files[0];

        if (file) {
            if (!file.type.startsWith('image/')) {
                alert('Por favor, selecione apenas arquivos de imagem.');
                return;
            }

            if (file.size > 5 * 1024 * 1024) {
                alert('A imagem deve ter no máximo 5MB.');
                return;
            }

            const reader = new FileReader();

            reader.onloadend = function() {
                preview.style.backgroundImage = `url(${reader.result})`;
            }

            reader.readAsDataURL(file);
        } else {
            preview.style.backgroundImage = "url(/assets/images/Logo-Buffast2.png)";
        }
    }
</script>
