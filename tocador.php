<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset=utf-8>
		<meta name="viewport" content="width=620">
		<title>HTML5 - Music & Video</title>
		<link rel="stylesheet" href="estilos.css" type="text/css">
	</head>
	<body>
	<div class="container">
	<div class="child">
		<div class="player">
			<a onclick="proximo('<?php echo ($_GET['count'] - 1);?>')">
				<img class="controls backward" title="Anterior" alt="Anterior" src="imagens/backward.png" />
			</a>
			<?php
			$arq = explode(".",@$_GET['arquivo']);
			if($arq[1] == "mp3"){?>
				<audio controls="controls"  autoplay="autoplay" onended="proximo('<?php echo ($_GET['count'] + 1);?>')"><source src="midias/<?php echo $_GET['arquivo'];?>" type="audio/mp3"></audio>
			<?php }elseif($arq[1] == "mp4"){?>
				<video controls="controls"  autoplay="autoplay" width="800px" onended="proximo('<?php echo ($_GET['count'] + 1);?>')"><source src="midias/<?php echo $_GET['arquivo'];?>" type="video/mp4"></video>
			<?php }?>
			<a onclick="proximo('<?php echo ($_GET['count'] +1);?>')">
				<img class="controls forward" title="Pr&oacute;xima" alt="Pr&oacute;xima" src="imagens/forward-button.png" />
			</a>
		</div>
		<div class="playing"><?php echo $arq[0];?></div>
		<div><input class="back-button" type="button" onclick="JavaScript: location.href = 'index.php'" value="Menu Principal"/></div>
		</div>
		</div>
	</body>
</html>

<script type="text/javascript">
function proximo(count)
{
	fetch('retorna.php?count=' + count)
    .then(response => response.json())
    .then(data => {
		location.href = 'tocador.php?arquivo=' + data.file + '&count=' + data.next
    })
    .catch(error => {
		alert('Erro. Volte ao menu principal e escolha outra musica.');
    });
}
</script>

