<?php

$path = "midias/";
$diretorio = dir($path);

$count = 0;
while($arquivo = $diretorio -> read()){
	$arq = explode(".",$arquivo);
	$ext = end($arq);
	if($ext == "mp3" || $ext == "mp4"){
		$id = 0;
		$query = "SELECT id FROM arquivos WHERE arquivo = '$arquivo'";
		$id = $conexao->query($query)->num_rows;
		if($id == 0){
			$sql = "INSERT INTO arquivos (arquivo, extensao) VALUES ('".$arquivo."', '".$ext."')";
			$conexao->query($sql);
			$count++;
		}
	}
}

$diretorio -> close();
