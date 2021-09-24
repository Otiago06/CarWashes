<?php
include_once("assets/connection/connection_database.php");
include_once("assets/scripts/test_input.php");

// define variables and set to empty values
$categoria_id = $categoria_descricao = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $categoria_id = test_input($_POST["categoria_id"]);
  $categoria_descricao = ucwords(test_input($_POST["categoria_descricao"]));
  $categoria_usuario = test_input($_POST["categoria_usuario"]);  
}

$sql = "UPDATE tb_categorias SET categoria_descricao = '$categoria_descricao', categoria_usuario = '$categoria_usuario', categoria_update = NOW() WHERE categoria_id = '$categoria_id'";

if ($conn->query($sql) === TRUE) {
  $_SESSION['msg'] = '<div class="alert alert-dismissible alert-success">
	  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	  <strong>Sucesso!</strong> Registro '.$categoria_id.' foi atualizado corretamente</a>.
	</div>';
  header("Location: categorias.php");
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
  $_SESSION['msg'] = '<div class="alert alert-dismissible alert-warning">
	  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	  <h4 class="alert-heading">Ocorreu um erro!</h4>
	  <p class="mb-0">'.$conn->error.'</p>
	</div>';
  header("Location: categorias.php");
}

$conn->close();
?>