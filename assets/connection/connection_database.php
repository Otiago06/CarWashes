<?php
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');

	session_start();

	$ambiente = $_SERVER['HTTP_HOST'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "carwashes";
	$app_versao = 'v0.0c';

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	mysqli_query($conn,"SET NAMES 'utf8'");
?>