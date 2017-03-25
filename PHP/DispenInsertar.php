<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Backend Máquina Expendedora</title>
<link rel="stylesheet" href="estilos.css"/>
</head>
<style>
	body {
		background-color: #cce6ff;
	}
</style>
<body>
	<h1>Backend Maquina Expendedora</h1>	
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
		
		$sql = "INSERT INTO productos (Nombre, Precio, Cantidad) VALUES ('".$_POST['nombre']."' , '".$_POST['precio']."' , '".$_POST['cantidad']."')";		
		
		// COMPROBACION QUERY (SI ESTA BIEN O DA ERROR)
		if ($conn->query($sql) === TRUE) {
			echo "<h3><br/><b>Nuevo dispensador insertado</b></h3><br/>";
		} else {
			echo "<h3>El dispensador introducido ya existe</h3>";
			echo "Error: " . $sql . "<br>" . $conn->error;
		}		
		$conn->close(); // cierre de conexión con la BBDD
	}
	?>
	
	<form action="DispenInsertar.php" method="Post">
	<h2>Introduccion de Nuevo Dispensador</h2>
		<p>Nombre del Dispensador: <input type="text" name="nombre" required/><br/></p>
		<p>Precio del Dispensador: <input type="number" name="precio" required/><br/></p>
		<p>Cantidad del Dispensador: <input type="number" name="cantidad" required/><br/></p>
		<p><input type="submit" name="enviar" value="Nuevo dispensador a introducir"/><br/><br/><br/></p>	
		<a href='DispenListado.php' class="dispensadores">Dispensadores</a><br><br><br/>
		<a href='MenuNavegacion.php'>Volver a Menu</a><br/><br/>
	</form>

</body>
</html>