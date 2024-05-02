$(document).ready(async function () {
    var res = await fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
    states = await res.json();
    states = states.sort((a, b) => { // ordenando pela sigla
        if (a.sigla < b.sigla) {
          return -1;
        }
    });

    states.map(state => {
        const option = document.createElement('option');
        option.setAttribute('value', state.sigla);
        option.textContent = state.nome;

        $('select#uf').append(option);
    });
});

// colocar as cidades no select
$('form select#uf').on('change', async function () {
    $('form select#cidade').prop( "disabled", false );

    var URL = 'https://servicodados.ibge.gov.br/api/v1/localidades/distritos';
    if ($('form select#uf').val() != ''){
        URL = `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${$('form select#uf').val()}/distritos`;
    }
    
    var res = await fetch(URL);
    
    cities = await res.json();
    cities = cities.sort((a, b) => { // ordenando pelo nome
        if (a.nome < b.nome) {
            return -1;
        }
    });
    
    $('select#cidade').empty();
    cities.map(city => {
        const option = document.createElement('option');
        option.setAttribute('value', city.nome);
        option.textContent = city.nome;

        $('select#cidade').append(option);
    });
});

$('form input#cep').on('change', function () {

});
