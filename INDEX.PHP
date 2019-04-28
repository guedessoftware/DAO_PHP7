<?php 

require_once ("CONFIG.PHP");

/*
$sql = new SQL();

$usuarios=$sql->select("SELECT * FROM usuarios");

echo json_encode($usuarios);

*/
/*
$root = new Usuario();

$root->loadById(11);

echo $root;
*/
// carregar uma lista de usuario 

/*
$lista = Usuario::listaUsuarios();

echo json_encode($lista);
*/

//Buscando pelo login

//$pesquisa = Usuario::pesquisa("guedesxxx");

//echo json_encode($pesquisa);

//carregar Usuario usando login e senha

//
$usuario = new Usuario();

$usuario->login("guedesxxx", "diskxp23423");

echo $usuario;


?>