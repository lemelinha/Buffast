<!-- Main modal -->
<div id="upload" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
<div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-card-modal rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-white">
                    Adicionar Festa
                </h3>
                <button type="button" class="text-white bg-transparent hover:bg-amber-300 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="upload">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fechar Modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST" action="/painel/festas/cadastrar" id="cadastrar">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="aniversariante" class="block mb-2 text-sm font-medium text-white ">Nome do Aniversariante</label>
                        <input type="text" name="aniversariante" id="aniversariante" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"  required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="aniversario" class="block mb-2 text-sm font-medium text-white ">Data de Nascimento do Aniversariante</label>
                        <input type="date" name="aniversario" id="aniversario" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"required="">
                    </div>
                    <div class="col-span-2">
                        <label for="responsavel" class="block mb-2 text-sm font-medium text-white ">Nome do responsável</label>
                        <input type="text" name="responsavel" id="responsavel" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"  required="">
                    </div>
                    <div class="col-span-2">
                        <label for="cpf-responsavel" class="block mb-2 text-sm font-medium text-white ">CPF do responsável</label>
                        <input type="number" name="cpf-responsavel" id="cpf-responsavel" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"  required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="date-start" class="block mb-2 text-sm font-medium text-white ">Inicio Festa</label>
                        <input type="date" name="date-start" id="date-start" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"required="" min="<?= date('Y-m-d', (time() + 24*60*60*2)) ?>">
                    </div>
                    
                    <div class="col-span-2 sm:col-span-1">
                        <label for="time-start" class="block mb-2 text-sm font-medium text-white ">Horário Inicio Festa</label>
                        <input type="time" name="time-start" id="time-start" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="time-end" class="block mb-2 text-sm font-medium text-white ">Horário Fim Festa</label>
                        <input type="time" name="time-end" id="time-end" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="convidados" class="block mb-2 text-sm font-medium text-white ">Quantidade de Convidados</label>
                        <input type="number" name="convidados" id="convidados" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"required="">
                    </div>
                </div>
                <button type="submit" class="font-tittle inline-flex items-center bg-amber-300 hover:bg-amber-400 focus:ring-4 focus:outline-none focus:ring-primary-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Adicionar
                </button>
                <p class="retorno"></p>
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
                   Editar Festa
                </h3>
                <button type="button" class="text-white bg-transparent hover:bg-amber-300 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="editar">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fechar Modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" id="editar" method="POST" action="/painel/festas/alterar">
                <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2">
                        <label for="aniversariante" class="block mb-2 text-sm font-medium text-white ">Nome do Aniversariante</label>
                        <input type="text" name="aniversariante" id="aniversariante" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"  required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="aniversario" class="block mb-2 text-sm font-medium text-white ">Data de Nascimento do Aniversariante</label>
                        <input type="date" name="aniversario" id="aniversario" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"required="">
                    </div>
                    <div class="col-span-2">
                        <label for="responsavel" class="block mb-2 text-sm font-medium text-white ">Nome do responsável</label>
                        <input type="text" name="responsavel" id="responsavel" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"  required="">
                    </div>
                    <div class="col-span-2">
                        <label for="cpf-responsavel" class="block mb-2 text-sm font-medium text-white ">CPF do responsável</label>
                        <input type="number" name="cpf-responsavel" id="cpf-responsavel" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"  required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="date-start" class="block mb-2 text-sm font-medium text-white ">Inicio Festa</label>
                        <input type="date" name="date-start" id="date-start" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"required="" min="<?= date('Y-m-d') ?>">
                    </div>
                    
                    <div class="col-span-2 sm:col-span-1">
                        <label for="time-start" class="block mb-2 text-sm font-medium text-white ">Horário Inicio Festa</label>
                        <input type="time" name="time-start" id="time-start" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="time-end" class="block mb-2 text-sm font-medium text-white ">Horário Fim Festa</label>
                        <input type="time" name="time-end" id="time-end" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="convidados" class="block mb-2 text-sm font-medium text-white ">Quantidade de Convidados</label>
                        <input type="number" name="convidados" id="convidados" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"required="">
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

<!-- Delete modal -->
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
                <h3 class="mb-5 text-lg font-normal text-white">Você tem certeza que deseja deletar essa festa?</h3>
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
    $('button.editar-festa').click(function () {
        let cd_festa = $(this).attr('cd_festa')
        let id_buffet = $(this).attr('id_buffet')

        let nome_aniversariante = $(this).attr('nome_aniversariante')
        $('form#editar input#aniversariante').val(nome_aniversariante)

        let data_aniversario = $(this).attr('data_aniversario')
        $('form#editar input#aniversario').val(data_aniversario)

        let convidados = $(this).attr('convidados')
        $('form#editar input#convidados').val(convidados)

        let nome_responsavel = $(this).attr('nome_responsavel')
        $('form#editar input#responsavel').val(nome_responsavel)

        let cpf_responsavel = $(this).attr('cpf_responsavel')
        $('form#editar input#cpf-responsavel').val(cpf_responsavel)

        let data_start = $(this).attr('date-start')
        $('form#editar input#date-start').val(data_start)

        let time_start = $(this).attr('time-start')
        $('form#editar input#time-start').val(time_start)

        let time_end = $(this).attr('time-end')
        $('form#editar input#time-end').attr('min', time_start)
        $('form#editar input#time-end').val(time_end)

        $("<input>").attr({
            type: "hidden",
            name: "id_buffet",
            value: id_buffet
        }).appendTo('form#editar');

        $("<input>").attr({
            type: "hidden",
            name: "cd_festa",
            value: cd_festa
        }).appendTo('form#editar');
    })

    $('button.deletar-festa').click(function () {
        let cd_festa = $(this).attr('cd_festa')
        $('form#deletar').attr('action', '/painel/festas/deletar/' + cd_festa)

        $('form#deletar').submit(function (e) {
            $("<input>").attr({
                type: "hidden",
                name: "cd_festa",
                value: cd_festa
            }).appendTo('form#deletar');

            return true
        })
    })

    $('button.editar-festa, button.cadastrar-festa').click(function () {
        $('p.retorno').text('')
    })

    function validarCPF(cpf) {
        // Remove caracteres não numéricos
        cpf = cpf.replace(/[^\d]/g, '');
        
        // Verifica se o CPF tem 11 dígitos
        if (cpf.length !== 11) {
            return false;
        }
        
        // Verifica se todos os dígitos são iguais (CPF inválido)
        if (/^(\d)\1+$/.test(cpf)) {
            return false;
        }
        
        // Calcula o primeiro dígito verificador
        let soma = 0;
        for (let i = 0; i < 9; i++) {
            soma += parseInt(cpf.charAt(i)) * (10 - i);
        }
        
        let resto = 11 - (soma % 11);
        let digitoVerificador1 = resto === 10 || resto === 11 ? 0 : resto;
        
        // Verifica se o primeiro dígito verificador está correto
        if (digitoVerificador1 !== parseInt(cpf.charAt(9))) {
            return false;
        }
        
        // Calcula o segundo dígito verificador
        soma = 0;
        for (let i = 0; i < 10; i++) {
            soma += parseInt(cpf.charAt(i)) * (11 - i);
        }
        
        resto = 11 - (soma % 11);
        let digitoVerificador2 = resto === 10 || resto === 11 ? 0 : resto;
        
        // Verifica se o segundo dígito verificador está correto
        return digitoVerificador2 === parseInt(cpf.charAt(10));
    }

    $('form').submit(function () {
        let form = $(this).attr('id')
        let cpf = $(`form#${form} input#cpf-responsavel`).val();
        let cpfvalido = validarCPF(cpf + "");
        if (!cpfvalido) {
            $('p.retorno').text('CPF inválido');
            return false;
        }

        let data = $(`form#${form} #date-start`).val()
        let hora_inicio = $(`form#${form} #time-start`).val()
        let hora_fim = $(`form#${form} #time-end`).val()

        let inicio = data + ' ' + hora_inicio
        let fim = data + ' ' + hora_fim
        let id_festa = null

        if (form == 'editar') {
            id_festa = $(`form#${form} input[name="cd_festa"]`).val()
        }

        if (verificarData(id_festa, inicio, fim)) {
            $('p.retorno').text('Já tem uma data nessa data');
            return false;
        }

        return false;
    });

    function verificarData(id_festa, inicio, fim) {
        console.log(id_festa)
        let existe = false
        horarios.forEach(function (festa) {
            if (id_festa === null || festa.cd_festa == id_festa) {
                return
            }
            if (inicio > festa.inicio && inicio < festa.fim) {
                existe = true
            }
            if (fim > festa.inicio && fim < festa.fim) {
                existe = true
            }
        })

        return existe
    }

    $('form#editar #time-start').on('change', function() {
        // Obtém o horário de início
        let startTime = $(this).val();
        
        // Configura o input de fim para ter o atributo min
        $('form#editar #time-end').attr('min', startTime);
        
        // Limpa o valor do input de fim se estiver antes do início
        let endTime = $('form#editar #time-end').val();
        if (endTime && endTime < startTime) {
            $('form#editar #time-end').val('');
        }
    });

    // Validação adicional para o input de fim
    $('form#editar #time-end').on('change', function() {
        let startTime = $('form#editar #time-start').val();
        let endTime = $(this).val();
        
        // Se não tiver selecionado o horário de início, impede a seleção do fim
        if (!startTime) {
            alert('Selecione primeiro o horário de início');
            $(this).val('');
            return;
        }
    });

    $('form#cadastrar #time-start').on('change', function() {
        // Obtém o horário de início
        let startTime = $(this).val();
        
        // Configura o input de fim para ter o atributo min
        $('form#cadastrar #time-end').attr('min', startTime);
        
        // Limpa o valor do input de fim se estiver antes do início
        let endTime = $('form#cadastrar #time-end').val();
        if (endTime && endTime < startTime) {
            $('form#cadastrar #time-end').val('');
        }
    });

    // Validação adicional para o input de fim
    $('form#cadastrar #time-end').on('change', function() {
        let startTime = $('form#cadastrar #time-start').val();
        let endTime = $(this).val();
        
        // Se não tiver selecionado o horário de início, impede a seleção do fim
        if (!startTime) {
            alert('Selecione primeiro o horário de início');
            $(this).val('');
            return;
        }
    });
</script>
