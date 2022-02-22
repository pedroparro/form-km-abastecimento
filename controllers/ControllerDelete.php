<?php
include("../vendor/autoload.php");
use Models\ClassCrud;

try {
   //isset GET
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        //instancia
        $crud = new ClassCrud();
        $crud->deleteDB("abastecimentoDois","where id=?",array($id));

        header("Location: ../pages/fuel.php");
        die();
    }else{
        header("Location: ../pages/fuel.php");
        die();
    }
} catch (\PDOException $erro) {
    echo "Erro";
    return $erro->getMessage();
}
?>