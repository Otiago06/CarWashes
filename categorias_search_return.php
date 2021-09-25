
<?php
  include_once("assets/connection/connection_database.php");

  $busca = $_POST['dropdownValue']['palavra']; //filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
  
  //Pesquisar no banco de dados nome do usuario referente a palavra digitada
  $result_servicos = "SELECT * FROM tb_servicos WHERE servico_categoria = $busca OR servico_categoria = 0 ORDER BY servico_id";
  $resultado_servicos = mysqli_query($conn, $result_servicos);
  
  if(($resultado_servicos) AND ($resultado_servicos->num_rows != 0 )){
    while($row = mysqli_fetch_assoc($resultado_servicos)){?>
        <div class="form-check">
          <input class="form-check-input h3" type="checkbox" name='checkboxvar[]' id="checkbox" data-price="<?php echo $row['servico_valor']; ?>" value="<?php echo $row['servico_id']; ?>">
          <label class="form-check-label h3" for="flexCheckDefault<?php echo $row['servico_id'] ?>">
            <span class="text-uppercase"><?php echo $row['servico_descricao']; ?> - <small class="text-info">R$ <?php echo @number_format($row['servico_valor'],2, ',', '.'); ?></small></span>
          </label>
        </div>
        <?php }
  }else{
    echo '<li class="list-group-item text-center"><div class="col"><h4 class="text-muted">Não há serviços cadastrados!</h4></div></li>';
  }
?>
<script>
          // Verifica clique em qualquer checkbox da tela
          $("input[type='checkbox']").click(function() {
              var total = 0
              // Percorre todos os checkboxes
              $("input[type='checkbox']").each(function() {
                  // Verifica se está selecionado
                  if ($(this).is(':checked')) {
                      // Incremente cálculo
                      total = total + parseFloat($(this).data("price"))
                  }
              })

              // Exibe Total
              $("#total").html(total.toLocaleString('pt-BR', {
                  style: 'currency',
                  currency: 'BRL',
                  minimumFractionDigits: 2
              }))
          })
      </script>

<!--
<div class="form-check">
            <input class="form-check-input" type="checkbox" value="<?php echo $row['servico_id'] ?>" data-price="<?php echo $row['servico_valor']; ?>">
            <label class="form-check-label" for="srv_polimento">
                <?php echo $row['servico_descricao']; ?>
            </label>
            <small class='text-info'>R$ <?php echo $row['servico_valor']; ?></small>
        </div>

<div class="form-check">
          <input class="form-check-input h3" type="checkbox" name='checkboxvar[]' id="checkbox" data-price="<?php echo $row['servico_valor']; ?>" value="<?php echo $row['servico_id']; ?>">
          <label class="form-check-label h3" for="flexCheckDefault<?php echo $row['servico_id'] ?>">
            <span class="text-uppercase"><?php echo $row['servico_descricao']; ?> - <small class="text-info">R$ <?php echo $row['servico_valor']; ?></small></span>
          </label>
        </div>        
-->