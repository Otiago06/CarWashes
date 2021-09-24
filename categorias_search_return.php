
<?php
  include_once("assets/connection/connection_database.php");

  $busca = $_POST['dropdownValue']['palavra']; //filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
  
  //Pesquisar no banco de dados nome do usuario referente a palavra digitada
  $result_servicos = "SELECT * FROM tb_servicos WHERE servico_categoria = $busca OR servico_categoria = 0 ORDER BY servico_id";
  $resultado_servicos = mysqli_query($conn, $result_servicos);
  
  if(($resultado_servicos) AND ($resultado_servicos->num_rows != 0 )){
    while($row = mysqli_fetch_assoc($resultado_servicos)){?>
        <div class="form-check">
          <input class="form-check-input h3" name='checkboxvar[]' type="checkbox" value="<?php echo $row['servico_id']; ?>" id="checkbox<?php echo $row['servico_id'] ?>">
          <label class="form-check-label h3" for="flexCheckDefault<?php echo $row['servico_id'] ?>">
            <small class="text-uppercase"><?php echo $row['servico_descricao']; ?> - R$ <?php echo $row['servico_valor']; ?></small>
          </label>
        </div>
        <?php }
  }else{
    echo '<li class="list-group-item text-center"><div class="col"><h4 class="text-muted">Não há serviços cadastrados!</h4></div></li>';
  }
?>