<?php
include_once 'CampionatiModel.php';
include_once 'CampionatiView.php';

class CampionatiController {
    private CampionatiModel $model;
    private CampionatiView $view;

    public function __construct(CampionatiModel $model_campionati, CampionatiView $view_campionati) {
        $this->model = $model_campionati;
        $this->view = $view_campionati;
    }

    public function ottieniCampionati() : array {
        return $this->model->getCampionati();
    }

    public function ottieniCampionatiArrayAssociativo() : array {
        return $this->model->getCampionatiArrayAssociativo();
    }

    public function mostraCampionati() : void {
        $array_campionati = $this->model->getCampionati();
        $this->view->visualizzaCampionati($array_campionati);
        return;
    }

    public function mostraCampionatiParametro(string $attributo, mixed $param, string $op = "=") : void {
        $array_campionati = $this->model->getCampionatoSingoloParam($attributo, $op, $param);
        $this->view->visualizzaCampionati($array_campionati);
        return;
    }
}
?>