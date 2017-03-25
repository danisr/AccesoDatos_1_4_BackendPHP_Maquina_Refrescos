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
	if (isset($_POST ["eliminar"])) {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "maqexp";
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// Check connection
		if ($conn->connect_error) {
			die("Error: " . $conn->connect_error);
		}
		
		$sql = "DELETE FROM monedas WHERE Nombre ='".$_POST ["depositos"]."'";
		echo "<br/><h3><b>Deposito eliminado correctamente</b></h3><br/>";
		
		if ($conn->query($sql) === FALSE) {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close(); // cierre de conexión con la BBDD
		echo "<br/>";
	}
	?>
	
	<form action="DepEliminar.php" method="post">
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "maqexp";
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// Check connection
		if ($conn->connect_error) {
			die("Error: " . $conn->connect_error);
		}
		$query = "SELECT * FROM monedas";
		$result = $conn->query($query);
	
		echo "<h2>Depositos a Eliminar</h2>";
		echo "<select name='depositos'>"; 
		if($result->num_rows > 0){
		    echo '<option value="">Sin seleccion</option>';
			while($row = $result->fetch_assoc()){
				echo '<option value="'.$row['Nombre'].'">'.$row['Nombre'].", ".$row['Valor'].", ".$row['Cantidad'].'</option>';
			}
		}
		echo "</select>";
		echo "<br>";
		$conn->close(); // cierre de conexión con la BBDD
		?>
		<p><input type="submit" name="eliminar" value="Deposito a eliminar" /></p><br/><br/>
		<a href='DepListado.php' class="depositos">Depositos</a><br/><br/><br/>
		<a href='MenuNavegacion.php'>Volver a Menu</a><br/><br/>
	</form>
</body>
</html>