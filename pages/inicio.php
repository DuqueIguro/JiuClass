<?php
session_start();

// Simulação de verificação de salas criadas
$temSalas = false; // Altere para true se houver salas

// Lista de páginas do menu
$menuItems = [
    "Perfil do Aluno" => "perfildoaluno.php",
    "Lista de Alunos" => "listaalunos.php",
    "Gerenciar Salas" => "gerenciarsalas.php"
];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JiuClass</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/navbar.css">
    <script src="../scripts/main.js" defer></script>
</head>
<body>
    <header>
        <div id="nav">
            <img src="../img/logo.png" alt="JiuClass Logo" id="logo">
            <h1>JiuClass</h1>
            <div class="menu-icon" onclick="toggleMenu()">☰</div>
            <!-- Menu suspenso gerado dinamicamente -->
            <ul id="menu-list">
                <?php foreach ($menuItems as $label => $link): ?>
                    <li><a href="<?= htmlspecialchars($link) ?>"><?= htmlspecialchars($label) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </header>

    <main class="main-container">
        <blockquote class="quote">
            “Uma alma sem respeito é uma morada em ruínas. <br>
            Deve ser demolida para construir uma nova.”
        </blockquote>

        <?php if (!$temSalas): ?>
            <div class="sem-sala" id="no-rooms-message">
                <h3>Você ainda não possui salas criadas</h3>
                <div class="t-sem-sala">
                    <p>Clique no “+” no canto inferior direito <br> para criar uma sala</p>
                </div>
            </div>
        <?php endif; ?>

        <!-- Contêiner para exibir as salas criadas -->
        <div id="room-container" class="room-container"></div>
        <button class="add-button" onclick="openModal()">+</button>

        <!-- Modal de confirmação -->
        <div id="create-room-modal" class="modal hidden">
            <div class="modal-content">
                <h3>DESEJA CRIAR UMA SALA?</h3>
                <div class="modal-buttons">
                    <button class="btn-sim" onclick="confirmCreation()">SIM</button>
                    <button class="btn-nao" onclick="closeModal()">NÃO</button>
                </div>
            </div>
        </div>

        <!-- Modal do formulário -->
        <div id="room-form-modal" class="modal hidden">
            <div class="form-content">
                <button class="close-form" onclick="closeRoomForm()">✖</button>
                <h3>Informações da Sala</h3>
                <form action="criarSala.php" method="POST" id="room-form">
                    <label for="room-name">Nome da sala:</label>
                    <input type="text" id="room-name" name="room-name" required>

                    <label for="max-students">Máx. de alunos:</label>
                    <input type="number" id="max-students" name="max-students" required>

                    <label for="age-range">Faixa etária:</label>
                    <input type="text" id="age-range" name="age-range" required>

                    <button type="submit" class="btn-create">CRIAR SALA</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
