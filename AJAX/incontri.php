<?php
include_once '../IncontriMVC/IncontriModel.php';
include_once '../IncontriMVC/IncontriView.php';
include_once '../IncontriMVC/IncontriController.php';

$idEdizione = $_GET['idEdizione'];

$model_incontri = new IncontriModel();
$view_incontri = new IncontriView();
$controller_incontri = new IncontriController($model_incontri, $view_incontri);


$controller_incontri->mostraIncontriSingolaEdizione($idEdizione);

?>