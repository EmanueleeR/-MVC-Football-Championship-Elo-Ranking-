<?php
include_once 'PartecipazioniSquadraEdizioneModel.php';
include_once 'PartecipazioniSquadraEdizioneView.php';
class PartecipazioniSquadraEdizioneController {
    private PartecipazioniSquadraEdizioneModel $model;
    private PartecipazioniSquadraEdizioneView $view;

    public function __construct(PartecipazioniSquadraEdizioneModel $model_partecipazioni, PartecipazioniSquadraEdizioneView $view_partecipazioni) {
        $this->model = $model_partecipazioni;
        $this->view = $view_partecipazioni;
    }

    public function mostraPartecipazioni() : void {
        $array_partecipazioni = $this->model->getPartecipazioni();
        $this->view->visualizzaPartecipazioni($array_partecipazioni);
        return;
    }

    public function mostraPartecipazioniParametro(string $attributo, mixed $param, string $op = "=") : void {
        $array_edizioni = $this->model->getPartecipazioniSingoloParam($attributo, $op, $param);
        $this->view->visualizzaPartecipazioni($array_edizioni);
        return;
    }

}
?>