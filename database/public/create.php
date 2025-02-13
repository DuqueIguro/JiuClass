<?php

require_once __DIR__ . '/../models/Aluno.php';

$alunoModel = new Aluno();

// Lista de faixas do Jiu-Jitsu
$faixas_jiujitsu = [
    'Branca', 'Cinza', 'Amarela', 'Laranja', 'Verde', 
    'Azul', 'Roxa', 'Marrom', 'Preta', 'Coral', 'Vermelha'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitização do CPF (remove caracteres não numéricos)
    $cpf = preg_replace('/\D/', '', $_POST['cpf']);

    // Sanitização do telefone (remove caracteres não numéricos)
    $contato = preg_replace('/\D/', '', $_POST['contato']);

    $data = [
        'nome' => $_POST['nome'],
        'data_nascimento' => $_POST['data_nascimento'],
        'cpf' => $cpf,
        'contato' => $contato,
        'graduacao' => $_POST['graduacao'],
        'data_graduacao' => $_POST['data_graduacao']
    ];
    
    $alunoModel->create($data);
    header("Location: index.php");
    exit;
}

include __DIR__ . '/../views/header.php';
?>

<h2>Adicionar Novo Aluno</h2>

<form method="post" action="">
    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Data de Nascimento:</label>
        <input type="date" name="data_nascimento" class="form-control" required>
    </div>
    <div class="form-group">
        <label>CPF:</label>
        <input type="text" name="cpf" class="form-control cpf-mask" required>
    </div>
    <div class="form-group">
        <label>Contato:</label>
        <input type="text" name="contato" class="form-control phone-mask" required>
    </div>
    <div class="form-group">
        <label>Graduação:</label>
        <select name="graduacao" class="form-control" required>
            <option value="">Selecione a faixa</option>
            <?php foreach ($faixas_jiujitsu as $faixa): ?>
                <option value="<?= htmlspecialchars($faixa) ?>"><?= htmlspecialchars($faixa) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Data de Graduação:</label>
        <input type="date" name="data_graduacao" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
</form>

<script>
    // Máscara de CPF (000.000.000-00)
    document.addEventListener("DOMContentLoaded", function() {
        const cpfInput = document.querySelector(".cpf-mask");
        cpfInput.addEventListener("input", function(e) {
            let value = e.target.value.replace(/\D/g, ""); // Remove tudo que não for número
            if (value.length > 3) value = value.replace(/^(\d{3})(\d)/, "$1.$2");
            if (value.length > 6) value = value.replace(/^(\d{3})\.(\d{3})(\d)/, "$1.$2.$3");
            if (value.length > 9) value = value.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/, "$1.$2.$3-$4");
            e.target.value = value;
        });

        // Máscara de telefone (XX) X XXXX-XXXX
        const phoneInput = document.querySelector(".phone-mask");
        phoneInput.addEventListener("input", function(e) {
            let value = e.target.value.replace(/\D/g, ""); // Remove tudo que não for número
            if (value.length > 2) value = value.replace(/^(\d{2})(\d)/, "($1) $2");
            if (value.length > 7) value = value.replace(/^(\(\d{2}\))\s(\d{1})(\d{4})(\d)/, "$1 $2 $3-$4");
            e.target.value = value;
        });
    });
</script>

<?php include __DIR__ . '/../views/footer.php'; ?>
