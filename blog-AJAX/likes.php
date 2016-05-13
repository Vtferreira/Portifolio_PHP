<?php

/*
	1-conectar no banco de dados
	2-receber o post_id pelo POST
	3-atualizei o banco de dados
	4-redirecionar para o index
	
*/

include "conectar.php";

mysqli_autocommit($con, false);
/*
$post_id = $_POST['post_id'];

$sql = "SELECT likes FROM post WHERE id=$post_id";

$res = mysqli_query($con,$sql);

$dados = mysqli_fetch_row($res);

$likes = $dados[0];

$sql = "UPDATE post SET " .
		"likes=1 + $likes" .
		" WHERE id=$post_id";
		
mysqli_query($con, $sql);

mysqli_commit($con);
*/
/**/
mysqli_autocommit($con, true);

$sql = "SELECT likes FROM post WHERE id=$post_id";

$res = mysqli_query($con,$sql);

$dados = mysqli_fetch_row($res);

$likes = $dados[0];
/**/

mysqli_close($con);

echo $likes;