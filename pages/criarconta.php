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
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo ".." . DIRECTORY_SEPARATOR . "style" . DIRECTORY_SEPARATOR . "criarconta.css"; ?>'>
    <script src='<?php echo ".." . DIRECTORY_SEPARATOR . "scripts" . DIRECTORY_SEPARATOR . "main.js"; ?>'></script>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src='<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "logo.png"; ?>' alt="Logo">
        </div>
        <h2>Criar Conta</h2>
        <form action="<?php echo "/criar-conta"; ?>" method="post">
            <div class="form-group">
                <input type="text" name="nome" placeholder="Insira seu nome completo..." required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Insira seu e-mail..." required>
            </div>
            <div class="form-group">
                <input type="password" name="senha" placeholder="Insira sua senha..." required>
            </div>
            <div class="form-group">
                <input type="password" name="confirmar_senha" placeholder="Confirme sua senha..." required>
            </div>
            <button type="submit" class="btn">Criar Conta</button>
        </form>
        <a href='<?php echo "login.php"; ?>' class="link-voltar">Voltar para Login</a>
    </div>
</body>

</html>
<?php
// Fechando o arquivo PHP, se necessário
?>
