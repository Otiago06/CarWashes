<?php
  include_once("assets/connection/connection_database.php");

  // define variables and set to empty values
  $cliente_nome = $cliente_celular = $cliente_cpf = $cliente_aniversario = $cliente_email = $cliente_endereco = $cliente_referencia = $cliente_placa = $cliente_modelo = $cliente_cor = $cliente_categoria = '';

  if(isset($_GET['id'])){
    $cliente_id = $_GET['id'];
    $sql = "SELECT * FROM tb_clientes WHERE cliente_id = '$cliente_id'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
      // output data of each row
      $row = $result->fetch_assoc();
      $cliente_id = $row["cliente_id"];
      $cliente_nome = $row["cliente_nome"];
      $cliente_celular = $row["cliente_celular"];
      $cliente_cpf = $row["cliente_cpf"];
      $cliente_aniversario = $row["cliente_aniversario"];
      $cliente_email = $row["cliente_email"];;
      $cliente_endereco = $row["cliente_endereco"];
      $cliente_referencia = $row["cliente_referencia"];
      $cliente_placa = $row["cliente_placa"];
      $cliente_categoria = $row["cliente_categoria"];
      $cliente_modelo = $row["cliente_modelo"];
      $cliente_cor = $row["cliente_cor"];
      $cliente_create = $row["cliente_create"] == NULL ? '' : date('d/m/Y H:i:s', strtotime($row["cliente_create"]));
      $cliente_update = $row["cliente_update"] == NULL ? '' : date('d/m/Y H:i:s', strtotime($row["cliente_update"])); 
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
        &nbsp;<a href="clientes.php" class="btn btn-link"><i class="fas fa-arrow-left fa-1x"></i></a>
      </span>
      <span class="navbar-text">
        <a><span class="titulo">CLIENTES</span></a>
      </span>
      <span class="navbar-text">
        &nbsp;
      </span>
    </nav>
    <!--//Barra de Navegação-->
    <!--Conteúdo da página--> 
    <div class="container">
      <small class="text-muted">&nbsp;Cadastro de Clientes</small>
      <form action="<?php echo htmlspecialchars('clientes_edit_return.php');?>" method="post" class="form-floating">
        <div class="form-floating mb-3">
          <input type="hidden" class="form-control" name="cliente_id" id="cliente_id" placeholder="Código" value="<?php echo $cliente_id; ?>" readonly>
          <label for="cliente_id">Código</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control text-capitalize" name="cliente_nome" id="cliente_nome" placeholder="Nome" value="<?php echo $cliente_nome; ?>" autofocus required>
          <label for="floatingInput">Nome</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control text-capitalize" name="cliente_celular" id="cliente_celular" value="<?php echo $cliente_celular; ?>" placeholder="Celular">
          <label for="floatingInput">Telefone</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control text-capitalize" name="cliente_cpf" id="cliente_cpf" value="<?php echo $cliente_cpf; ?>" placeholder="CPF">
          <label for="floatingInput">CPF</label>
        </div>
        <div class="form-floating mb-3">
          <input type="date" class="form-control" name="cliente_aniversario" id="cliente_aniversario" value="<?php echo $cliente_aniversario; ?>" placeholder="Aniversario" value="<?php echo date('Y-m-d') ?>">
          <label for="floatingInput">Aniversário</label>
        </div>
        <div class="form-floating mb-3">
          <input type="email" class="form-control text-lowercase" name="cliente_email" id="cliente_email" value="<?php echo $cliente_email; ?>" placeholder="Email">
          <label for="floatingInput">E-mail</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control text-capitalize" name="cliente_endereco" id="cliente_endereco" value="<?php echo $cliente_endereco; ?>" placeholder="Endereço">
          <label for="floatingInput">Endereço</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control text-capitalize" name="cliente_referencia" id="cliente_referencia" value="<?php echo $cliente_referencia; ?>" placeholder="Referência">
          <label for="floatingInput">Referência</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control text-uppercase" name="cliente_placa" id="cliente_placa" value="<?php echo $cliente_placa; ?>" placeholder="Placa" maxlength="7" required>
          <label for="floatingInput">PLACA</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select" id="cliente_categoria" name="cliente_categoria" aria-label="Floating label select example" placeholder="Categoria" required>
            <option selected disabled>Selecione</option>
            <?php
              $sql = "SELECT categoria_id, categoria_descricao FROM tb_categorias";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  ?>
                    <option value="<?php echo $row['categoria_id']; ?>"<?php echo $row['categoria_id'] == $cliente_categoria ? ' selected' : ''; ?>><?php echo $row['categoria_descricao']; ?></option>
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
        <?php
          $sql_marcas = "SELECT marca_modelo FROM tb_marcas";
          $result_marcas = mysqli_query($conn, $sql_marcas);
        ?>
        <div class="form-floating mb-3">
          <input type="text" class="form-control text-capitalize" id="cliente_modelo" name="cliente_modelo" value="<?php echo $cliente_modelo; ?>" placeholder="Digite a marca do veículo." list="datalistOptions" required>
          <label for="cliente_modelo">Marca / Modelo</label>
          <datalist id="datalistOptions">
            <?php while($row = mysqli_fetch_array($result_marcas)) { ?>
                <option value="<?php echo $row['marca_modelo']; ?>"><?php echo $row['marca_modelo']; ?></option>
            <?php } ?>
          </datalist>
        </div>
        <div class="col-12 mb-3">
          <label for="cor" class="form-label">Cor</label>
          <input type="color" class="form-control form-control-color" id="cliente_cor" name="cliente_cor" value="<?php echo $cliente_cor; ?>" title="Selecione uma cor" value="#FF0000" style="width: 100%;" required>
        </div>
        <small>
          <i>
            <?php echo 'Cadastrado em: '.$cliente_create; ?><!--<?php echo $cliente_update == NULL ? ' por: '.$cliente_usuario : ''; ?>--><br>
            <?php echo $cliente_update == NULL ? '' : 'Atualizado em: '.$cliente_update; ?><!--<?php echo $cliente_update == NULL ? '' : ' por: '.$cliente_usuario; ?>-->
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
            <a href="clientes_delete_return.php?id=<?php echo $cliente_id; ?>" type="button" class="btn btn-warning">Deletar</a>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript (Opcional) -->
    <script type="text/javascript">
      $("#cliente_cpf").mask('000.000.000-00', {reverse: true});
      var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
      },
      spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
          }
      };

      $('#cliente_celular').mask(SPMaskBehavior, spOptions);
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