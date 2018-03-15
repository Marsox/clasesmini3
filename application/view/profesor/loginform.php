<form action="<?=URL?>profesor/actionLogin" method="POST">
	<p>
	<label for="email">email</label>
		<input type="text" name="email">
	</p>
	<p>
	<label for="pass">password</label>
		<input type="password" name="pass">
	</p>
<input type="submit" value="Login">
<p>¿Eres Alumno? Accede <a href="<?=URL?>alumno/login">Aquí</a></p>
<p>¿Eres Profesor y no tienes cuenta? Regístrate <a href="<?=URL?>profesor/register">Aquí</a></p>
</form>