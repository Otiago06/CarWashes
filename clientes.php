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
        <a><span class="titulo">CLIENTES</span></a>
      </span>
      <span class="navbar-text">
        &nbsp;
      </span>
    </nav>
    <!--//Barra de Navegação-->
    <?php
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
    ?>
    <!--Conteúdo da página--> 
    <div class="container">
    <br>      
        <div class="d-grid gap-2 mb-3">
          <a href="clientes_cad.php" class="btn btn-dark btn-lg" type="button"><small>NOVO CLIENTE</small></a>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control text-capitalize" name="pesquisa" id="pesquisa" placeholder="Digite para pesquisar" autofocus required>
          <label for="floatingInput">Pesquisar Clientes</label>
        </div>
        <small class="text-muted">&nbsp;Lista de Clientes</small>
        <hr>
        <ul class="list-group list-group-flush resultado">
          <?php
            $sql = "SELECT * FROM tb_clientes ORDER BY cliente_nome";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()){
                ?>
                  <a href="<?php echo 'clientes_edit.php?id='.$row['cliente_id']; ?>" class="list-group-item list-group-item-action">
                    <div class="col">
                      <h4 class="text-muted"><?php echo $row['cliente_nome'].'<br>'; ?><i class="fas fa-car" style="color: <?php echo $row['cliente_cor']; ?>"></i>&nbsp;<?php echo $row['cliente_modelo'] ?>&nbsp;(<?php echo $row['cliente_placa']; ?>)</h4>
                    </div>
                  </a>
                <?php
              }
            }else{
              ?>
                <li class="list-group-item text-center">
                  <div class="col">
                    <h4 class="text-muted">Nenhum registro cadastrado!</h4>
                  </div>
                </li>
              <?php
            }
            $conn->close();
          ?>          
        </ul>
        <hr>
    </div><br>
    <!-- Rodapé <hr>-->
    <div class="alert alert-default" role="alert">
      <p class="mb-0" style="text-align: center;"><span>&copy;<?php echo date('Y'). ' CarWashes '.$app_versao; ?></span></p>
    </div>
    <!-- //Rodapé -->
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
    <script type="text/javascript" src="clientes_search.js"></script>
  </body>
</html>