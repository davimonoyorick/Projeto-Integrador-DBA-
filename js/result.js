document.addEventListener('DOMContentLoaded', () => {
    fetch('fetch_data.php')
        .then(response => response.json())
        .then(data => {
            const dadosContainer = document.getElementById('dados');
            const searchInput = document.getElementById('searchInput');
            const bloodTypeSelect = document.getElementById('bloodTypeSelect');

            // Função para filtrar os dados conforme o input de pesquisa e o tipo de sangue
            function filterData(searchTerm, bloodType) {
                return data.filter(item => {
                    const matchesSearchTerm = (
                        item.first_name.toLowerCase().includes(searchTerm) ||
                        item.last_name.toLowerCase().includes(searchTerm) ||
                        item.cpf.includes(searchTerm) ||
                        item.rg.includes(searchTerm) ||
                        item.phone.includes(searchTerm) ||
                        item.email.toLowerCase().includes(searchTerm) ||
                        item.tipo_sangue.toLowerCase().includes(searchTerm)
                    );

                    const matchesBloodType = bloodType ? item.tipo_sangue === bloodType : true;

                    return matchesSearchTerm && matchesBloodType;
                });
            }

            // Função para atualizar os dados exibidos com base no termo de pesquisa e no tipo de sangue
            function updateDisplayedData() {
                const searchTerm = searchInput.value.toLowerCase();
                const bloodType = bloodTypeSelect.value;
                const filteredData = filterData(searchTerm, bloodType);
                let html = '';

                filteredData.forEach(item => {
                    html += `
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">${item.first_name} ${item.last_name}</h5>
                                    <p class="card-text"><strong>Data de Nascimento:</strong> ${item.data_nascimento}</p>
                                    <p class="card-text"><strong>Sexo:</strong> ${item.sexo}</p>
                                    <p class="card-text"><strong>Tipo Sanguíneo:</strong> ${item.tipo_sangue}</p>
                                    <p class="card-text"><strong>Telefone:</strong> ${item.phone}</p>
                                    <p class="card-text"><strong>Email:</strong> ${item.email}</p>
                                    <p class="card-text"><strong>RG:</strong> ${item.rg}</p>
                                    <p class="card-text"><strong>CPF:</strong> ${item.cpf}</p>
                                </div>
                            </div>
                        </div>
                    `;
                });

                dadosContainer.innerHTML = html;
            }

            // Inicializa os dados exibidos
            updateDisplayedData();

            // Evento de input para o campo de pesquisa
            searchInput.addEventListener('input', updateDisplayedData);

            // Evento de mudança para o campo de seleção de tipo de sangue
            bloodTypeSelect.addEventListener('change', updateDisplayedData);
        })
        .catch(error => console.error('Erro ao buscar dados:', error));
});
