<?php
$connectionPassword = $_POST["connectionPassword"];

if($connectionPassword != "A_IhS[;yP1=c67,wG}`A<Nybaf?!DH")
{
  $data = array('done' => false , 'message' => "Autentificación fallida.");
  Header('Content-Type: application/json');
  echo json_encode($data);
  exit();
}


?>
