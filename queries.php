<?php

$sql = $conexao->query("SELECT arquivo, extensao FROM arquivos ORDER BY extensao DESC");
