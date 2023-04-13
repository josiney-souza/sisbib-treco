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
  elseif ($table == "Livros") {
  	echo "\t<h2>Livros</h2>\n";
  	echo "\t<table>\n";
  	echo "\t\t<tr>\n";
  	echo "\t\t\t<th>#</th>\n";
  	echo "\t\t\t<th>Autor</th>\n";
  	echo "\t\t\t<th>Título</th>\n";
  	echo "\t\t\t<th>Edição</th>\n";
  	echo "\t\t\t<th>Local</th>\n";
  	echo "\t\t\t<th>Editora</th>\n";
  	echo "\t\t\t<th>Ano</th>\n";
  	echo "\t\t\t<th>Exemplares</th>\n";
  	echo "\t\t</tr>\n";
  	foreach($db->query("SELECT autor, titulo, subtitulo, edicao, local, editora, ano, exemplares FROM $table") as $row) {
    	echo "\t\t<tr>\n";
  		echo "\t\t\t<td>$num_linha</td>\n";
    	echo "\t\t\t<td>" . $row['autor'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['titulo'] . ":" . $row['subtitulo'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['edicao'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['local'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['editora'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['ano'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['exemplares'] . "</td>\n";
    	echo "\t\t</tr>\n";
    	$num_linha++;
  	}
  	echo "\t</table>\n";
  }
  elseif ($table == "con04") {
  	echo "\t<h2>Livros com 0 exemplares</h2>\n";
  	echo "\t<table>\n";
  	echo "\t\t<tr>\n";
  	echo "\t\t\t<th>#</th>\n";
  	echo "\t\t\t<th>Autor</th>\n";
  	echo "\t\t\t<th>Título</th>\n";
  	echo "\t\t\t<th>Edição</th>\n";
  	echo "\t\t\t<th>Local</th>\n";
  	echo "\t\t\t<th>Editora</th>\n";
  	echo "\t\t\t<th>Ano</th>\n";
  	echo "\t\t\t<th>Exemplares</th>\n";
  	echo "\t\t</tr>\n";
  	foreach($db->query("SELECT autor, titulo, subtitulo, edicao, local, editora, ano, exemplares FROM Livros WHERE exemplares = 0") as $row) {
    	echo "\t\t<tr>\n";
  		echo "\t\t\t<td>$num_linha</td>\n";
    	echo "\t\t\t<td>" . $row['autor'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['titulo'] . ":" . $row['subtitulo'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['edicao'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['local'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['editora'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['ano'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['exemplares'] . "</td>\n";
    	echo "\t\t</tr>\n";
    	$num_linha++;
  	}
  	echo "\t</table>\n";
  }
  elseif ($table == "Tipos") {
  	echo "\t<h2>Tipos de referências bibliográficas</h2>\n";
  	echo "\t<table>\n";
  	echo "\t\t<tr>\n";
  	echo "\t\t\t<th>#</th>\n";
  	echo "\t\t\t<th>Tipo</th>\n";
  	echo "\t\t</tr>\n";
  	foreach($db->query("SELECT tipo FROM $table") as $row) {
    	echo "\t\t<tr>\n";
  		echo "\t\t\t<td>$num_linha</td>\n";
    	echo "\t\t\t<td>" . $row['tipo'] . "</td>\n";
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