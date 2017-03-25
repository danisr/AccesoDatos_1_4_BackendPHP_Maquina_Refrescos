<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Backend Máquina Expendedora</title>
<link rel="stylesheet" href="estilos.css"/>
</head>
<style>
	body {
		background-color: #ffffcc;
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
		
		$sql = "INSERT INTO monedas (Nombre, Valor, Cantidad) VALUES ('".$_POST['nombre']."' , '".$_POST['valor']."' , '".$_POST['cantidad']."')";		
		
		// COMPROBACION QUERY (SI ESTA BIEN O DA ERROR)
		if ($conn->query($sql) === TRUE) {
			echo "<br/><h3><b>Nuevo deposito insertado</b></h3><br/>";
		} else {
			echo "<h3>El deposito introducido ya existe</h3>";
			echo "Error: " . $sql . "<br>" . $conn->error;
		}		
		$conn->close(); // cierre de conexión con la BBDD
	}
	?>
	
	<form action="DepInsertar.php" method="Post">
	<h2>Introduccion de Nuevo Deposito</h2>
		<p>Nombre del Deposito: <input type="text" name="nombre" required/><br/></p>
		<p>Precio del Deposito: <input type="number" name="valor" required/><br/></p>
		<p>Cantidad del Deposito: <input type="number" name="cantidad" required/><br/></p>
		<p><input type="submit" name="enviar" value="Nuevo deposito a introducir"/><br/><br/><br/></p>	
		<a href='DepListado.php' class="depositos">Depositos</a><br/><br/><br/>
		<a href='MenuNavegacion.php'>Volver a Menu</a><br/><br/>
	</form>
</body>
</html>