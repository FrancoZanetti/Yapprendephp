<?php
include "dbConnection.php";
include "validate.php";

$username = $_POST['userName'];
$password = hash('sha256', $_POST['password']);

$sql = "SELECT username FROM auth_user WHERE username = '$username' AND password = '$password'";
$result = $pdo->query($sql);

if($result->rowCount() > 0)
{
  $data = array('done' => true , 'message' => "Bienvenido $username");
  Header('Content-Type: application/json');
  echo json_encode($data);
  exit();
}

else
{
  $data = array('done' => false , 'message' => "Error. Nombre de usuario o contraseña incorrectos.");
  Header('Content-Type: application/json');
  echo json_encode($data);
  exit();
}

?>
