<?php
include_once '../CampionatiMVC/CampionatiModel.php';
include_once '../CampionatiMVC/CampionatiView.php';
include_once '../CampionatiMVC/CampionatiController.php';

$model_campionati = new CampionatiModel();
$view_campionati = new CampionatiView();
$controller_campionati = new CampionatiController($model_campionati, $view_campionati);

$array = $controller_campionati->ottieniCampionatiArrayAssociativo();
$json_dati_da_invio = json_encode($array);

echo $json_dati_da_invio;

?>