//Ciò che viene eseguito all'avvio della pagina
document.addEventListener("DOMContentLoaded", function () {
    caricaDatiIniziali();

    let selectCampionato = document.getElementById("selectCampionato");
    selectCampionato.addEventListener("change", function() {
        //Chiamata AJAX per caricare le opzioni della seconda select
        caricaEdizioniCampionatiSelect(selectCampionato.value);
    });

    let classifica_btn = document.getElementById('classifica_btn');
    classifica_btn.addEventListener("click", function () {
        let selectEdizione = document.getElementById("selectEdizione");
        if (validaSelezione()) {
            ottieniClassificaDalServer(selectEdizione.value);
        }
    });

    let incontri_btn = document.getElementById('incontri_btn');
    incontri_btn.addEventListener("click", function () {
        let selectEdizione = document.getElementById("selectEdizione");
        if (validaSelezione()) {
            ottieniIncontriDalServer(selectEdizione.value);
        }
    });
});


function validaSelezione() {
    var selectCampionato = document.getElementById("selectCampionato");
    var selectEdizione = document.getElementById("selectEdizione");

    if (selectCampionato.value === "" || selectEdizione.value === "") {
        let outputTable = document.getElementById("outputTable");
        outputTable.innerHTML = "";
        //alert("Seleziona entrambe le opzioni prima di eseguire l'operazione.");
        outputTable.innerHTML = "Seleziona entrambe le opzioni prima di eseguire l'operazione.";
        return false;
    }

    return true;
}



function caricaDatiIniziali() {
    caricaCampionatiSelect();
}

function caricaCampionatiSelect() {
    let selectElement = document.getElementById("selectCampionato");

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "AJAX/carica_campionati_select.php", true);
    xhr.setRequestHeader("Content-type", "application/json");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = JSON.parse(xhr.responseText);
            //let primoElemento = data[0];
            //console.log(primoElemento);
            //console.log(data);

            // Aggiungi opzioni alla select
            data.forEach(function(option) {
                let optionElement = document.createElement("option");
                //optionElement.id = "Ciao ID";
                optionElement.value = option.id_campionato;
                optionElement.text = option.nome_campionato;
                selectElement.appendChild(optionElement);
            });
        }
    };

    xhr.send();
}

function caricaEdizioniCampionatiSelect(idCampionato) {
    let selectEdizione = document.getElementById("selectEdizione");

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "AJAX/carica_edizioni_campionati_select.php?idCampionato=" + idCampionato, true);
    xhr.setRequestHeader("Content-type", "application/json");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let edizioni = JSON.parse(xhr.responseText);

            //Rimuovo le opzioni precedenti
            selectEdizione.innerHTML = "";

            //Aggiungo le nuove opzioni
            edizioni.forEach(function(option) {
                let optionElement = document.createElement("option");
                //optionElement.id = "Ciao ID";
                optionElement.value = option.id_edizione;
                optionElement.text = option.nome_edizione + " " + option.stagione_calcistica;
                selectEdizione.appendChild(optionElement);
            });
        }
    };

    xhr.send();
}

function ottieniIncontriDalServer(idEdizione) {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "AJAX/incontri.php?idEdizione=" + idEdizione, true);
    xhr.setRequestHeader("Content-type", "application/json");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                let outputTable = document.getElementById("outputTable");
                outputTable.innerHTML = xhr.responseText;
            }else {
                console.error("Errore nella chiamata AJAX: " + xhr.statusText);
            }
        }
    };

    xhr.send();
}

function ottieniClassificaDalServer(idEdizione) {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "AJAX/classifica.php?idEdizione=" + idEdizione, true);
    xhr.setRequestHeader("Content-type", "application/json");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                let outputTable = document.getElementById("outputTable");
                outputTable.innerHTML = xhr.responseText;
            } else {
                console.error("Errore nella chiamata AJAX: " + xhr.statusText);
            }
        }
    };

    xhr.send();
}
