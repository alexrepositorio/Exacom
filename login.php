<?php 
include("cabecera_login.php");
include("BL/usuarios_funciones.php");
if (isset($_POST["user"]) AND isset($_POST["pass"])) {
	validar($_POST["user"],$_POST["pass"]);
} 
else{
}

echo "<div id='maincontent' align='center' class='bodywidth clear'>";
echo "<br><br><div align=center><h2>¡Bienvenido!</h2><br>
<h4>para acceder debes introducir una cuenta de usuario</h4></div><br>";
echo "<form name=form action=".$_SERVER['PHP_SELF']." method='post'>
	<table >
		<tr>
			<td align=center><menuindex><h2>Usuario</td>
			<td align=center><menuindex><h2>Contraseña</td>
		</tr>";
echo "	<tr>
			<td align=center><input type='text' name=user></td>
			<td align=center><input type='password' name=pass></td>
		</tr>";
echo "
	</table><br>
	<input type='submit' value='Entrar' onclick='validar()'></form>
</div>
</div>
";
include("pie.php");
 ?>