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
    <title>FLATICAR</title>
  </head>
  <body>
    <!--Barra de Navegação-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <span class="navbar-text">
        &nbsp;<a href="index.php" class="navbar-brand">&nbsp;<i class="fas fa-arrow-left fa-1x"></i></a>
      </span>
      <span class="navbar-text">
        <a><span class="titulo">CONFIGURAÇÕES</span></a>
      </span>
      <span class="navbar-text">
        &nbsp;
      </span>
    </nav>
    <!--//Barra de Navegação-->
    <!--Conteúdo da página--> 
    <div class="container">
      <small class="text-muted">&nbsp;administração</small>
      <form action="index.php" method="post" class="form-floating">         
        <div class="d-grid gap-2">
          <a href="categorias.php" class="btn btn-dark btn-lg"><small>CATEGORIAS</small></a>
          <a href="marcas.php" class="btn btn-dark btn-lg"><small>MARCAS</small></a>
          <a href="servicos.php" class="btn btn-dark btn-lg"><small>SERVIÇOS E PREÇOS</small></a>
          <!--<a href="index.php" class="btn btn-dark btn-lg"><small>SERVIÇOS E PREÇOS</small></a>
          <a href="index.php" class="btn btn-dark btn-lg"><small>PRODUTOS E ESTOQUE</small></a>
          <a href="index.php" class="btn btn-dark btn-lg"><small>CONFIGURAÇÕES</small></a>
          <a href="index.php" class="btn btn-dark btn-lg"><small>DESPESAS</small></a>
          <a href="index.php" class="btn btn-dark btn-lg"><small>FUNCIONÁRIOS</small></a>-->
        </div>
      </form>
    </div><br>
    <!-- Rodapé <hr>-->
    <div class="alert alert-default" role="alert">
      <p class="mb-0" style="text-align: center;"><span>&copy;<?php echo date('Y'). ' FLATICAR '.$app_versao; ?></span></p>
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
    
  </body>
</html>