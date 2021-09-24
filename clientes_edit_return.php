<?php
  include_once("assets/connection/connection_database.php");
  include_once("assets/scripts/test_input.php");

  $cliente_nome = $cliente_celular = $cliente_cpf = $cliente_aniversario = $cliente_email = $cliente_endereco = $cliente_referencia = $cliente_placa = $cliente_modelo = $cliente_cor = $cliente_categoria = '';

  if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $cliente_id = test_input($_POST['cliente_id']);
    $cliente_nome = ucfirst(test_input($_POST['cliente_nome']));
    $cliente_celular = test_input($_POST['cliente_celular']);
    $cliente_cpf = test_input($_POST['cliente_cpf']);
    $cliente_aniversario = test_input($_POST['cliente_aniversario']);
    $cliente_email = strtolower(test_input($_POST['cliente_email']));
    $cliente_endereco = ucfirst(test_input($_POST['cliente_endereco']));
    $cliente_referencia = ucfirst(test_input($_POST['cliente_referencia']));
    $cliente_placa = strtoupper(test_input($_POST['cliente_placa']));
    $cliente_categoria = @$_POST['cliente_categoria'] == null ? '' : $_POST['cliente_categoria'];
    $cliente_modelo = strtoupper(test_input($_POST['cliente_modelo']));
    $cliente_cor = $_POST['cliente_cor'];
    //$cliente_create = test_input($_POST['cliente_create']);
    //$cliente_update = test_input($_POST['cliente_update']);
  }

  $sql = "UPDATE tb_clientes SET cliente_nome = '$cliente_nome', cliente_celular = '$cliente_celular', cliente_cpf = '$cliente_cpf', cliente_aniversario = '$cliente_aniversario', cliente_email = '$cliente_email', cliente_endereco = '$cliente_endereco', cliente_referencia = '$cliente_referencia', cliente_placa = '$cliente_placa', cliente_categoria = '$cliente_categoria', cliente_modelo = '$cliente_modelo', cliente_cor = '$cliente_cor', cliente_update = NOW() WHERE cliente_id = '$cliente_id'";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['msg'] = '<div class="alert alert-dismissible alert-success">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <strong>Sucesso!</strong> Registro '.$cliente_id.' foi atualizado corretamente</a>.
    </div>';
    header("Location: clientes.php");
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    $_SESSION['msg'] = '<div class="alert alert-dismissible alert-warning">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <h4 class="alert-heading">Ocorreu um erro!</h4>
      <p class="mb-0">'.$conn->error.'</p>
    </div>';
    header("Location: clientes.php");
  }

  $conn->close();
?>