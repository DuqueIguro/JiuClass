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
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo ".." . DIRECTORY_SEPARATOR . "style" . DIRECTORY_SEPARATOR . "login.css"; ?>'>
    <script src='<?php echo "main.js"; ?>'></script>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src='<?php echo ".." . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "logo.png"; ?>' alt="Logo">
        </div>
        <form class="login-form" action="<?php echo ".." . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "index.php"; ?>" method="POST">
            <input type="text" placeholder="Insira seu e-mail/usuário..." class="input-field" name="username" required>
            <input type="password" placeholder="Insira sua senha..." class="input-field" name="password" required>
            <button type="submit" class="login-button">Entrar</button>
        </form>
        <p class="register-text">
            Ainda não é cadastrado? <a href='<?php echo ".." . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "criarconta.php"; ?>'>Criar conta!</a>
        </p>
    </div>
</body>

</html>
<?php
// Fechando o arquivo PHP, se necessário
?>
