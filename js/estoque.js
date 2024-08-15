document.addEventListener('DOMContentLoaded', () => {
    fetch('fetch_data.php')
        .then(response => response.json())
        .then(data => {
            console.log('Dados recebidos:', data);
            const estoqueContainer = document.getElementById('estoque');

            let html = '';
            data.forEach(item => {
                html += `
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                ${item.doador_nome} <!-- Nome do doador exibido aqui -->
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"<strong>Tipo de sangue</strong> : ${item.estoque_tipo_sangue}</h5> <!-- Tipo de sangue em destaque -->
                                <p class="card-text"><strong>Quantidade:</strong> ${item.quantidade} bolsas</p>
                            </div>
                        </div>
                    </div>`;
            });

            estoqueContainer.innerHTML = html;
        })
        .catch(error => console.error('Erro ao buscar dados:', error));
});
