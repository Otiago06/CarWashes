<?php
  include_once("assets/connection/connection_database.php");

  // define variables and set to empty values
  $servico_id = $servico_descricao = $servico_valor = $servico_usuario = $servico_create = $servico_update = "";

  if(isset($_GET['id'])){
    $servico_id = $_GET['id'];
    $sql = "SELECT * FROM tb_servicos WHERE servico_id = '$servico_id'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
      // output data of each row
      $row = $result->fetch_assoc();
      $servico_id =  $row["servico_id"];
      $servico_descricao =  $row["servico_descricao"];
      $servico_categoria =  $row["servico_categoria"];
      $servico_valor =  $row["servico_valor"];
      $servico_create = $row["servico_create"] == NULL ? '' : date('d/m/Y H:i:s', strtotime($row["servico_create"]));
      $servico_update = $row["servico_update"] == NULL ? '' : date('d/m/Y H:i:s', strtotime($row["servico_update"])); 
    } else {
      echo "0 results";
    }
    //$conn->close();
  }    
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
        &nbsp;<a href="servicos.php" class="btn btn-link"><i class="fas fa-arrow-left fa-1x"></i></a>
      </span>
      <span class="navbar-text">
        <a><span class="titulo">SERVIÇOS</span></a>
      </span>
      <span class="navbar-text">
        &nbsp;
      </span>
    </nav>
    <!--//Barra de Navegação-->
    <!--Conteúdo da página--> 
    <div class="container">
      <small class="text-muted">&nbsp;Serviços e Preços</small>
      <form action="<?php echo htmlspecialchars('servicos_edit_return.php');?>" method="post" class="form-floating">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="servico_id" id="servico_id" placeholder="Código" value="<?php echo $servico_id; ?>" readonly>
          <label for="servico_id">Código</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control text-capitalize" name="servico_descricao" id="servico_descricao" placeholder="Informe a descrição da servico" value="<?php echo $servico_descricao; ?>" autofocus required>
          <label for="floatingInput">Descrição</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select" id="servico_categoria" name="servico_categoria" aria-label="Floating label select example" placeholder="Categoria" required>
            <option value="0" selected>Todas as categorias</option>
            <?php
              $sql = "SELECT categoria_id, categoria_descricao FROM tb_categorias";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  ?>
                    <option value="<?php echo $row['categoria_id']; ?>" <?php echo $row['categoria_id'] == $servico_categoria ? 'selected' : ''; ?>><?php echo $row['categoria_descricao']; ?></option>
                  <?php
                }
              } else {
                ?>
                  <option selected disabled>Não registros cadastrados</option>
                <?php
              }
            ?>
          </select>
          <label for="floatingSelect">Categoria do Veículo</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="servico_valor" id="servico_valor" value="<?php echo $servico_valor; ?>" onClick="this.setSelectionRange(0, this.value.length)" placeholder="Valor do serviço" required>
          <label for="floatingInput">Valor</label>
        </div>
        <small>
          <i>
            <?php echo 'Cadastrado em: '.$servico_create; ?><!--<?php echo $servico_update == NULL ? ' por: '.$servico_usuario : ''; ?>--><br>
            <?php echo $servico_update == NULL ? '' : 'Atualizado em: '.$servico_update; ?><!--<?php echo $servico_update == NULL ? '' : ' por: '.$servico_usuario; ?>-->
          </i>                          
        </small>
        <hr>
        <div class="d-grid gap-2">
          <button class="btn btn-dark btn-lg" type="submit"><small>ATUALIZAR</small></button>
          <button class="btn btn-warning btn-lg" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><small>EXCLUIR</small></button>
        </div>
      </form>
    </div><br>
    <!-- Rodapé <hr>-->
    <div class="alert alert-default" role="alert">
      <p class="mb-0" style="text-align: center;"><span>&copy;<?php echo date('Y'). ' CarWashes '.$app_versao; ?></span></p>
    </div>
    <!-- //Rodapé -->
    <!--//Conteúdo da página-->
    <!-- JavaScript (Opcional) -->
    <script type="text/javascript">
      $("#servico_valor").mask('0000.00', {reverse: true});
    </script>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EXCLUSÃO DE REGISTRO!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Tem certeza de que deseja excluir esse registro?<br>Essa opção não pode ser desfeita.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <a href="servicos_delete_return.php?id=<?php echo $servico_id; ?>" type="button" class="btn btn-warning">Deletar</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!---->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>