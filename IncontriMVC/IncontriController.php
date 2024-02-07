<?php
include_once 'IncontriModel.php';
include_once 'IncontriView.php';
include_once '../PartecipazioniSquadraEdizioneMVC/PartecipazioniSquadraEdizioneModel.php';
class IncontriController {
    private IncontriModel $model;
    private IncontriView $view;
    private PartecipazioniSquadraEdizioneModel $partecipazioniModel;

    public function __construct(IncontriModel $model_edizioni, IncontriView $view_edizioni) {
        $this->model = $model_edizioni;
        $this->view = $view_edizioni;
        $this->partecipazioniModel = new PartecipazioniSquadraEdizioneModel();
    }

    public function mostraIncontri() : void {
        $array_incontri = $this->model->getIncontri($this->partecipazioniModel);
        //$this->partecipazioniModel->getPartecipazioniSingoloParam("id_edizione", "=", $singola_edizione);

        $this->view->visualizzaIncontri($array_incontri);
        return;
    }

    public function mostraIncontriSingolaEdizione($singola_edizione) : void {
        $array_incontri = $this->model->getIncontriSingolaEdizione($singola_edizione, $this->partecipazioniModel);
        //$this->partecipazioniModel->getPartecipazioniSingoloParam("id_edizione", "=", $singola_edizione);

        $this->view->visualizzaIncontri($array_incontri);
        return;
    }

    public function mostraIncontriSQL() : void {
        $array_incontri = $this->model->getIncontri($this->partecipazioniModel);
        //$this->partecipazioniModel->getPartecipazioniSingoloParam("id_edizione", "=", $singola_edizione);

        $this->view->visualizzaIncontri($array_incontri);
        return;
    }

    public function mostraIncontriSingolaEdizioneSQL($singola_edizione) : void {
        $array_incontri = $this->model->getIncontriSingolaEdizione($singola_edizione, $this->partecipazioniModel);
        //$this->partecipazioniModel->getPartecipazioniSingoloParam("id_edizione", "=", $singola_edizione);

        $this->view->visualizzaIncontriInsertIntoSQL($array_incontri);
        return;
    }

    public function mostraClassificaSingolaEdizione($singola_edizione) : void {
        $this->model->getIncontriSingolaEdizione($singola_edizione, $this->partecipazioniModel);
        //$array_partecipazioni = $this->partecipazioniModel->getPartecipazioniSingoloParam("id_edizione", "=", $singola_edizione);
        $array_partecipazioni = $this->partecipazioniModel->getArrayPartecipazioni();
        usort($array_partecipazioni, function($a, $b) {
            // Ordina in base ai punti o a un altro criterio desiderato
            // Ad esempio, se gli elementi hanno una chiave 'punteggio':
            return $b->getPuntiClassifica() - $a->getPuntiClassifica(); // Ordine decrescente per punteggio
        });
        $this->view->visualizzaClassifica($array_partecipazioni);
        return;
    }
}
?>