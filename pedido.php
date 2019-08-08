#!/usr/bin/php7.0
<?php

require_once('phpagi/phpagi.php');
$agi=new AGI();

//CRIA A VARIAVEL VINDO DO ASTERISK
$NUM_PEDIDO=$argv[1];
$QUANTIDADE=$argv[2];



// definições de host, database, usuário e senha

$host = "localhost";

$db   = "pedidos";

$user = "voip";

$pass = "123456";

$PRECO =0;

$VALORTOTAL=0;

$NOMEPRODUTO="TESTE";

$HORA= DATE('H:i');

switch ($NUM_PEDIDO){
	case 10:
        	$PRECO=5.50;
        	$VALORTOTAL=$PRECO * $QUANTIDADE;
		$NOMEPRODUTO="Sanduiche";
		break;
	
	case 11:
        	$PRECO=4;
        	$VALORTOTAL=$PRECO * $QUANTIDADE;
		$NOMEPRODUTO="Pastel";
		break;
	
	case 12:
        	$PRECO=30;
        	$VALORTOTAL=$PRECO * $QUANTIDADE;
		$NOMEPRODUTO="Pizza";		
		break;

	case 13:
        	$PRECO=5;
        	$VALORTOTAL=$PRECO * $QUANTIDADE;
		$NOMEPRODUTO="Refrigerante";			
		break;

	case 14:
        	$PRECO=5.50;
        	$VALORTOTAL=$PRECO * $QUANTIDADE;
		$NOMEPRODUTO="Suco";		
		break;
	case 15:
        	$PRECO=20;
        	$VALORTOTAL=$PRECO * $QUANTIDADE;
		$NOMEPRODUTO="acai";		
		break;
	case 16:
        	$PRECO=35;
        	$VALORTOTAL=$PRECO * $QUANTIDADE;
		$NOMEPRODUTO="file a parmegiana";		
		break;
	case 17:
        	$PRECO=69;
        	$VALORTOTAL=$PRECO * $QUANTIDADE;
		$NOMEPRODUTO="Sushi";		
		break;



}
$agi->set_variable("VALORTOTAL",$VALORTOTAL);
//

// conecta ao banco de dados

$con = mysqli_connect($host,$user,$pass)

     or die("Sem acesso ao servidor local de banco de dados: " . mysqli_error());

// SELECIONA O BANCO DE DADOS 

mysqli_select_db($con,$db) or die("Base de dados Pedidos nao encontrada.");

//VERIFICA O VALOR DO PRODUTO
//if ($NUM_PEDIDO == 10){
//    $PRECO=2.5
//$VALORTOTAL=$PRECO*$QUANTIDADE
	
// cria a instrução SQL que vai selecionar os dados


$query = sprintf("INSERT INTO pedido (pedido,quantidade,valortotal,nomeproduto,hora) VALUES ($NUM_PEDIDO,$QUANTIDADE,$VALORTOTAL,'$NOMEPRODUTO','$HORA')");

// executa a query

mysqli_query($con, $query) or die(mysqli_error());

// transforma os dados emcd 
$linha = mysqli_fetch_assoc($dados);

// calcula quantos dados retornaram

$total = mysqli_num_rows($dados);

?>
