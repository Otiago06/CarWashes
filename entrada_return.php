<?php
  include_once("assets/connection/connection_database.php");
  include_once("assets/scripts/test_input.php");

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $placa = strtoupper(test_input($_POST["placa"]));
    $categoria = $_POST['categoria'];
    $modelo = strtoupper(test_input($_POST["modelo"]));
    $cor = $_POST['cor'];
    $uploadimage = $_FILES['uploadimage']['name'];
    $nome = ucfirst(test_input($_POST['nome']));
    $celular = $_POST['celular'];
    $observacoes = ucfirst(test_input($_POST['observacoes']));
  }

  echo "<h1>Entrada de Veículos</h1>";
  echo "Data/Hora da entrada: ".date("d/m/Y H:i:s")."<br>";
  echo 'Placa: '.$placa.'<br>';
  echo 'Categoria: '.$categoria.'<br>';
  echo 'Modelo: '.$modelo.'<br>';
  echo 'Cor: <span style="color: '.$cor.';">'.$cor.'</span><br>';
  echo 'Imagem: '.$uploadimage.'<br>';
  echo 'Tipo de Arquivo: '.pathinfo($uploadimage, PATHINFO_EXTENSION);
  echo '<hr>';
  if(isset($_POST['checkboxvar'])){
    $hobby = $_POST['checkboxvar'];
    
    foreach ($hobby as $hobys=>$value){
      echo "Serviço: ".$value."<br>";
    }
  }
  echo '<hr>';
  echo 'Nome: '.$nome.'<br>';
  echo 'Telefone: '.$celular.'<br>';
  echo "<hr>";
  echo "Observações:<br>";
  echo $observacoes;
?>