<?php

require_once __DIR__ . '/../models/Aluno.php';
require_once __DIR__ . '/../models/TurmaMista.php';
require_once __DIR__ . '/../models/Kids.php';

$alunoModel      = new Aluno();
$alunos          = $alunoModel->getAll();
$turmaMistaModel = new TurmaMista();
$kidsModel       = new Kids();

include __DIR__ . '/../views/header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>


    <script>
        function toggleMenu() {
            document.getElementById("menu-list").classList.toggle("active");
        }
    </script>

    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-info"><?php echo htmlspecialchars($_GET['msg']); ?></div>
    <?php endif; ?>



    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
                <th>Contato</th>
                <th>Graduação</th>
                <th>Data de Graduação</th>
                <th>Turma Kids</th>
                <th>Turma Mista</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alunos as $aluno): ?>
                <?php 
                    $today     = new DateTime();
                    $birthDate = new DateTime($aluno['data_nascimento']);
                    $age       = $today->diff($birthDate)->y;
                ?>
                <tr>
                    <td><?php echo $aluno['id']; ?></td>
                    <td><?php echo $aluno['nome']; ?></td>
                    <td><?php echo $aluno['data_nascimento']; ?></td>
                    <td><?php echo $aluno['cpf']; ?></td>
                    <td><?php echo $aluno['contato']; ?></td>
                    <td><?php echo $aluno['graduacao']; ?></td>
                    <td><?php echo $aluno['data_graduacao']; ?></td>
                    <td>
                        <?php if ($age >= 16): ?>
                            <span class="text-danger">Não permitido (idade <?= $age ?>)</span>
                        <?php else: ?>
                            <?php if ($kidsModel->exists($aluno['id'])): ?>
                                Já na Kids
                            <?php else: ?>
                                <a href="add_turma.php?id=<?php echo $aluno['id']; ?>&type=kids" class="btn btn-sm btn-info">Adicionar na Kids</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($age < 16): ?>
                            <span class="text-danger">Não permitido (idade <?= $age ?>)</span>
                        <?php else: ?>
                            <?php if ($turmaMistaModel->exists($aluno['id'])): ?>
                                Já na Turma Mista
                            <?php else: ?>
                                <a href="add_turma.php?id=<?php echo $aluno['id']; ?>&type=mista" class="btn btn-sm btn-info">Adicionar na Turma Mista</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $aluno['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="delete.php?id=<?php echo $aluno['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este registro?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="mb-3">
        <a href="create.php" class="btn btn-primary">Adicionar Novo Aluno</a>
    </div>

    <div class="mb-3">
        <a href="turma_mista_view.php" class="btn btn-secondary">Ver Turma Mista</a>
        <a href="kids_view.php" class="btn btn-secondary">Ver Kids</a>
    </div>
</body>
</html>

<?php include __DIR__ . '/../views/footer.php'; ?>

<style>
    /* Centraliza os botões */
.mb-3 {
    display: flex;
    justify-content: center;
    gap: 15px; /* Espaçamento entre os botões */
}

/* Personaliza os botões */
.btn {
    background-color: #20c997 !important; /* Verde-água */
    color: white !important;
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: bold;
    text-decoration: none;
    transition: 0.3s ease-in-out;
    border: none;
}

/* Cor para os botões secundários */
.btn-secondary {
    background-color: #17a589 !important; /* Tom um pouco mais escuro de verde-água */
}

/* Efeito ao passar o mouse */
.btn:hover {
    background-color: #138d75 !important; /* Tom ainda mais escuro */
    transform: scale(1.05);
}

</style>