<?php

include("conexao.php");
include("queries.php");

$next = $_GET['count'];

$count = 1;
$arr = [];
while($reg = $sql->fetch_assoc()){
    $arr[$count] = $reg['arquivo'];
    $count++;
}

$last = array_key_last($arr);

if ($next == 0) {
    $next = $last;
} elseif ($next > $last) {
    $next = 1;
}
$return = [
    'next' => $next,
    'file' => $arr[$next]
];

echo json_encode($return) ;