<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Aurora Notícias - Informação com Imparcialidade</title>
        <link rel="shortcut icon" href="http://auroranoticias.com.br/news/assets/imgs/logo.png" />
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

        <link href="<?php echo base_url('assets/css/estilo-login.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>      

    </head>
    <body>

        <div class="container">
            <div class="card card-container">
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <img id="profile-img" class="profile-img-card" src="<?php echo base_url('assets/imgs/ico-login.png'); ?>" />
                <form class="form-signin" method="post" action="<?= base_url('admin/login/autenticar') ?>">
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="usuario" required autofocus>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Senha" name="senha" required>                
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
                </form><!-- /form -->
                <a href="login/esqueceuSenha" class="forgot-password">
                    Esqueceu a senha?
                </a>
            </div>
        </div>
    </body>
</html>

