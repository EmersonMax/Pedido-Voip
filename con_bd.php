#!/usr/bin/php -q
<?php
//require('phpagi.php');
//$agi=new AGI();
// definições de host, database, usuário e senha
$host = "192.168.0.20";
$db   = "pedidos";
$user = "root";
$pass = "";
// conecta ao banco de dados
$con = mysql_connect($host,$user,$pass)or die("Sem acesso ao servidor local de banco de dados: " . mysql_error());
// SELECIONA O BANCO DE DADOS 
mysql_select_db($con,$db) or die("Base de dados Pedidos nao encontrada.");
//CRIA A VARIAVEL VINDO DO ASTERISK
//$NUM_PEDIDO=$argv[1];
// cria a instrução SQL que vai selecionar os dados
$query = sprintf("select * from pedido");
// executa a query
$dados = mysql_query($con, $query) or die(mysqli_error());
// transforma os dados em um array
$linha = mysql_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysql_num_rows($dados);
?>
