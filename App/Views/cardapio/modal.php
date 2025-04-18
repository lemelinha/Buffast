<!-- Main modal -->
<div id="Carrinho" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full">
    <!-- Modal content -->
    <div class="relative bg-card-modal rounded-lg shadow">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
        <h3 class="text-lg font-semibold text-white">
          Carrinho
        </h3>
        <button type="button"
          class="text-white bg-transparent hover:bg-amber-300 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
          data-modal-hide="Carrinho">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Fechar Modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <form class="p-4 md:p-5" method="POST">
        <div class="grid gap-4 mb-4 grid-cols-2">
          <label for="produto" class="block mb-2 text-sm font-medium text-white ">Produtos Adicionados</label>
          <div class="col-span-2" id="display-produtos">
            <div class="grid grid-cols-2 border-amber-300 border-4 rounded-2xl p-3 mb-3">
              <p class="text-slate-200">Nome: <span class="text-white">Coxinha</span> </p>
              <p class="text-slate-200">Qtd: <span class="text-white">5</span> </p>
            </div>
            <div class="grid grid-cols-2 border-amber-300 border-4 rounded-2xl p-3">
              <p class="text-slate-200">Nome: <span class="text-white">Enroladinho de Salsicha</span> </p>
              <p class="text-slate-200">Qtd: <span class="text-white">5</span> </p>
            </div>
          </div>
        </div>
        <button type="submit"
          class="w-full font-tittle inline-flex items-center justify-center bg-amber-300 hover:bg-amber-400 focus:ring-4 focus:outline-none focus:ring-primary-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
          <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
              clip-rule="evenodd"></path>
          </svg>
          Finalizar pedido
        </button>
        <p class="retorno" style="min-height: 2rem;"></p>
      </form>
    </div>
  </div>
</div>

<script>
  $('form').submit(function (e) {
    e.preventDefault()

    if (Object.keys(carrinho).length === 0) {
      $('p.retorno').text('Você precisa adicionar pelo menos um item ao carrinho.');
      return
    }

    const itensPedido = Object.entries(carrinho)
      .filter(([_, [, quantidade]]) => quantidade > 0)
      .map(([cdProduto, [nome_produto, quantidade]]) => ({
        cd_produto: cdProduto,
        nome_produto,
        quantidade
      }));

    $.ajax({
      'url': '/cardapio/<?= $cd_buffet ?>/m/<?= hash('sha256', $cd_buffet . $numero_mesa) ?>/fazer-pedido',
      'type': 'POST',
      'data': {'itens':itensPedido},
      'dataType': 'json'
    })
    .done(function (data) {
      if (data.ok) {
        window.location.reload()
        return
      }
      $('p.retorno').text(data.msg)
    })
    .catch(function (a) {
      console.log(a)
    })
  })
</script>
