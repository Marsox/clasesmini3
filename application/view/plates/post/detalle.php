<?php $this->layout('layout');
use Mini\Model\Profesor;
use Mini\Model\Categoria;?> 

<div class="container">
	<img src="<?= $post->getUrlImagen() ?>" style="width: 500px">
	<h3>Titulo: <?= $post->getTitulo() ?></h3>
	<p>Categoria: <?=Categoria::getById($post->categoria)->nombre ?></p>
	<p>Cuerpo: <?= $post->getCuerpo() ?></p>
	<p>Autor: <?= Profesor::getByEmail($post->emailAuthor)->getNombre().' '.Profesor::getByEmail($post->emailAuthor)->getApellidos() ?></p>
	<p>Creado el: <?= date('d/m/Y', $post->getFecha())  ?></p>
	<?php if($post->getEmailAuthor() == $_SESSION['user']->getEmail()){?>
		<a href="<?php echo URL; ?>post/editar/<?= $post->getId() ?>">[ Editar ]</a>
		<a href="<?php echo URL; ?>post/borrar/<?= $post->getId() ?>">[ Borrar ]</a>
	<?php }?>
</div>
