<div class="grid-cols-1 h-screen w-screen ml-20 p-5 ">
  <div class=" h-full w-full bg-perfil  rounded-2xl p-5">
    <h1 class="text-amber-300 main-font text-lg lg:text-4xl">
      Editar Perfil
    </h1>
    <div class="grid grid-cols-1 md:grid md:grid-cols-[4fr_2fr] h-full w-full">
      <div class="place-content-center md:px-28">
        <figure>
          <img src="<?= $_SESSION['url_pfp'] ?>" id="pfp" class="h-36 w-36 rounded-full justify-self-center" id="login-img">
        </figure>
        <div>
            <input type="file" name="pfp" id="fileInput" accept=".png, .jpg, .jpeg"
                style="display: none;" onchange="previewFile()">
            <div style="column-gap:5px">
                <button type="button" class="btn-alterar-pfp bg-amber-300 text-sm p-2 rounded-xl main-font font-tittle md:text-lg  lg:p-2"
                    onclick="document.getElementById('fileInput').click()">
                    Alterar Foto
                </button>
                <button type="button" class="btn-confirmar-pfp bg-amber-300 text-sm p-2 rounded-xl main-font font-tittle md:text-lg  lg:p-2" disabled>Confirmar</button>
                <button type="button" class="btn-cancelar-pfp bg-amber-300 text-sm p-2 rounded-xl main-font font-tittle md:text-lg  lg:p-2" style="display: none">Cancelar</button>
            </div>
        </div>
        <p class="retorno-pfp" style="height: 1rem;"></p>
        <div>
          <label for="nome" class="my-3 block text-base text-white">
            Nome do Buffet
          </label>
          <input type="text" name="nome" autofocus autocomplete required
            class="w-full py-2 px-6 rounded-lg bg-amber-300 border placeholder-black focus:border-blue-500 focus:bg-amber-200 focus:outline-none" value="<?= $_SESSION['nome_buffet'] ?>" readonly="readonly"/>
        </div>
        <div>
          <label for="cnpj" class="my-3 block text-base text-white">
            Cnpj
          </label>
          <input type="text" name="cnpj" autofocus autocomplete required
            class="w-full py-2 px-6 rounded-lg bg-amber-300 border placeholder-black focus:border-blue-500 focus:bg-amber-200 focus:outline-none" value="<?= $_SESSION['cnpj'] ?>" readonly="readonly"/>
        </div>
        <div>
          <label for="email" class="my-3 block text-base text-white">
            Email
          </label>
          <input type="text" name="email" autofocus autocomplete required
            class="w-full py-2 px-6 rounded-lg bg-amber-300 border placeholder-black focus:border-blue-500 focus:bg-amber-200 focus:outline-none" value="<?= $_SESSION['email'] ?>" readonly="readonly"/>
        </div>
        <div class="grid grid-rows-1 gap-2 mt-1 lg:grid lg:grid-cols-2">
          <div class="">
            <button type="button"
              class="btn-alterar bg-amber-300 text-sm p-2 rounded-xl main-font font-tittle md:text-lg  lg:p-2">Alterar
            </button>
            <button type="button"
              class="btn-cancelar bg-amber-300 text-sm p-2 rounded-xl main-font font-tittle md:text-lg  lg:p-2" style="display:none">Cancelar
            </button>
            <button type="button"
              class="btn-salvar bg-amber-300 text-sm p-2 rounded-xl main-font font-tittle md:text-lg  lg:p-2" style="display:none">Salvar
            </button>
          </div>
          <div class="">
            <button data-modal-target="novasenha" data-modal-toggle="novasenha"
              class="bg-amber-300 text-sm  p-2 rounded-xl main-font font-tittle md:text-lg  lg:p-2">Alterar
              Senha</button>
          </div>
          <p class="retorno" style="height: 1rem;"></p>
        </div>
      </div>
      <div>
        <div class="hidden md:grid grid-cols-3 place-content-center w-full h-full gap-10">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 mt-4 rounded-b-xl justify-self-center">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 rounded-b-xl justify-self-center">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 mt-4 rounded-b-xl justify-self-center">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 mt-4 rounded-b-xl justify-self-center">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 rounded-b-xl justify-self-center">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 mt-4 rounded-b-xl justify-self-center">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 mt-4 rounded-b-xl justify-self-center">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 rounded-b-xl justify-self-center">
          <img src="/assets/images/balloons-2.svg" class="h-16 lg:h-20 mt-4 rounded-b-xl justify-self-center">
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $('button.btn-alterar').click(function () {
    $('button.btn-alterar').css('display', 'none')
    $('button.btn-cancelar').css('display', 'inline-block')
    $('button.btn-salvar').css('display', 'inline-block')

    $('input[name="nome"]').removeAttr('readonly')
    $('input[name="cnpj"]').removeAttr('readonly')
    $('input[name="email"]').removeAttr('readonly')

    let nome = $('input[name="nome"]').val()
    let cnpj = $('input[name="cnpj"]').val()
    let email = $('input[name="email"]').val()
    
    $('button.btn-cancelar').click(function () {
      $('button.btn-alterar').css('display', 'inline-block')
      $('button.btn-cancelar').css('display', 'none')
      $('button.btn-salvar').css('display', 'none')

      $('input[name="nome"]').attr('readonly', 'readonly')
      $('input[name="cnpj"]').attr('readonly', 'readonly')
      $('input[name="email"]').attr('readonly', 'readonly')

      $('input[name="nome"]').val(nome)
      $('input[name="cnpj"]').val(cnpj)
      $('input[name="email"]').val(email)
    })
  })

  $('button.btn-salvar').click(async function () {
    let nome = $('input[name="nome"]').val()
    let cnpj = $('input[name="cnpj"]').val()
    let email = $('input[name="email"]').val()

    await $.ajax({
      'url': '/painel/perfil/atualizar-info',
      'data': {
        'nome': nome,
        'cnpj': cnpj,
        'email': email
      },
      'type': 'post',
      'dataType': 'json'
    })
    .done(function (data) {
      $('button.btn-alterar').css('display', 'inline-block')
      $('button.btn-cancelar').css('display', 'none')
      $('button.btn-salvar').css('display', 'none')

      $('input[name="nome"]').attr('readonly', 'readonly')
      $('input[name="cnpj"]').attr('readonly', 'readonly')
      $('input[name="email"]').attr('readonly', 'readonly')

      $('p.retorno').text(data.msg)
    })
    .catch(function (a) {
      console.log(a)
    })
  })

  function previewFile() {
    const preview = document.getElementById('pfp');
    const file = document.getElementById('fileInput').files[0];

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
          preview.src = reader.result;
          $('button.btn-cancelar-pfp').css('display', 'inline-block')
          $('button.btn-confirmar-pfp').removeAttr('disabled')
      }

      if (file) {
          reader.readAsDataURL(file);
      } else {
          preview.src = "/assets/images/test2.jpg";
      }
    }
  }

  $('button.btn-cancelar-pfp').click(function () {
    document.getElementById('pfp').src = "<?= $_SESSION['url_pfp'] ?>";
    $(this).css('display', 'none')
    $('#fileInput').val('')
    $('button.btn-confirmar-pfp').attr('disabled', 'disabled')
  })

  $('button.btn-confirmar-pfp').click(async function () {
    let form = new FormData()
    form.append('pfp', $('#fileInput')[0].files[0])

    await $.ajax({
      'url': '/painel/perfil/atualizar-pfp',
      'type': 'POST',
      'dataType': 'json',
      'contentType': false,
      'processData': false,
      'data': form
    }).done(function (data) {
      if (!data.ok) {
        document.getElementById('pfp').src = "<?= $_SESSION['url_pfp'] ?>";
      }
      $('button.btn-cancelar-pfp').css('display', 'none')
      $('#fileInput')[0].value = ''
      $('button.btn-confirmar-pfp').attr('disabled', 'disabled')
      $('p.retorno-pfp').text(data.msg)
    })
    .catch(function (a) {
      console.log(a)
    })
  })
</script>

<?php $this->renderView('modal', 'Admin/perfil') ?>