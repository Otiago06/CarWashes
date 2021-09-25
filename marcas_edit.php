<?php
  include_once("assets/connection/connection_database.php");

  // define variables and set to empty values
  $marca_id = $marca_modelo = $marca_create = $marca_update = "";

  if(isset($_GET['id'])){
    $marca_id = $_GET['id'];
    $sql = "SELECT * FROM tb_marcas WHERE marca_id = '$marca_id'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
      // output data of each row
      $row = $result->fetch_assoc();
      $marca_id =  $row["marca_id"];
      $marca_modelo =  $row["marca_modelo"];
      $marca_create = $row["marca_create"] == NULL ? '' : date('d/m/Y H:i:s', strtotime($row["marca_create"]));
      $marca_update = $row["marca_update"] == NULL ? '' : date('d/m/Y H:i:s', strtotime($row["marca_update"])); 
    } else {
      echo "0 results";
    }
    $conn->close();
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
        &nbsp;<a href="marcas.php" class="btn btn-link"><i class="fas fa-arrow-left fa-1x"></i></a>
      </span>
      <span class="navbar-text">
        <a><span class="titulo">MARCAS</span></a>
      </span>
      <span class="navbar-text">
        &nbsp;
      </span>
    </nav>
    <!--//Barra de Navegação-->
    <!--Conteúdo da página--> 
    <div class="container">
      <small class="text-muted">&nbsp;Marca de Veículos</small>
      <form action="<?php echo htmlspecialchars('marcas_edit_return.php');?>" method="post" class="form-floating">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="marca_id" id="marca_id" placeholder="Código" value="<?php echo $marca_id; ?>" readonly>
          <label for="marca_id">Código</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control text-uppercase" name="marca_modelo" id="marca_modelo" placeholder="Informe a descrição da marca" value="<?php echo $marca_modelo; ?>" autofocus required>
          <label for="floatingInput">Descrição</label>
        </div>
        <small>
          <i>
            <?php echo 'Cadastrado em: '.$marca_create; ?><!--<?php echo $marca_update == NULL ? ' por: '.$marca_usuario : ''; ?>--><br>
            <?php echo $marca_update == NULL ? '' : 'Atualizado em: '.$marca_update; ?><!--<?php echo $marca_update == NULL ? '' : ' por: '.$marca_usuario; ?>-->
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
            <a href="marcas_delete_return.php?id=<?php echo $marca_id; ?>" type="button" class="btn btn-warning">Deletar</a>
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