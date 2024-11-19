// Selecionar elementos do DOM
const modal = document.getElementById("create-room-modal");
const addButton = document.querySelector(".add-button");

// Função para abrir o modal
function openModal() {
    modal.classList.add("visible");
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