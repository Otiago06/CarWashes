<?php
  include_once("assets/connection/connection_database.php");

	$busca = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
  
  //Pesquisar no banco de dados nome do usuario referente a palavra digitada
  $result_clientes = "SELECT * FROM tb_clientes WHERE cliente_nome LIKE '%$busca%' OR cliente_placa LIKE '%$busca%' LIMIT 20";
  $resultado_clientes = mysqli_query($conn, $result_clientes);
  
  if(($resultado_clientes) AND ($resultado_clientes->num_rows != 0 )){
    while($row_clientes = mysqli_fetch_assoc($resultado_clientes)){?>          
          <a href="<?php echo 'clientes_edit.php?id='.$row_clientes['cliente_id']; ?>" class="list-group-item list-group-item-action">
            <div class="col">
              <h4 class="text-muted"><?php echo $row_clientes['cliente_nome'].'<br>'; ?><i class="fas fa-car" style="color: <?php echo $row_clientes['cliente_cor']; ?>"></i>&nbsp;<?php echo $row_clientes['cliente_modelo'] ?>&nbsp;(<?php echo $row_clientes['cliente_placa']; ?>)</h4>
            </div>
          </a>
        <?php }
  }else{
    echo '<li class="list-group-item text-center text-capitalize"><div class="col"><h4 class="text-muted">'.$busca.' não foi encontrado!</h4></div></li>';
  }
?>