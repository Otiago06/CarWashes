<?php
include_once("assets/connection/connection_database.php");
include_once("assets/scripts/test_input.php");

// define variables and set to empty values
$servico_descricao = $servico_valor = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $servico_descricao = ucwords(test_input($_POST["servico_descricao"]));
  $servico_categoria = $_POST['servico_categoria'];
  $servico_valor = test_input($_POST["servico_valor"]);
}

$sql = "INSERT INTO tb_servicos (servico_id, servico_descricao, servico_valor, servico_categoria, servico_create, servico_update) 
VALUES (NULL, '$servico_descricao', '$servico_valor', '$servico_categoria', NOW(), NULL)";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  $_SESSION['msg'] = '<div class="alert alert-dismissible alert-success">
	  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	  <strong>Sucesso!</strong> Registro '.$last_id.' foi inserido corretamente</a>.
	</div>';
  header("Location: servicos.php");
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
  $_SESSION['msg'] = '<div class="alert alert-dismissible alert-warning">
	  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	  <h4 class="alert-heading">Ocorreu um erro!</h4>
	  <p class="mb-0">'.$conn->error.'</p>
	</div>';
  header("Location: servicos.php");
}

$conn->close();
?>