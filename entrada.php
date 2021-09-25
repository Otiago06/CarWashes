<?php
  include_once("assets/connection/connection_database.php");
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema para gestão de lavar car e car detailing">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.1.0/dist/solar/bootstrap.min.css" rel="stylesheet">

    <!-- CDN fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Formata Campos -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="style.css">
    <title>CarWashes</title>
  </head>
  <body>
    <!--Barra de Navegação-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <span class="navbar-text">
        &nbsp;<a href="index.php" class="btn btn-link"><i class="fas fa-arrow-left fa-1x"></i></a>
      </span>
      <span class="navbar-text">
        <a><span class="titulo">ENTRADA</span></a>
      </span>
      <span class="navbar-text">
        &nbsp;
      </span>
    </nav>
    <!--//Barra de Navegação-->
    <!--Conteúdo da página-->
    <div class="container">
      <small class="text-muted">&nbsp;Dados do veículo</small>
      <form action="<?php echo htmlspecialchars('entrada_return.php');?>" method="post" class="form-floating" enctype="multipart/form-data">
        <div class="form-floating mb-3">
          <input type="hidden" class="form-control" id="controle" name="controle" placeholder="Código" readonly>
          <label for="controle">Nº Controle</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control text-uppercase" id="placa" name="placa" placeholder="Placa do veículo" autofocus required>
          <label for="placa">Placa</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select" id="categoria" name="categoria" aria-label="Floating label select example" placeholder="Categoria" required>
            <option selected disabled>&nbsp;</option>
            <?php
              $sql = "SELECT categoria_id, categoria_descricao FROM tb_categorias";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  ?>
                    <option value="<?php echo $row['categoria_id']; ?>"><?php echo $row['categoria_descricao']; ?></option>
                  <?php
                }
              } else {
                ?>
                  <option selected disabled>Não há registros cadastrados</option>
                <?php
              }
            ?>
          </select>
          <label for="floatingSelect">Categoria do Veículo</label>
        </div>
        <?php
          $sql_marcas = "SELECT marca_modelo FROM tb_marcas";
          $result_marcas = mysqli_query($conn, $sql_marcas);
        ?>
        <div class="form-floating mb-3">
          <input type="text" class="form-control text-capitalize" id="modelo" name="modelo" placeholder="Digite a modelo do veículo." list="datalistOptions" required>
          <label for="modelo">Marca / Modelo</label>
          <datalist id="datalistOptions">
            <?php while($row = mysqli_fetch_array($result_marcas)) { ?>
                <option value="<?php echo $row['marca_modelo']; ?>"><?php echo $row['marca_modelo']; ?></option>
            <?php } ?>
          </datalist>
        </div>
        <hr><small class="text-muted">&nbsp;Detalhes do veículo</small> 
        <div class="row">
          <div class="col-2 mb-3">
            <label for="cor" class="form-label">Cor</label>
            <input type="color" class="form-control form-control-color" id="cor" name="cor" title="Selecione uma cor" value="#FF0000" style="width: 100%;">          
          </div> 
          <div class="col-10 mb-3">
            <label for="formFileLg" class="form-label">Foto do Veículo</label>
            <div class="input-group">
              <input type="file" class="form-control" accept="image/*" id="uploadimage" name="uploadimage" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
          </div>
        </div>
      <hr><small class="text-muted">&nbsp;Serviços a serem realizados</small><br>
      <div class="container resultado"></div>
      <div class="h3 my-3 text-uppercase">Total dos serviços: <span id="total" class="text-info">R$ 0,00</span></div>
      <hr>
      <small class="text-muted">&nbsp;Dados de contato</small>
        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control text-capitalize" id="nome" name="nome" placeholder="Nome">
              <label for="nome">Nome</label>
            </div>            
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="celular" name="celular" placeholder="celular" maxlength="15">
              <label for="celular">Telefone</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="observacoes"><small>Observações</small></label>
          <textarea id="observacoes" name="observacoes" class="form-control" aria-label="Com textarea" cols=26 rows="5" placeholder="Se possui avarias, local do antifurto, descrições gerais da condição do veículo."></textarea>
        </div>
        <br>
        <div class="d-grid gap-2">
          <button class="btn btn-dark btn-lg" type="submit"><small>SALVAR</small></button>
        </div>
      </form>
    </div><br>
    <!-- Rodapé <hr>-->
    <div class="alert alert-default" role="alert">
      <p class="mb-0" style="text-align: center;"><span>&copy;<?php echo date('Y'). ' CarWashes '.$app_versao; ?></span></p>
    </div>
    <!-- //Rodapé -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Serviços</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <ul class="list-group list-group-flush">
              <?php
                $sql_servicos = "SELECT * FROM tb_servicos";
                $result_servicos = $conn->query($sql_servicos);

                if ($result_servicos->num_rows > 0) {
                  // output data of each row
                  while($row = $result_servicos->fetch_assoc()){
                    ?>
                      <a href="<?php echo 'entrada.php?servico_id='.$row['servico_id']; ?>" class="list-group-item list-group-item-action">
                        <div class="col text-start">
                          <small class="text-muted"><?php echo $row['servico_descricao'] ?></small>
                        </div>
                        <div class="col text-end">
                          <small class="text-muted">R$ <?php echo number_format($row['servico_valor'],2, ',', '.'); ?></small>
                        </div>
                      </a>
                    <?php
                  }
                }else{
                  ?>
                    <li class="list-group-item text-center">
                      <div class="col">
                        <small class="text-muted">Nenhum registro cadastrado!</small>
                      </div>
                    </li>
                  <?php
                }
              ?>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    <!--//Conteúdo da página-->
    <!-- JavaScript (Opcional) -->
    <script type="text/javascript">
      $("#celular").mask("(00) 00000-0000");
    </script>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!---->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>    
    <script src="categorias_search.js"></script>
    <script src="placa_search.js"></script>
  </body>
</html>