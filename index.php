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
    
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">

    <!-- Font Título -->
    <style>
      @font-face {
        font-family: fontTitulo;
        src: url(assets/fonts/paola.ttf);
      }

      .titulo {
        font-family: fontTitulo;
        font-size: 25px;
      }

      .recuo {
        top: -5px;
      }

      .divider {
        height: 4px;
      }

      body {
        background-color: #04252d;
      }
    </style>

    <title>CarWashes</title>
  </head>
  <body>
    <!--Barra de Navegação-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <span class="navbar-text">
        &nbsp;&nbsp;&nbsp;<a class="navbar-brand titulo">CarWashes</a>
      </span>
      <span class="navbar-text">
        &nbsp;
      </span>
      <span class="navbar-text">
        <a class="navbar-brand titulo position-relative" href="#">
          <!--<i class="fas fa-ellipsis-v"></i>-->
        </a>&nbsp;
      </span>
    </nav>
    <!--//Barra de Navegação-->    
    <div class="alert alert-dismissible alert-dark recuo text-center" role="alert">
      <div class="row">
        <div class="col">
          <h1>3</h1>
          <p>PÁTIO</p>
        </div>
        <div class="col">
          <h1>7</h1>
          <p>TOTAL</p>
        </div>        
      </div>
      <hr><!---->
      <p class="mb-0"><strong>MEU LAVA CAR</strong></p>
    </div>
    <div class="container">    
    <div class="row">
      <div class="col">
        <center>
          <a href="entrada.php" class="btn btn-dark btn-lg" style="width: 7rem;">
            <i class="fas fa-sign-in-alt fa-3x"></i><hr>Entrada</a>
          <a href="patio.php" class="btn btn-dark btn-lg" style="width: 7rem;">
            <i class="fas fa-car-garage fa-3x"></i><hr>Pátio</a>
          <a href="#" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 7rem;">
            <i class="fas fa-sign-out-alt fa-3x"></i><hr>Saída</a>
        </center>
      </div>
    </div>
    <div class="divider"></div>
    <div class="row">
      <div class="col">
        <center>
          <a href="#" class="btn btn-dark btn-lg" style="width: 7rem;">
            <i class="fas fa-calendar-alt fa-3x"></i><hr>Agenda</a>
          <a href="clientes.php" class="btn btn-dark btn-lg" style="width: 7rem;">
            <i class="fas fa-users fa-3x"></i><hr>Clientes</a>
          <a href="configuracoes.php" class="btn btn-dark btn-lg" style="width: 7rem;">
            <i class="fas fa-tools fa-3x"></i><hr>Config</a>
        </center>
      </div>
    </div>
    <br>
    </div>
      <div class="d-grid gap-2">
        <a href="login.php" class="btn btn-dark btn-lg"><small><i class="fas fa-car fa-1x"></i></small>&nbsp;SAIR</a>
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
            <h5 class="modal-title" id="exampleModalLabel">Saída de veículos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="pagamento.php" action="post"> 
            <br> 
            <div class="container">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="" maxlength="7">
                <label for="floatingInput">Placa</label>
              </div>
              <div class="text-end">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-dark text-white" type="submit"><small>PESQUISAR</small></button>
              </div>              
            </div>
            <br>
          </form>
          <div class="modal-footer">
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