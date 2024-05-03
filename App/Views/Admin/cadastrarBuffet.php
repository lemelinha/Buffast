<main>
    <form method="post" id="formCadastroBuffet">
        <h1>Cadastrar Buffet</h1>
        <fieldset>
            <label for="nome-buffet">Nome do Buffet</label>
            <input type="text" name="nome-buffet" id="nome-buffet" placeholder="Nome do Buffet" required>
        </fieldset>

        <!-- Endereço -->
        <fieldset>
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
                    <label for="cidade">Cidade</label>
                    <select name="cidade" id="cidade" disabled required>
                        <option value="">Selecione um Cidade</option>
                    </select>
                </div>
            </section>

            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="bairro" placeholder="Bairro" required>
            <label for="rua">Rua</label>
            <input type="text" name="rua" id="rua" placeholder="Rua" required>
            <label for="complemeto">Complemeto</label>
            <input type="text" name="complemeto" id="complemeto" placeholder="Complemento" required>
        </fieldset>

        <!-- Configurações iniciais -->
        <fieldset>
            <label for="nome-buffet">Nome do Buffet</label>
            <input type="text" name="nome-buffet" id="nome-buffet" placeholder="Nome do Buffet" required>
            <label for="nome-buffet">Nome do Buffet</label>
            <input type="text" name="nome-buffet" id="nome-buffet" placeholder="Nome do Buffet" required>
            <label for="nome-buffet">Nome do Buffet</label>
            <input type="text" name="nome-buffet" id="nome-buffet" placeholder="Nome do Buffet" required>
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
</main>

<script src="/assets/js/Admin/registerBuffet.js"></script>
