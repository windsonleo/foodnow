<?php

include "entidade/Item.php";
include "entidade/Carrinho.php";
include "entidade/Cliente.php";
include "entidade/Endereco.php";

session_start();


$iditem = $_GET["iditem"];
$carrinho = $_SESSION["carrinho"];

$itens = $carrinho->getarr_itens();





foreach ($itens as $item) {

	if($iditem == $item->getid()){

		$key = array_search($item, $itens);

			 unset($itens[$key]);
			 $carrinho->setarr_itens($itens);
		//	 $_SESSION["carrinho"] = $carrinho;

	}else {



	}


	}


	$totalitenscarrinho = $carrinho -> CalcularTotalItens();
      $totalvalorcarrinho = $carrinho -> CalcularTotal();
  $carrinho->settotalitens($totalitenscarrinho);
  $carrinho->settotalvalor($totalvalorcarrinho);

	$_SESSION['carrinho'] = $carrinho;
  
	$_SESSION['totalitem'] = $totalitenscarrinho;
	
	$_SESSION['totalvalor'] = $totalvalorcarrinho;


   //https://foodnoww.000webhostapp.com/carrinho.php
    header('Location: http://foodnow.com/carrinho.php');
    exit();




?>