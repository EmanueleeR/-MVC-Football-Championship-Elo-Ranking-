<?php
include_once 'SingolaPartecipazioneSquadraEdizioneModel.php';
include_once 'SingolaPartecipazioneSquadraEdizioneView.php';

class SingolaPartecipazioneSquadraEdizioneController {
    private SingolaPartecipazioneSquadraEdizioneModel $model;
    private SingolaPartecipazioneSquadraEdizioneView $view;

    public function __construct(SingolaPartecipazioneSquadraEdizioneModel $model_partecipazione, SingolaPartecipazioneSquadraEdizioneView $view_partecipazione) {
        $this->model = $model_partecipazione;
        $this->view = $view_partecipazione;
    }

    public function mostraDettagliPartecipazioneSquadraEdizione() : void {
        $this->view->visualizzaDettagliPartecipazioneSquadraEdizione($this->model);
        return;
    }

    public function modificaPuntiClassifica($p) : void {
        $this->model->setPuntiClassifica($p);
    }

    public function modificaPunteggioElo($elo) : void {
        $this->model->setElo($elo);
    }
}
?>