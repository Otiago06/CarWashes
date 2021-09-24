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
        &nbsp;<a href="configuracoes.php" class="btn btn-link"><i class="fas fa-arrow-left fa-1x"></i></a>
      </span>
      <span class="navbar-text">
        <a><span class="titulo">Servicos</span></a>
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
          <a href="servicos_cad.php" class="btn btn-dark btn-lg" type="button"><small>NOVO SERVIÇO</small></a>
        </div>
        <small class="text-muted">&nbsp;Lista de Serviços</small>
        <hr>
        <ul class="list-group list-group-flush">
          <?php
            $sql = "SELECT * FROM tb_servicos ORDER BY servico_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()){
                $categoria_id = $row['servico_categoria'];
                
                if($categoria_id != '0'){
                  $sql_categoria = "SELECT * FROM tb_categorias WHERE categoria_id = '$categoria_id'";
                  $result_categoria = $conn->query($sql_categoria);

                  if ($result_categoria->num_rows === 1) {
                    // output data of each row
                    $row_categoria = $result_categoria->fetch_assoc();
                    $categoria =  '('.$row_categoria["categoria_descricao"].')';
                  }
                }else{
                  $categoria = '';
                }
                  
                ?>
                  <a href="<?php echo 'servicos_edit.php?id='.$row['servico_id']; ?>" class="list-group-item list-group-item-action">
                    <div class="col text-start">
                      <small class="text-muted"><?php echo $row['servico_descricao'] ?> <?php echo $categoria; ?></small>
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
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!---->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  </body>
</html>