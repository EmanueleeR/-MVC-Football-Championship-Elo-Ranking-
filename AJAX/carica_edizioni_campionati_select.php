<?php
include_once '../EdizioniMVC/EdizioniModel.php';
include_once '../EdizioniMVC/EdizioniView.php';
include_once '../EdizioniMVC/EdizioniController.php';



$idCampionato = $_GET['idCampionato'];
//$edizioni = ottieniEdizioniDaCampionato($idCampionato);

//echo json_encode($edizioni);


//$idCampionato = '1';
$model_edizioni = new EdizioniModel();
$view_edizioni = new EdizioniView();
$controller_edizioni = new EdizioniController($model_edizioni, $view_edizioni);

//$array = $controller_edizioni->ottieniEdizioniArrayAssociativo();

$array = $controller_edizioni->ottieniEdizioniArrayAssociativoParametro("id_campionato", $idCampionato);
$json_dati_da_invio = json_encode($array);

echo $json_dati_da_invio;

?>