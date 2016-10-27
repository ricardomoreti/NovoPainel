<?php
  $NomePessoa = (isset($_GET['NomePessoa'])) ? $_GET['NomePessoa'] : '';
  $Email = (isset($_GET['Email'])) ? $_GET['Email'] : '';

  if($NomePessoa == ''){
  	$CriterioNomePessoa = '';
  } else {
  	$CriterioNomePessoa = "AND NomePessoa LIKE '%".$NomePessoa."%' ";
  }

  if($Email == ''){
  	$CriterioEmail = '';
  } else {
  	$CriterioEmail = "AND Email LIKE '%".$Email."%' ";
  }

  $Criterios = $CriterioNomePessoa.$CriterioEmail;

  if(strcmp(substr($Criterios, 0, 3), "AND") == 0){
	  $Criterios = " WHERE " . substr($Criterios, 4, strlen($Criterios));
  }
  
  $sqlRead = "SELECT * FROM tb_pessoas ".$Criterios;
  echo $sqlRead;
?>                          