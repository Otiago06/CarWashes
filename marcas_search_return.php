<?php
  include_once("assets/connection/connection_database.php");

	$busca = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
  
  //Pesquisar no banco de dados nome do usuario referente a palavra digitada
  $result_marcas = "SELECT * FROM tb_marcas WHERE marca_modelo LIKE '%$busca%' LIMIT 20";
  $resultado_marcas = mysqli_query($conn, $result_marcas);
  
  if(($resultado_marcas) AND ($resultado_marcas->num_rows != 0 )){
    while($row_marcas = mysqli_fetch_assoc($resultado_marcas)){?>          
          <a href="<?php echo 'marcas_edit.php?id='.$row_marcas['marca_id']; ?>" class="list-group-item list-group-item-action">
            <div class="col">
              <small class="text-muted"><?php echo $row_marcas['marca_modelo']; ?></small>
            </div>
          </a>
        <?php }
  }else{
    echo '<li class="list-group-item text-center"><div class="col"><small class="text-muted"><span class="text-uppercase">'.$busca.'</span> não foi encontrado!</small></div></li>';
  }
?>