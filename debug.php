 <!DOCTYPE html>
<html>
<head>
<h1>debug ONLY!!</h1>
</head>
<body>

		<?php
			//DEBUG
			ini_set('display_errors',1);
			ini_set('display_startup_errors',1);
			error_reporting(-1);

			$host="localhost"; // o MySQL esta disponivel nesta maquina
			$user="root"; // -> substituir pelo nome de utilizador
			$password="root"; // -> substituir pela password dada pelo mysql_reset
			$dbname = "website"; // a BD tem nome identico ao utilizador
			

			$connection = new PDO("mysql:host=" . $host. ";dbname=" . $dbname, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false,
                     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

			if (!$connection) {
			    die('Could not connect: ' . mysqli_error($con));
			}

			$sql="SELECT * FROM caixas";
			$result = $connection->query($sql);
			
			echo '<table>
			<tr>
			<th>Titulo</th>
			<th>Ranking</th>
			<th>reviews</th>
			</tr>';
			foreach($result as $row) {
			    echo "<tr>";
			    echo "<td>" . $row['titulo'] . "</td>";
			    echo "<td>" . $row['ranking'] . "</td>";
			    echo "<td>" . $row['reviews'] . "</td>";
			    echo "</tr>";
			}
			echo "</table>";
		?>

</body>
</html>
