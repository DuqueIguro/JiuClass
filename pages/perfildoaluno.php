<?php
// Iniciando o arquivo PHP
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>JiuClass</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo ".." . DIRECTORY_SEPARATOR . "style" . DIRECTORY_SEPARATOR . "perfil.css"; ?>'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo ".." . DIRECTORY_SEPARATOR . "style" . DIRECTORY_SEPARATOR . "navbar.css"; ?>'>
    <script src='<?php echo ".." . DIRECTORY_SEPARATOR . "scripts" . DIRECTORY_SEPARATOR . "main.js"; ?>'></script>
</head>
<body>
    <header>

        <div id="nav">
           <a href='<?php echo ".." . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "inicio.php"; ?>'><img src='<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "logo.png"; ?>' alt="JiuClass Logo" id="logo"></a> 
            <h1>JiuClass</h1>
            
            <div class="menu-icon" onclick="toggleMenu()">☰</div>
        
            <!-- Menu suspenso -->
            <ul id="menu-list">
                <li><a href='<?php echo "perfildoaluno.php"; ?>'>Perfil do Aluno</a></li>
                <li><a href='<?php echo "listaAlunos.php"; ?>'>Lista de Alunos</a></li>
            </ul>
        </div>

    </header>
    <main>
        <div class="profile">
            <div class="profile-picture">
                <img src='<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "fotinhadeperfil.png"; ?>' alt="Foto do Usuário" class="user-photo">
                <img src='<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "faixamarromm.png"; ?>' alt="Faixa 4º Grau" class="belt-overlay">
            </div>
            <p class="rank">4° Grau</p>
            <h2>Francisco Alves da Silva</h2>
            <button class="promote">&#8679; Promover</button>
            <div class="info">
                <p><strong>Turma:</strong> Turma Aberta - Regular</p>
                <p><strong>Data de Nascimento:</strong> 07/09/2000</p>
                <p><strong>Última Graduação:</strong> 30/03/2023</p>
                <p><strong>Telefone:</strong> +55 (88) 94002-8922</p>
                <p><strong>Email:</strong> zebananhia@gmail.com</p>
                <p><strong>CPF:</strong> 123.456.789-00</p>
                <label for="notes"><strong>Anotações:</strong></label>
                <textarea id="notes" placeholder="Anotações do professor..."></textarea>
            </div>
            <button class="edit">Editar perfil &#9998;</button>
        </div>
    </main>
</body>
</html>
<?php
// Fechando o arquivo PHP, se necessário
?>
