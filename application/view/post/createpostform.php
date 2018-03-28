<?php 

$actionUrl = (isset($post)) ? 'actionEditar/'.$post->getId() : 'actionCrear';
$titulo = (isset($post)) ? $post->getTitulo() : '';
$cuerpo = (isset($post)) ? $post->getCuerpo() : '';
$urlImagen = (isset($post)) ? $post->getUrlImagen() : '';

$submitText = (isset($post)) ? "Crear" : "Guardar";
?>


<div class="container">
<form action="<?=URL?>post/<?=$actionUrl?>" method="POST">
	<p>
	<label for="titulo">Titulo</label>
		<input type="text" name="titulo" value="<?=$titulo?>">
	</p>
	<p>
	<label for="cuerpo">Cuerpo</label>
		<textarea name="cuerpo"><?=$cuerpo?></textarea>
	</p>
	<p>
	<label for="urlImagen">Imagen</label>
		<input type="text" name="urlImagen" value="<?=$urlImagen?>">
	</p>
	<input type="submit" value="<?=$submitText?>">
</form>
</div>