<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style>
	</style>
	<link rel="stylesheet" type="text/css" href="sisbib-treco.css">
</head>
<body>
<?php
$user = "id20496192_padrao";
$password = "ifcbrusque-123-IFCBRUSQUE";
$database = "id20496192_ifc_refs_ppc_redes";
$table = $_REQUEST['consulta'];

$num_linha=1;
?>
	<h1>Resultados para ...</h1>
<?php
try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  
  if ($table == "Componentes_Curriculares") {
  	echo "\t<h2>Componentes Curriculares</h2>\n";
  	echo "\t<table>\n";
  	echo "\t\t<tr>\n";
  	echo "\t\t\t<th>#</th>\n";
  	echo "\t\t\t<th>Componentes Curriculares</th>\n";
  	echo "\t\t\t<th>Semestre</th>\n";
  	echo "\t\t\t<th>Código</th>\n";
  	echo "\t\t</tr>\n";
  	foreach($db->query("SELECT cc, semestre, codigo FROM $table") as $row) {
  		echo "\t\t<tr>\n";
  		echo "\t\t\t<td>$num_linha</td>\n";
    	echo "\t\t\t<td>" . $row['cc'] . "</td>\n";
    	if ($row['semestre'] == 0) {
    		echo "\t\t\t<td>Optativa</td>\n";
    	}
    	else {
    		echo "\t\t\t<td>" . $row['semestre'] . "</td>\n";
    	}
    	echo "\t\t\t<td>" . $row['codigo'] . "</td>\n";
    	echo "\t\t</tr>\n";
    	$num_linha++;
  	}
  	echo "\t</table>\n";
  }
  else {
  	echo "\t<h2>Função ainda não implementada</h2>\n";
  }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
</body>
</html>