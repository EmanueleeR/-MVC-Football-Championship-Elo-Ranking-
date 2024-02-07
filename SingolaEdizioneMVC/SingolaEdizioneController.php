<?php
include_once 'SingolaEdizioneModel.php';
include_once 'SingolaEdizioneView.php';

class SingolaEdizioneController {
    private SingolaEdizioneModel $model;
    private SingolaEdizioneView $view;

    public function __construct(SingolaEdizioneModel $model_edizione, SingolaEdizioneView $view_edizione) {
        $this->model = $model_edizione;
        $this->view = $view_edizione;
    }

    public function mostraDettagliEdizione() : void {
        $this->view->visualizzaDettagliEdizione($this->model);
        return;
    }
}
?>