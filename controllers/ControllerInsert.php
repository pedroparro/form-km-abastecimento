<?php
include("../vendor/autoload.php");
use Models\ClassCrud;

//isset && extract - POST
extract($_POST);

if(isset($_POST['carros']) && isset($_POST['placas']) &&
isset($_POST['motoristas']) && isset($_POST['km_atual']) && isset($_POST['km_final']) &&
isset($_POST['valor_combustivel']) && isset($_POST['litros_abastecimento'])){

//variaveis post
$id = null;
$carros = $_POST['carros'];
$placas = $_POST['placas'];
$motoristas = $_POST['motoristas'];
$km_atual = $_POST['km_atual'];
$km_final = $_POST['km_final'];
$valor_combustivel = $_POST['valor_combustivel'];
$litros_abastecimento = $_POST['litros_abastecimento'];

//instancia
$obj = new ClassCrud();
$obj->insertDB(
        "abastecimentoDois",
        "?,?,?,?,?,?,?,?",
        array(
            $id,
            $carros,
            $placas,
            $motoristas,
            $km_atual,
            $km_final,
            $valor_combustivel,
            $litros_abastecimento,
            )
        );
            header("Location: ../index.php");
            die();
}else{
    header("Location: ../index.php");
    die();
}

?>