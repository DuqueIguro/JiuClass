document.addEventListener("DOMContentLoaded", function () {
    setupMenuToggle();
    setupModalHandlers();
    setupLogoRedirect();
});

// Alterna o menu suspenso ao clicar no ícone
function setupMenuToggle() {
    const menuIcon = document.querySelector(".menu-icon");
    const menuList = document.querySelector("#menu-list");

    menuIcon.addEventListener("click", function () {
        menuList.classList.toggle("active");
    });

    // Fecha o menu ao clicar fora dele
    document.addEventListener("click", function (event) {
        if (!menuIcon.contains(event.target) && !menuList.contains(event.target)) {
            menuList.classList.remove("active");
        }
    });
}

// Função para redirecionar ao clicar na logo
function setupLogoRedirect() {
    const logo = document.getElementById("logo");
    if (logo) {
        logo.addEventListener("click", function () {
            window.location.href = "/jiuclass/pages/inicio.php";
        });
    }
}

// Selecionar elementos do DOM
const modal = document.getElementById("create-room-modal");
const roomFormModal = document.getElementById("room-form-modal");
const addButton = document.querySelector(".add-button");
const roomContainer = document.getElementById("room-container");
const noRoomsMessage = document.getElementById("no-rooms-message");

// Função para abrir o modal de confirmação
window.openModal = function () {
    modal.classList.add("visible");
    addButton.classList.add("disable-animations"); // Desabilita animações
};

// Função para fechar o modal de confirmação
window.closeModal = function () {
    modal.classList.remove("visible");
    addButton.classList.remove("disable-animations"); // Reabilita animações
};

// Função para confirmar criação da sala e abrir o formulário
window.confirmCreation = function () {
    closeModal();
    openRoomForm();
};

// Função para abrir o formulário de criação de sala
window.openRoomForm = function () {
    roomFormModal.classList.add("visible");
};

// Função para fechar o formulário de criação de sala
window.closeRoomForm = function () {
    roomFormModal.classList.remove("visible");
};

// Função para criar a sala e exibi-la na interface
window.createRoom = function (event) {
    event.preventDefault();

    // Obter valores do formulário
    const roomName = document.getElementById("room-name").value.trim();
    const maxStudents = document.getElementById("max-students").value;
    const ageRange = document.getElementById("age-range").value;

    if (roomName === "" || maxStudents === "" || ageRange === "") {
        alert("Preencha todos os campos!");
        return;
    }

    // Criar elemento da sala
    const roomCard = document.createElement("div");
    roomCard.classList.add("room-card");
    roomCard.innerHTML = `
        <h3>${roomName}</h3>
        <p id="student-count">${maxStudents} Alunos</p>
        <a href="/jiuclass/pages/listaalunos.php">Lista de Alunos</a>
    `;

    // Adicionar sala ao container
    roomContainer.appendChild(roomCard);

    // Remover mensagem inicial caso seja a primeira sala
    if (roomContainer.children.length > 0) {
        noRoomsMessage.style.display = "none";
    }

    // Fechar o formulário
    closeRoomForm();

    // Resetar o formulário
    document.getElementById("room-form").reset();
};

// Evento de submissão do formulário
document.getElementById("room-form").addEventListener("submit", createRoom);
