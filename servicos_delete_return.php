<?php
include_once("assets/connection/connection_database.php");
include_once("assets/scripts/test_input.php");

// define variables and set to empty values
$servico_id = "";

if(isset($_GET['id'])){
    $servico_id = test_input($_GET['id']);

    // sql to delete a record
	$sql = "DELETE FROM tb_servicos WHERE servico_id = '$servico_id'";

	if ($conn->query($sql) === TRUE) {
	  $_SESSION['msg'] = '<div class="alert alert-dismissible alert-success">
		  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		  <strong>Sucesso!</strong> Registro '.$servico_id.' foi excluído corretamente</a>.
		</div>';
	  header("Location: servicos.php");
	} else {	  
	  $_SESSION['msg'] = '<div class="alert alert-dismissible alert-warning">
		  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		  <h4 class="alert-heading">Ocorreu um erro!</h4>
		  <p class="mb-0">'.$conn->error.'</p>
		</div>';
	  header("Location: servicos.php");
	}	
  	
  	$conn->close();
}else{
  $_SESSION['msg'] = '<div class="alert alert-dismissible alert-warning">
	  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	  <h4 class="alert-heading">Ocorreu um erro!</h4>
	  <p class="mb-0">Não foi possível excluir o registro!</p>
	</div>';
  header("Location: servicos.php");
}
?>
