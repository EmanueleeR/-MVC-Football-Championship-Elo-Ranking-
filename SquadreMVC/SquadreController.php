<?php
include_once 'SquadreModel.php';
include_once 'SquadreView.php';

class SquadreController {
    private SquadreModel $model;
    private SquadreView $view;

    public function __construct(SquadreModel $squadre_model, SquadreView $squadre_view) {
        $this->model = $squadre_model;
        $this->view = $squadre_view;
    }

    public function mostraSquadre() : void {
        $squadre = $this->model->getSquadre();
        $this->view->visualizzaSquadre($squadre); //Passa solo l'array di squadre
    }

    public function mostraSquadreParametro($attributo, $param) : void {
        $squadre = $this->model->getSquadraSingoloParam($attributo, $param);
        $this->view->visualizzaSquadre($squadre);
    }
}

?>