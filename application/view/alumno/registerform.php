<form action="<?=URL?>alumno/actionRegister" method="POST">
	<p>
		<label for="nombre">nombre</label>
		<input type="text" name="nombre">
	</p>
	<p>
		<label for="apellidos">apellidos</label>
		<input type="text" name="apellidos">
	</p>
	<p>
		<label for="email">email</label>
		<input type="email" name="email">
	</p>
	<p>
		<label for="curso">curso</label>
		<input type="text" name="curso">
	</p>
	<p>
		<label for="pass">Contraseña</label>
		<input type="password" name="pass">
	</p>
	<p>
		<label for="pass2">Confirme contraseña</label>
		<input type="password" name="pass2">
	</p>
	<input type="submit" value="Registrarse">
<p>¿Ya tienes cuenta? Entra <a href="<?=URL?>alumno/login">Aquí</a></p>

</form>