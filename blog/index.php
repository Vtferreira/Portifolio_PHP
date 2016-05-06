<!DOCTYPE html>
<html>
	<head>
		<title>Blog do 3º Semestre</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		
		<script>
				
		
		
		
		</script>
	
	</head>
	<body>
	
		<h1>Blog do 3º Semestre</h1>
		
		<?php
		
			/*
				1-conectar no banco de dados
				2-Selecionar todos os posts
				3-Exibir os posts
			*/
			
			include "conectar.php";
			
			$sql = "SELECT * FROM post ORDER BY datahora DESC";
			$res = mysqli_query($con, $sql);
			$linhas = mysqli_num_rows($res);
			for ($i = 0; $i < $linhas; $i++)
			{
				
				$dados = mysqli_fetch_row($res);
				$post_id = $dados[0];
				$titulo = $dados[1];
				$conteudo = $dados[2];
				$datahora = $dados[3];
				$likes = $dados[4];
				?>
				
				<div>
					<h2><?=$titulo?></h2>
					<p style="color:#aaa">
						<?=$datahora?>
					</p>
					<?=$conteudo?>
					<p style="color:#f00">
						Likes: <?=$likes?>
						<form action="likes.php" method="POST">
							<input type="hidden" name="post_id" value="<?=$post_id?>"/>
							<input type="submit" value="Gostei"/>
						</form>
					</p>
					
					<div id="comentarios">
					
						<form action="comentar.php?post_id=<?=$post_id?>" method="POST">
							<input type="text" name="autor" size="50"
								placeholder="Digite seu nome"/>
							<br/>
							<textarea name="conteudo"
								rows="5" cols="50"
								placeholder="Digite seu comentário"></textarea>
							<br/>
							<input type="submit" value="Postar"/>
						</form>
					
						<?php
						$sql = "SELECT * FROM comentario " .
								"WHERE post_id=$post_id " .
								"ORDER BY datahora DESC";
						$comentarios = mysqli_query($con, $sql);
						$num_coment = mysqli_num_rows($comentarios);
						
						for ($j = 0; $j < $num_coment; $j++)
						{
							$dados = mysqli_fetch_row($comentarios);
							$conteudo = $dados[1];
							$autor = $dados[2];
							$datahora = $dados[3];
							
							?>
							
							<div>
								<span style="color:#aaa">
									[<?=$datahora?>]
								</span>
								<span style="font-weight:bold">
									<?=$autor?>
								</span>
								escreveu:
								<p><?=$conteudo?></p>	
							</div>
							
							<?php
						}
						
						?>
					</div>
					
				</div>
				
				<?php
			}
			
		?>
	
	</body>
</html>