<?php 

require_once ("CONFIG.PHP");

/*
$sql = new SQL();

$usuarios=$sql->select("SELECT * FROM usuarios");

echo json_encode($usuarios);

*/

$root = new Usuario();

$root->loadById(11);

echo $root;

?>