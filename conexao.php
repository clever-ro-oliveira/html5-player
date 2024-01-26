<?php
ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting (E_ALL);

//conexão com o BD
$msg = "Conexão com o banco falhou!";
$conexao = new mysqli("localhost","root","", "html5") or die($msg);
