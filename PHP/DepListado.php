<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>Backend Maquina Expendedora</title>
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
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "maqexp";
	$conn = new mysqli($servername, $username, $password, $dbname);
		
	if ($conn->connect_error) {
		die("Error: " . $conn->connect_error);
	}
	
	$sql = "SELECT * FROM monedas ORDER BY Valor DESC";
	$result = $conn->query($sql);
	echo "<h2>Lista de Depositos Disponibles</h2>";
	?>
	
	<table>
	<tr>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Cantidad</th>
	</tr>	
	<?php
	if ($result->num_rows > 0) {			
		 while (($row = $result->fetch_assoc()) != null) {
		 	echo "<tr><td>".$row["Nombre"]."</td><td>".$row["Valor"]."</td><td>".$row["Cantidad"]."</td></tr>";
		 }
	} else {
		echo "No hay ninguna moneda disponible";
	}
	?>
	</table>
	
	<br/><br/>
	<a href='DepInsertar.php' class="insertar">Nuevo</a><br/><br/>
	<a href='DepEliminar.php' class="eliminar">Eliminar</a><br/><br/>
	<a href='DepModificar.php' class="modificar">Modificar</a><br/><br/>
	<br/><br/>
	<a href='MenuNavegacion.php'>Volver a Menu</a><br/><br/>
</body>
</html>