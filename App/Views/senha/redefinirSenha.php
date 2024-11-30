<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
    <div class="col-span-2">
        <label for="Nsenha" class="block mb-2 text-sm font-medium text-white ">Nova Senha</label>
        <input type="password" name="senha" id="Nsenha" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"required="">
    </div>
    <div class="col-span-2">
        <label for="N2senha" class="block mb-2 text-sm font-medium text-white ">Repita a Nova Senha</label>
        <input type="password" name="senha-confirmacao" id="N2senha" class="bg-amber-300 border border-gray-300 font-tittle text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"required="">
    </div>
    <button type="button" id="trocar">Trocar</button>
    <p class="retorno" style="height: 1rem"></p>
</form>

<script>
    $('button#trocar').click(function () {
        if ($('#Nsenha').val() !== $('#N2senha').val()) {
            $('p.retorno').text('As senhas não coincidem');
            return
        }
        $('form').trigger('submit')
    });
</script>
