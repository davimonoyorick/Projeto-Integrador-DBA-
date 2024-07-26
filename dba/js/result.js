document.addEventListener('DOMContentLoaded', () => {
    fetch('fetch_data.php')
        .then(response => response.json())
        .then(data => {
            console.log('Dados recebidos:', data); // Adicionado para depuração
            const dadosContainer = document.getElementById('dados');
            const searchInput = document.getElementById('searchInput');
            const bloodTypeSelect = document.getElementById('bloodTypeSelect');

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

            function updateDisplayedData() {
                const searchTerm = searchInput.value.toLowerCase();
                const bloodType = bloodTypeSelect.value;
                const filteredData = filterData(searchTerm, bloodType);
                let html = '';

                console.log('Dados filtrados:', filteredData); // Adicionado para depuração

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
                                    <button class="btn btn-warning btn-sm" onclick="editDoador(${item.id})">Editar</button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteDoador(${item.id})">Excluir</button>
                                </div>
                            </div>
                        </div>
                    `;
                });

                dadosContainer.innerHTML = html;
            }

            updateDisplayedData();
            searchInput.addEventListener('input', updateDisplayedData);
            bloodTypeSelect.addEventListener('change', updateDisplayedData);
        })
        .catch(error => console.error('Erro ao buscar dados:', error));
});

function editDoador(id) {
    window.location.href = `editar.php?id=${id}`;
}

function deleteDoador(id) {
    if (confirm('Tem certeza que deseja excluir este doador?')) {
        window.location.href = `excluir.php?id=${id}`;
    }
}
