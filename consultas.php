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
  elseif ($table == "con05") {
  	echo "\t<h2>Livros sem exemplares apurados na biblioteca</h2>\n";
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
  	foreach($db->query("SELECT autor, titulo, subtitulo, edicao, local, editora, ano, exemplares FROM Livros WHERE exemplares < 0") as $row) {
    	echo "\t\t<tr>\n";
  		echo "\t\t\t<td>$num_linha</td>\n";
    	echo "\t\t\t<td>" . $row['autor'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['titulo'] . ":" . $row['subtitulo'] . "</td>\n";
    	if ($row['edicao'] < 0) {
    		echo "\t\t\t<td>?????</td>\n";
    	} else {
	    	echo "\t\t\t<td>" . $row['edicao'] . "</td>\n";
	    }
    	echo "\t\t\t<td>" . $row['local'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['editora'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['ano'] . "</td>\n";
    	echo "\t\t\t<td>?????</td>\n";
    	echo "\t\t</tr>\n";
    	$num_linha++;
  	}
  	echo "\t</table>\n";
  }
  elseif ($table == "con06") {
  	echo "\t<h2>Livros sem edição definida</h2>\n";
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
  	foreach($db->query("SELECT autor, titulo, subtitulo, edicao, local, editora, ano, exemplares FROM Livros WHERE edicao < 0") as $row) {
    	echo "\t\t<tr>\n";
  		echo "\t\t\t<td>$num_linha</td>\n";
    	echo "\t\t\t<td>" . $row['autor'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['titulo'] . ":" . $row['subtitulo'] . "</td>\n";
    	echo "\t\t\t<td>?????</td>\n";
    	echo "\t\t\t<td>" . $row['local'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['editora'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['ano'] . "</td>\n";
    	if ($row['exemplares'] < 0) {
    		echo "\t\t\t<td>?????</td>\n";
    	} else {
	    	echo "\t\t\t<td>" . $row['exemplares'] . "</td>\n";
	    }
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
  elseif ($table == "con11") {
  	echo "\t<h2>Relação entre todos os livros, tipos e semestres de uso</h2>\n";
  	echo "\t<table>\n";
  	echo "\t\t<tr>\n";
  	echo "\t\t\t<th>#</th>\n";
  	echo "\t\t\t<th>Autor</th>\n";
  	echo "\t\t\t<th>Título</th>\n";
  	echo "\t\t\t<th>Tipo</th>\n";
  	echo "\t\t\t<th>Componente Curricular</th>\n";
  	echo "\t\t</tr>\n";
  	foreach($db->query("SELECT
	  		l.autor as Autor,
			l.titulo as Título,
			t.tipo as Tipo,
			cc.cc as Componente_Curricular,
			cc.semestre as Semestre
		FROM
			Usos as u, Livros as l, Tipos as t, Componentes_Curriculares as cc
		WHERE
			u.livro = l.id AND u.tipo = t.id AND u.cc = cc.id
		ORDER BY u.id") as $row) {
    	echo "\t\t<tr>\n";
  		echo "\t\t\t<td>$num_linha</td>\n";
    	echo "\t\t\t<td>" . $row['Autor'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['Título'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['Tipo'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['Componente_Curricular'] . "</td>\n";
    	echo "\t\t</tr>\n";
    	$num_linha++;
  	}
  	echo "\t</table>\n";
  }
  elseif ($table == "con12") {
  	echo "\t<h2>Relação de todos os livros compartilhados por mais de uma disciplina</h2>\n";
  	echo "\t<table>\n";
  	echo "\t\t<tr>\n";
  	echo "\t\t\t<th>#</th>\n";
  	echo "\t\t\t<th>Autor</th>\n";
  	echo "\t\t\t<th>Título</th>\n";
  	echo "\t\t\t<th>Componente Curricular</th>\n";
  	echo "\t\t\t<th>Semestre</th>\n";
  	echo "\t\t</tr>\n";
  	foreach($db->query("SELECT DISTINCT
	  		l1.autor as Autor,
			l1.titulo as Título,
			cc1.cc as Componente_Curricular,
			cc1.semestre as Semestre
		FROM
			Usos as u1, Livros as l1, Tipos as t1, Componentes_Curriculares as cc1,
			Usos as u2, Livros as l2, Tipos as t2, Componentes_Curriculares as cc2
		WHERE
			(u1.livro = l1.id AND u1.tipo = t1.id AND u1.cc = cc1.id)
			AND (u2.livro = l2.id AND u2.tipo = t2.id AND u2.cc = cc2.id)
			AND (l1.autor = l2.autor AND l1.titulo = l2.titulo AND l1.subtitulo = l2.subtitulo AND cc1.cc <> cc2.cc)
		ORDER BY l1.titulo, l1.autor, cc1.semestre") as $row) {
    	echo "\t\t<tr>\n";
  		echo "\t\t\t<td>$num_linha</td>\n";
    	echo "\t\t\t<td>" . $row['Autor'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['Título'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['Componente_Curricular'] . "</td>\n";
    	echo "\t\t\t<td>" . $row['Semestre'] . "</td>\n";
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