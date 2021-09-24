<?php
  include_once("assets/connection/connection_database.php");
  $dados= [];
  //$busca = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
  $busca= $_POST['palavra'];
  
  //Pesquisar no banco de dados nome do usuario referente a palavra digitada
  $result_servicos = "SELECT * FROM tb_clientes WHERE cliente_placa = '$busca'";
  $resultado_servicos = mysqli_query($conn, $result_servicos);
  
    while($row = mysqli_fetch_array($resultado_servicos)){
        array_push($dados, array(
            'categoria' => $row['cliente_categoria'],
            'modelo' => $row['cliente_modelo'],
            'cor' => $row['cliente_cor']
        ));
    }
    echo json_encode($dados);
?>