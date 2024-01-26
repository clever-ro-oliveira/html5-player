<?php

include("conexao.php");
include("queries.php");

// The commented line below insert new songs or videos into the database.
//Just uncomment if you need this feature.
//include("new_songs.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset=utf-8>
		<meta name="viewport" content="width=620">
		<title>HTML5 - Music & Video</title>
		<link rel="stylesheet" href="estilos.css" type="text/css">
	</head>
	<body>
		<div align="center">
			<table>
				<?php
				$count = 1;
				$num_columns = 3;
				while($reg = $sql->fetch_assoc()){
					if($count == 1 || ($count - 1) % $num_columns == 0) {?>
						<tr>
					<?php
					}?>
					<td>
						<div class="add_link" onclick="tocar('<?= $reg['arquivo'];?>','<?= $count;?>')">
							<img class="play-button" title="Play" alt="Play" src="imagens/play-button.png" />

							<span><?= $reg['arquivo'];?></span>

							<img class="play-button extensao" title="Play" alt="Play" src="imagens/<?= $reg['extensao']?>.png" />
						</div>
					</td>
					<?php if($count % $num_columns == 0){?>
						</tr>
					<?php
					}
					$count++;
				}
				if(($count - 1) % $num_columns != 0){?>
					</tr>
				<?php
				}?>
			</table>
		</div>
	</body>
</html>

<script type="text/javascript">
	function tocar(arquivo,count){
		location.href = "tocador.php?arquivo="+arquivo+"&count="+count;
	}
</script>
