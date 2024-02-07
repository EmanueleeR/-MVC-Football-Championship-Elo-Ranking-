<?php
include_once 'SingoloCampionatoModel.php';
include_once 'SingoloCampionatoView.php';

class SingoloCampionatoController {
    private $model;
    private $view;

    public function __construct(SingoloCampionatoModel $model_campionato, SingoloCampionatoView $view_campionato) {
        $this->model = $model_campionato;
        $this->view = $view_campionato;
    }

    public function mostraDettagliCampionato() : void {
        $this->view->visualizzaDettagliCampionato($this->model);
        return;
    }
}
?>