<?php

// Funzione per generare casualmente una carta
function generaCarta() {
    $semi = array("Cuori", "Quadri", "Fiori", "Picche");
    $valori = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Regina", "Asso");
    
    $carta = $valori[rand(0, count($valori) - 1)];
    $seme = $semi[rand(0, count($semi) - 1)];

    return array($carta, $seme);
}

// Genera una carta casuale
$carta = generaCarta();

// Cambia il percorso dell'immagine in base alla carta estratta
$percorsoImmagine = "Immagini Carte/{$carta[0]}_di_{$carta[1]}.gif";

// Restituisci il percorso dell'immagine come risposta AJAX
echo $percorsoImmagine;

?>








