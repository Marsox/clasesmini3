<?php $this->layout('layout') ?>
<?php  use Mini\Model\Profesor;?> 

<div class="container">
	<img src="<?= $post->getUrlImagen() ?>" style="width: 500px">
	<h3>Titulo: <?= $post->getTitulo() ?></h3>
	<p>Cuerpo: <?= $post->getCuerpo() ?></p>
	<p>Autor: <?= Profesor::getByEmail($post->emailAuthor)->getNombre().' '.Profesor::getByEmail($post->emailAuthor)->getApellidos() ?></p>
	<p>Creado el: <?= date('d/m/Y', $post->getFecha())  ?></p>
	<?php if($post->getEmailAuthor() == $_SESSION['user']->getEmail()){?>
		<a href="<?php echo URL; ?>post/editar/<?= $post->getId() ?>">[ Editar ]</a>
		<a href="<?php echo URL; ?>post/borrar/<?= $post->getId() ?>">[ Borrar ]</a>
	<?php }?>
</div>
