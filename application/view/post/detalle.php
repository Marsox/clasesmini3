<?php use Mini\Model\Profesor;?>

<img src="<?= $post->urlImagen ?>" style="width: 500px">
<h3>Titulo: <?= $post->titulo ?></h3>
<p>Cuerpo: <?= $post->cuerpo ?></p>
<p>Autor: <?= Profesor::getByEmail($post->emailAuthor)->getNombre().' '.Profesor::getByEmail($post->emailAuthor)->getApellidos() ?></p>
