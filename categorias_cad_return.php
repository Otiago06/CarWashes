<?php
include_once("assets/connection/connection_database.php");
include_once("assets/scripts/test_input.php");

// define variables and set to empty values
$categoria_descricao = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $categoria_descricao = ucwords(test_input($_POST["categoria_descricao"]));  
}

$sql = "INSERT INTO tb_categorias (categoria_id, categoria_descricao, categoria_usuario, categoria_create, categoria_update) 
VALUES (NULL, '$categoria_descricao', '', NOW(), NULL)";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  $_SESSION['msg'] = '<div class="alert alert-dismissible alert-success">
	  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	  <strong>Sucesso!</strong> Registro '.$last_id.' foi inserido corretamente</a>.
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