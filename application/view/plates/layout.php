<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $titulo ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
</head>
<body>
    <!-- logo, check the CSS file for more info how the logo "image" is shown -->
    <div class="logo"></div>

    <!-- navigation -->
    <div class="navigation">
        <a href="<?php echo URL; ?>">home</a>
        <?php
        if (isset($_SESSION['user'])) { ?>
            <a href="<?=$_SESSION['user']->getLogoutURL(); ?>">Logout</a>
        <?php 
            if (get_class($_SESSION['user']) == 'Mini\Model\Profesor') { ?>
                <a href="<?=URL ?>post/crear">Crear Post</a>
                <a href="<?=URL ?>post">Todos los Post</a>
                <a href="<?=URL ?>post/index/<?=$_SESSION['user']->getEmail()?>">Mis Post</a>
            <?php
            }
        }else{ ?>
            <a href="<?=URL ?>alumno/login">Acceder Alumno</a>
            <a href="<?=URL ?>profesor/login">Aceder Profesor</a>

        <?php
        }
        ?>
    </div>


		<?=$this->section('content')?>


    <div class="footer">
        Project by <a href="https://github.com/Marsox">Marsox</a>
    </div>

    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>js/application.js"></script>
</body>
</html>