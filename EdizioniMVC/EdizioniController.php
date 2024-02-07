<?php
include_once 'EdizioniModel.php';
include_once 'EdizioniView.php';
class EdizioniController {
    private EdizioniModel $model;
    private EdizioniView $view;

    public function __construct(EdizioniModel $model_edizioni, EdizioniView $view_edizioni) {
        $this->model = $model_edizioni;
        $this->view = $view_edizioni;
    }

    public function ottieniEdizioni() : array {
        return $this->model->getEdizioni();
    }

    public function ottieniEdizioniArrayAssociativo() : array {
        return $this->model->getEdizioniArrayAssociativo();
    }
    
    public function ottieniEdizioniArrayAssociativoParametro(string $attributo, mixed $param, string $operatore_paragone = "=") : array {
        return $this->model->getEdizioneArrayAssociativoSingoloParam($attributo, $operatore_paragone, $param);
    }

    public function mostraEdizioni() : void {
        $array_edizioni = $this->model->getEdizioni();
        $this->view->visualizzaEdizioni($array_edizioni);
        return;
    }

    public function mostraEdizioniParametro(string $attributo, mixed $param, string $op = "=") : void {
        $array_edizioni = $this->model->getEdizioneSingoloParam($attributo, $op, $param);
        $this->view->visualizzaEdizioni($array_edizioni);
        return;
    }

}
?>