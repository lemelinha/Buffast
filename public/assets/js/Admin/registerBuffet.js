const searchCities = async (callback) => {
    $('form select#cidade').prop("disabled", false);
    await fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${$('form select#uf').val()}/distritos`)
    .then(response => {
        if(!response.ok){
            return;
        }
        return response.json();
    })

    .then(cities => {
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

    callback();
}

$(document).ready(function () {
    fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados')
    .then(response => {
        if(!response.ok){
            return;
        }
        return response.json();
    })

    .then(states => {
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
    })
});

// colocar as cidades no select
$('form select#uf').change(searchCities);

// consulta do cep
$('form input#cep').change(function () {
    fetch(`https://viacep.com.br/ws/${$(this).val()}/json/`)
    .then(response => {
        if (!response.ok) {
          return;
        }
        return response.json();
    })

    .then(cep => {
        if(cep?.erro){
            throw new Error();
        }
        $('form select#uf').val(cep.uf);
        searchCities(function(){
            $('form select#cidade').val(cep.localidade);
            $('form input#bairro').val(cep.bairro);
            $('form input#rua').val(cep.logradouro);
        });
        $('form input#cep + p').remove();
    })

    .catch(() => {
        $('form input#cep + p').remove(); // remove se ja existe

        const p = document.createElement('p');
        p.textContent = 'Informe um CEP válido';
        p.style.color = '#fd2419';
        p.style.textAlign = 'center';
        $(this).parent().append(p);
    })
});
