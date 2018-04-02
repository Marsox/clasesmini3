<?php $this->layout('layout') ?>
<div class="container">
	<form action="<?=URL?>profesor/actionLogin" method="POST">
		<p>
			<label for="email">Email</label>
			<input type="text" name="email">
		</p>
		<p>
			<label for="pass">Password</label>
			<input type="password" name="pass">
		</p>
		<input type="submit" value="Login">
		<p>¿Eres Profesor y no tienes cuenta? Regístrate
			<a href="<?=URL?>profesor/register">Aquí</a>
		</p>
	</form>
</div>