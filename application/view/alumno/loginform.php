<form action="<?=URL?>alumno/actionLogin" method="POST">
	<p>
	<label for="email">email</label>
		<input type="text" name="email">
	</p>
	<p>
	<label for="pass">password</label>
		<input type="password" name="pass">
	</p>
<input type="submit" value="Login">
<p>¿Eres Profesor? Accede <a href="<?=URL?>profesor/login">Aquí</a></p>
<p>¿Eres alumno y no tienes cuenta? Regístrate <a href="<?=URL?>alumno/register">Aquí</a></p>
</form>