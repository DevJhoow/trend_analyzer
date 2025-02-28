 // Quando o formulário for enviado, vamos pegar a palavra-chave
 document.getElementById('formPalavra').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const palavra = document.getElementById('palavra').value; //valor do input
    
    // Adicionar a palavra-chave à lista
    const listaPalavras = document.getElementById('listaPalavras');
    const li = document.createElement('li');
    li.textContent = palavra;
    listaPalavras.appendChild(li);
    
    // Chamar a API para buscar as tendências
    fetchTendencias(palavra);
});

// Função para buscar as tendências usando uma API (simulei uma api)
function fetchTendencias(palavra) {
    // Simulando uma resposta da API com dados fictícios
    const dadosAPI = {
        meses: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        datasets: [{
            label: `Tendência de "${palavra}"`,
            data: [10, 20, 30, 25, 40, 35, 10, 20, 30, 25, 40, 35], // Valores simulando a frequencia da palavra usada 
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            fill: true
        }]
    };

    // Atualizar o gráfico com os novos dados
    criarGrafico(dadosAPI);
}

// Função para criar o gráfico de tendências baseado nos valores simulados na frequencia 
function criarGrafico(dados) {
    const ctx = document.getElementById('graficoTendencias').getContext('2d');
    if (window.grafico) {
        window.grafico.destroy(); // Destruir o gráfico anterior, se existir
    }

    window.grafico = new Chart(ctx, {
        type: 'line',
        data: dados, // valoeres simulados 
        options: {
            responsive: true,
            scales: {
                x: { //horizontal 
                    title: {
                        display: true,
                        text: 'Meses'
                    }
                },
                y: { //vertical 
                    title: {
                        display: true,
                        text: 'Volume de Pesquisa'
                    }
                }
            }
        }
    });
}