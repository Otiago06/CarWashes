<?php
include_once("assets/connection/connection_database.php");
include_once("assets/scripts/test_input.php");

// define variables and set to empty values
$servico_id = $servico_descricao = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $servico_id = test_input($_POST["servico_id"]);
  $servico_descricao = ucwords(test_input($_POST["servico_descricao"]));
  $servico_categoria = $_POST['servico_categoria'];
  $servico_valor = test_input($_POST["servico_valor"]);
  $servico_usuario = test_input($_POST["servico_usuario"]);   
}

$sql = "UPDATE tb_servicos SET servico_descricao = '$servico_descricao', servico_valor = '$servico_valor', servico_categoria = '$servico_categoria', servico_update = NOW() WHERE servico_id = '$servico_id'";

if ($conn->query($sql) === TRUE) {
  $_SESSION['msg'] = '<div class="alert alert-dismissible alert-success">
	  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	  <strong>Sucesso!</strong> Registro '.$servico_id.' foi atualizado corretamente</a>.
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