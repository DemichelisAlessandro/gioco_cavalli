<!--
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio di Demi e Firas</title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="server.php" method="POST" enctype="multipart/form-data">

        <input type="submit" value="PESCA" />
    </form>
    <div id="dati1" class="data"></div>
    <div id="dati2" class="data"></div>

    <?php
    /*
    $cont = 0;
    $ripetuto = true;
    $vet = array();

    $aus = $_GET["dati1"];
    foreach ($aus as $valore)
        echo ("$valore - ");
        //$vet[count($vet)] = $valore;

    $cont = $_GET["dati0"];

    while($cont < 48 && $ripetuto){
        $ripetuto = false;
        $numeroCasuale = random_int(1, 48);
        for($i = 0; $i < count($vet); $i++){
            if($vet[$i] == $numeroCasuale){
                $ripetuto = true;
            }
        }
    }
    $cont++;
    $vet[$cont] = $numeroCasuale;
    echo ("<div name='dati0' class='data'>$cont</div>");

    foreach ($vet as $elemento) {
        echo("<div name='dati1' class='data'>$elemento</div>");
    }
    echo ("Nominativo: <b>$numeroCasuale</b> <br/> Nominativo: <b>$cont</b> <br/>");
    */
    ?>
</body>
</html>
-->

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gioco delle Scommesse sul Seme della Carta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gioco delle Scommesse sul Seme della Carta</h1>
    <div class="container">
        <button id="show-table-button">Inizia Gioco</button>

        <div class="cards" id="cards-container">
            <div class="card">1</div>
            <div class="card">2</div>
            <div class="card">3</div>
            <div class="card">4</div>
            <div class="card">5</div>
            <div class="card">6</div>
            <div class="card">7</div>
        </div>
        <div class="table-wrapper" id="table-wrapper" style="display: none;">
            <div id="dynamic-table"></div>
            <form method="post">
                <label for="scommessa">Scegli un seme (Cuori, Quadri, Fiori, Picche):</label><br>
                <input type="text" id="scommessa" name="scommessa"><br><br>
                <input type="submit" value="Scommetti">
            </form>
            <div class="draw-pile" id="draw-pile-image">
                <img src="../gioco_cavalli-main/Immagini Carte/dorso.JPG" alt="Draw Pile Image" id="draw-pile-image">
            </div>
        </div>
    </div>
    <script src="script.js"></script>

    <?php

    // Funzione per generare casualmente una carta
    function generaCarta() {
        $semi = array("Cuori", "Quadri", "Fiori", "Picche");
        $valori = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Regina", "Re", "Asso");
        
        $carta = $valori[rand(0, count($valori) - 1)];
        $seme = $semi[rand(0, count($semi) - 1)];

        return array($carta, $seme);
    }

    // Funzione per determinare se il seme della carta corrisponde alla scommessa
    function confrontaCarta($carta, $scommessa) {
        return $carta[1] === $scommessa;
    }

    // Genera una carta casuale
    $carta = generaCarta();

    // Se l'utente ha inviato una scommessa
    if(isset($_POST['scommessa'])) {
        $scommessa = $_POST['scommessa'];
        
        // Controlla se la scommessa dell'utente è corretta
        $risultato = confrontaCarta($carta, $scommessa);
        $risultatoMessaggio = $risultato ? "Hai vinto! Il seme della carta è $scommessa." : "Hai perso! Il seme della carta è {$carta[1]}, non $scommessa.";
    } else {
        $risultatoMessaggio = "";
    }

    ?>

</body>
</html>

