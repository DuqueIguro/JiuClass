// Selecionar elementos do DOM
const modal = document.getElementById("create-room-modal");
const addButton = document.querySelector(".add-button");

// Função para abrir o modal
function openModal() {
    modal.classList.add("visible");
    // while (condition) {
        
    // }
    addButton.classList.add("disable-animations"); // Desabilita animações
}

// Função para fechar o modal
function closeModal() {
    
    modal.classList.remove("visible");
    addButton.classList.remove("disable-animations"); // Reabilita animações
}

// Função para confirmar criação da sala
function confirmCreation() {
    alert("Sala criada com sucesso!");
    closeModal();
}
// Selecionar elementos do DOM
const roomFormModal = document.getElementById("room-form-modal");

// Função para abrir o formulário de criação de sala
function openRoomForm() {
    roomFormModal.classList.add("visible");
}

// Função para fechar o formulário de criação de sala
function closeRoomForm() {
    roomFormModal.classList.remove("visible");
}

// Adicionar evento ao botão SIM para abrir o formulário
function confirmCreation() {
    closeModal(); 
    openRoomForm(); 
}

// Lógica de submissão do formulário
document.getElementById("room-form").addEventListener("submit", function (event) {
    event.preventDefault();

    // Obter valores do formulário
    const roomName = document.getElementById("room-name").value;
    const maxStudents = document.getElementById("max-students").value;
    const ageRange = document.getElementById("age-range").value;

    // Exibir mensagem ou salvar dados
    alert(`Sala "${roomName}" criada com sucesso!\nMáx. de alunos: ${maxStudents}\nFaixa etária: ${ageRange}`);

    // Fechar o formulário
    closeRoomForm();
});