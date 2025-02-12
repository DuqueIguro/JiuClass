<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>CRUD Jiujitsu</title>
    <!-- Link para Bootstrap (opcional para melhor aparência) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<nav id="nav">
        <div id="logo">
            <img src="...\img\logo.png" alt="img">
        </div>
        <h1>Gestão de Alunos</h1>
        <div class="menu-icon" onclick="toggleMenu()">☰</div>
        <ul id="menu-list">
            <li><a href="index.php">Início</a></li>
            <li><a href="create.php">Adicionar Aluno</a></li>
            <li><a href="turma_mista_view.php">Turma Mista</a></li>
            <li><a href="kids_view.php">Turma Kids</a></li>
        </ul>
    </nav>

    <style>
    /* Funções universais*/
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Corpo */
body {
    font-family: Arial, Helvetica, sans-serif;
}

/* NavBar*/
#nav {
    background-color: #0B9504;
    height: 60px;
    width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
    padding: 0 20px;
    
}

#logo {
    padding-left: 10px;
}

.menu-icon {
    cursor: pointer;
    color: white;
    font-size: 40px;
}

#nav h1 {
    color: white;
    font-family: sans-serif;
    align-content: center;
}

/* Menu suspenso */
#menu-list {
    display: none;
    position: absolute;
    top: 60px;
    right: 20px;
    background-color: white;
    list-style: none;
    padding: 0;
    margin: 0;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    width: 180px;
}

#menu-list li {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

#menu-list li:last-child {
    border-bottom: none;
}

#menu-list li a {
    text-decoration: none;
    color: black;
    display: block;
}

/* Mostrar o menu quando a classe "active" for adicionada */
#menu-list.active {
    display: block;
}

#nav img{
    height: 65px;
}
</style>