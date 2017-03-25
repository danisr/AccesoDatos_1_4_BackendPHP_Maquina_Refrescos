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
	<h2>Modificacion de Depositos</h2>	
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
			$sql = "UPDATE monedas SET Nombre='".$_POST["nombre"]."', Valor='".$_POST["valor"]."', Cantidad='".$_POST["cantidad"]."' WHERE Nombre='".$_POST["nombre"]."'";
			$result = $conn->query($sql);
			echo "<h3><b>El deposito se ha modificado</b></h3><br/>";		
			
			if ($conn->query($sql) === FALSE) {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	?>
	<form action="DepModificar.php" method="post">
	<p>Nombre del Deposito: <input type="text" name="nombre" required/><br/></p>
	<p>Precio del Deposito: <input type="number" name="valor" required/><br/></p>
	<p>Cantidad del Deposito: <input type="number" name="cantidad" required/><br/></p>
	<p><input type="submit" name="enviar" value="Deposito a modificar"/><br/><br/><br/></p>	
	<a href='DepListado.php' class="depositos">Depositos</a><br/><br/><br/>
	<a href='MenuNavegacion.php'>Volver a Menu</a><br/><br/>
	</form>	
</body>
</html>