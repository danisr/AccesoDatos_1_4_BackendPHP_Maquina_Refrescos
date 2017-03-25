<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Backend Máquina Expendedora</title>
<link rel="stylesheet"  href="estilos.css"/>
</head>
<style>
	body {
		background-color: #cce6ff;
	}
</style>
<body>
	<h1>Backend Maquina Expendedora</h1>
	<h2>Modificacion de Dispensadores</h2>	
	<?php
		if (isset($_POST ["enviar"])) {
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "maqexp";
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Check connection
			if ($conn->connect_error) {
				die("Error: " . $conn->connect_error);
			}

			// UPDATE
			$sql = "UPDATE productos SET Nombre='".$_POST["nombre"]."', Precio='".$_POST["precio"]."', Cantidad='".$_POST["cantidad"]."' WHERE Nombre='".$_POST["nombre"]."'";
			$result = $conn->query($sql);
			echo "<h3><b>El dispensador se ha modificado</b></h3><br/>";		
			
			if ($conn->query($sql) === FALSE) {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	?>
	<form action="DispenModificar.php" method="post">
	<p>Nombre del Dispensador: <input type="text" name="nombre" required/><br/></p>
	<p>Precio del Dispensador: <input type="number" name="precio" required/><br/></p>
	<p>Cantidad del Dispensador: <input type="number" name="cantidad" required/><br/></p>
	<p><input type="submit" name="enviar" value="Dispensador a modificar"/><br/><br/><br/></p>	
	<a href='DispenListado.php' class="dispensadores">Dispensadores</a><br><br><br/>	
	<a href='MenuNavegacion.php'>Volver a Menu</a><br/><br/>
	</form>	
</body>
</html>