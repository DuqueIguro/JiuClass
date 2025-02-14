<?php
// Iniciando o arquivo PHP
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>JiuClass</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Incluindo arquivos de estilo -->
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo ".." . DIRECTORY_SEPARATOR . "style" . DIRECTORY_SEPARATOR . "style.css"; ?>'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo ".." . DIRECTORY_SEPARATOR . "style" . DIRECTORY_SEPARATOR . "navbar.css"; ?>'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo ".." . DIRECTORY_SEPARATOR . "style" . DIRECTORY_SEPARATOR . "listaAlunos.css"; ?>'>
    <script src='<?php echo ".." . DIRECTORY_SEPARATOR . "scripts" . DIRECTORY_SEPARATOR . "main.js"; ?>'></script>
</head>

<body>

    <header>

        <div id="nav">
            <a href="<?php echo ".." . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "inicio.php"; ?>"><img src="<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "logo.png"; ?>" alt="JiuClass Logo" id="logo"></a>
            <h1>JiuClass</h1>

            <div class="menu-icon" onclick="toggleMenu()">☰</div>

            <!-- Menu suspenso -->
            <ul id="menu-list">
                <li><a href="<?php echo ".." . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "perfildoaluno.php"; ?>">Perfil do Aluno</a></li>
                <li><a href="<?php echo ".." . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "listaAlunos.php"; ?>">Lista de Alunos</a></li>
            </ul>
        </div>

    </header>

    <main class="main-container">

        <h1>Turma Aberta</h1>
        <div class="buttons">
            <button class="register">Registrar aula</button>
            <button class="add-student">Cadastrar aluno</button>
        </div>
        <div class="student-list">
            <div class="student-card">
                <span>Adalberto</span>
                <img src="<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "faixaazul.png"; ?>" alt="Faixa Azul" class="faixa">
                <span>13/15</span>
            </div>
            <div class="student-card">
                <span>Assis</span>
                <img src="<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "faixaroxa.png"; ?>" alt="Faixa Roxa" class="faixa">
                <span>15/15</span>
            </div>
            <div class="student-card">
                <span>Breno</span>
                <img src="<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "faixaazul.png"; ?>" alt="Faixa Azul" class="faixa">
                <span>11/15</span>
            </div>

            <a href="<?php echo ".." . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "perfildoaluno.php"; ?>">
                <div class="student-card">
                    <span>Francisco</span>
                    <img src="<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "faixamarrom.png"; ?>" alt="Faixa Marrom" class="faixa">
                    <span>11/15</span>
                </div>
            </a>

            <div class="student-card">
                <span>Guilherme</span>
                <img src="<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "faixaazul.png"; ?>" alt="Faixa Azul" class="faixa">
                <span>11/15</span>
            </div>
            <div class="student-card">
                <span>Marcos</span>
                <img src="<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "faixaazul.png"; ?>" alt="Faixa Azul" class="faixa">
                <span>15/15</span>
            </div>
            <div class="student-card">
                <span>Felipe</span>
                <img src="<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "faixaazul.png"; ?>" alt="Faixa Azul" class="faixa">
                <span>02/15</span>
            </div>
            <div class="student-card">
                <span>Murilo</span>
                <img src="<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "faixaroxa.png"; ?>" alt="Faixa Roxa" class="faixa">
                <span>15/15</span>
            </div>
        </div>

        <button class="add-button" onclick="openModal()">+</button>

        <div id="create-room-modal" class="modal hidden">
            <div class="modal-content">
                <h3>DESEJA CRIAR UMA SALA?</h3>
                <div class="modal-buttons">
                    <button class="btn-sim" onclick="confirmCreation()">SIM</button>
                    <button class="btn-nao" onclick="closeModal()">NÃO</button>
                </div>
            </div>
        </div>
    </main>

    <div id="room-form-modal" class="modal hidden">
        <div class="form-content">
            <button class="close-form" onclick="closeRoomForm()">✖</button>
            <h3>Informações da Sala</h3>
            <form id="room-form">
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

</body>

</html>
<?php
// Fechando o arquivo PHP, se necessário
?>
