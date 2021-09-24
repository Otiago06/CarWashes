<?php
include_once("assets/connection/connection_database.php");
include_once("assets/scripts/test_input.php");

// define variables and set to empty values
$marca_id = $marca_modelo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $marca_id = test_input($_POST["marca_id"]);
  $marca_modelo = strtoupper(test_input($_POST["marca_modelo"]));
  $marca_usuario = test_input($_POST["marca_usuario"]);  
}

$sql = "UPDATE tb_marcas SET marca_modelo = '$marca_modelo', marca_update = NOW() WHERE marca_id = '$marca_id'";

if ($conn->query($sql) === TRUE) {
  $_SESSION['msg'] = '<div class="alert alert-dismissible alert-success">
	  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	  <strong>Sucesso!</strong> Registro '.$marca_id.' foi atualizado corretamente</a>.
	</div>';
  header("Location: marcas.php");
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
  $_SESSION['msg'] = '<div class="alert alert-dismissible alert-warning">
	  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	  <h4 class="alert-heading">Ocorreu um erro!</h4>
	  <p class="mb-0">'.$conn->error.'</p>
	</div>';
  header("Location: marcas.php");
}

$conn->close();
?>