<?php
include_once 'SingoloIncontroModel.php';
include_once 'SingoloIncontroView.php';

class SingoloIncontroController {
    private $model;
    private $view;

    public function __construct(SingoloIncontroModel $model_incontro, SingoloIncontroView $view_incontro) {
        $this->model = $model_incontro;
        $this->view = $view_incontro;
    }

    public function mostraDettagliIncontro() : void {
        $this->view->visualizzaDettagliIncontro($this->model);
        return;
    }
}
?>