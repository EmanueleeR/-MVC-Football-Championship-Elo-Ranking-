<?php
include_once 'SingolaSquadraModel.php';
include_once 'SingolaSquadraView.php';

class SingolaSquadraController {
    private SingolaSquadraModel $model;
    private SingolaSquadraView $view;
    public function __construct(SingolaSquadraModel $squadra_model, SingolaSquadraView $squadra_view) {
        $this->model = $squadra_model;
        $this->view = $squadra_view;
    }

    public function mostraDettagliSquadra() : void {
        $this->view->visualizzaDettagliSquadra($this->model);
        return;
    }
}


?>