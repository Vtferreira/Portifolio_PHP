<?php

/*
	1-conectar ao banco de dados
	2-receber os dados do POST/GET
	3-inserir o comentário no banco
	4-redirecionar para a página index
*/

include "conectar.php";

$post_id = $_GET['post_id'];
$autor = $_POST['autor'];
$conteudo = $_POST['conteudo'];

$sql = "INSERT INTO comentario " .
		"(autor, conteudo, post_id) " .
		"VALUES ('$autor', '$conteudo', '$post_id')";

mysqli_query($con, $sql);

include "redirecionar.php";

?>