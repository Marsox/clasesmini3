<div class="container">
	<h2>Todos las Posts</h2>
	<?php if(count($posts) == 0) { ?>
		<p>No hay posts en la Base de Datos</p>
	<?php } else { ?>
		<p>Tenemos <?= count($posts) ?> posts encontrados:</p>

		<?php foreach ($posts as $post) { ?>
			<h3><?= $post->getTitulo() ?></h3>
			<p><?= $post->getCuerpo() ?></p>
			<!-- echo $post->titulo ?>  -->
			<a href="<?php echo URL; ?>post/detalle/<?= $post->getId() ?>">[ Ver más... ]</a>
		<?php } ?>
	<?php } ?>
</div>