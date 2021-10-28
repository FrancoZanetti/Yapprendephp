<?php
include "dbConnection.php";
include "validate.php";

$username = $_POST['userName'];
$email = $_POST['email'];
$password = hash("sha256", $_POST['password']);

$sql = "SELECT username From auth_user WHERE username = '$username'";
$result = $pdo->query($sql);

if($result->rowCount() > 0)
{
  $data = array('done' => false , 'message' => "Error. Nombre de usuario ya existente.");
  Header('Content-Type: application/json');
  echo json_encode($data);
  exit();
}

else
{
  $sql = "SELECT email From auth_user WHERE email = '$email'";
  $result = $pdo->query($sql);

  if($result->rowCount() > 0)
  {
    $data = array('done' => false , 'message' => "Error. Este email ya se encuentra registrado.");
    Header('Content-Type: application/json');
    echo json_encode($data);
    exit();
  }
  else
  {
    $sql = "INSERT INTO auth_user SET username = '$username' , email = '$email' , password = '$password'";
    $pdo->query($sql);

    $data = array('done' => true , 'message' => "El usuario se ha creado correctamente");
    Header('Content-Type: application/json');
    echo json_encode($data);
    exit();
  }
}

?>
