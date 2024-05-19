<form method="post" id="formCadastroBuffet">
    <h1>Cadastrar Buffet</h1>
    <fieldset>
        <label for="nome-buffet">Nome do Buffet</label>
        <input type="text" name="nome-buffet" id="nome-buffet" placeholder="Nome do Buffet" required>
    </fieldset>

    <!-- Endereço -->
    <fieldset style="width: 100%">
        <section>
            <div>
                <label for="cep">CEP</label>
                <input type="number" name="cep" id="cep" placeholder="CEP" required>
            </div>

            <div>
                <label for="uf">UF</label>
                <select name="uf" id="uf" required>
                    <option value="">Selecione um Estado</option>
                </select>
            </div>

            <div>
                <label for="localidade">Cidade</label>
                <select name="localidade" id="localidade" disabled required>
                    <option value="">Selecione um Cidade</option>
                </select>
            </div>
        </section>

        <label for="bairro">Bairro</label>
        <input type="text" name="bairro" id="bairro" placeholder="Bairro" required>
        <section>
            <fieldset style="flex: 14">
                <label for="logradouro">Rua</label>
                <input type="text" name="logradouro" id="logradouro" placeholder="Rua" required>
            </fieldset>
            <fieldset style="flex: 1">
                <label for="numero">Número</label>
                <input type="number" name="numero" id="numero" placeholder="Número" min="1" required>
            </fieldset>
        </section>
        <label for="complemento">Complemeto</label>
        <input type="text" name="complemento" id="complemento" placeholder="Complemento">
    </fieldset>

    <!-- Configurações iniciais -->
    <fieldset>
        <label for="intervalo-pedidos">Intervalo entre pedidos (minutos) </label>
        <input type="number" name="intervalo-pedidos" id="intervalo-pedidos" min="1" required>
        <label for="qtd-maxima-produtos-pedido">Quantidade máxima de produtos por pedido</label>
        <input type="number" name="qtd-maxima-produtos-pedido" id="qtd-maxima-produtos-pedido" min="1" required>
        <label for="qtd-maxima-cada-produto">Quantidade máxima de cada produto</label>
        <input type="number" name="qtd-maxima-cada-produto" id="qtd-maxima-cada-produto" min="1" required>
        <label for="qtd-maxima-convidados">Quantidade máxima de convidados</label>
        <input type="number" name="qtd-maxima-convidados" id="qtd-maxima-convidados" min="1" required>
    </fieldset>

    <!-- Informações de login -->
    <fieldset>
        <label for="usuario-inicial">Usuário Inicial</label>
        <input type="text" name="usuario-inicial" id="usuario-inicial" placeholder="Usuário Inicial" required>
        <label for="senha-inicial">Senha Inicial</label>
        <input type="text" name="senha-inicial" id="senha-inicial" placeholder="Senha Inicial" required>
    </fieldset>

    <button type="submit">Cadastrar</button>
</form>

<script src="/assets/js/Admin/registerBuffet.js"></script>