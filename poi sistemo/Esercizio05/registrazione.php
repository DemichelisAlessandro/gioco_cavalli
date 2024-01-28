<html lang="it">

<head>
    <title>Esercizio 4 PHP - Massimo di 3 Numeri</title>
    <meta charset="UTF-8" />

    <script type="text/javascript" src="JS/JQuery371.js"></script>
    <script type="text/javascript" src="JS/script.js"></script>

    <!-- Fogli Stile utilizzati-->
    <link rel="stylesheet" type="text/css" href="CSS/style.css" />

    <!-- JavaScript Interni alla Pagina -->
    <script type="text/javascript">

    </script>

</head>

<body>

    <h1>Benvenuto !!</h1>
    <h3>Questi sono i tuoi Dati inseriti:</h3>


    <?php

    $ripetuto = true;
    $vet = array();
    $vet2 = array();
    $vittoria = "";


    if ($_GET["veto"] != null) {
        $stringa = $_GET["veto"];
    } else {
        $stringa = "0";
    }

    $vet = explode(',', $stringa);

    if ($_GET["txtNominativo"] != null) {
        $stringa = $_GET["txtNominativo"];
    } else {
        $stringa = "0,0,0,0";
    }

    $vet2 = explode(',', $stringa);

    while (count($vet) < 48 && $ripetuto) {
        $ripetuto = false;
        $numeroCasuale = random_int(1, 48);
        for ($i = 0; $i < count($vet); $i++) {
            if ($vet[$i] == $numeroCasuale) {
                $ripetuto = true;
            }
        }
    }
    $vet[count($vet)] = $numeroCasuale;
    if($numeroCasuale < 13){
        $vet2[0] += 1;
    }else if($numeroCasuale > 12 && $numeroCasuale < 25){
        $vet2[1] += 1;
    }else if($numeroCasuale > 24 && $numeroCasuale < 37){
        $vet2[2] += 1;
    }else{
        $vet2[3] += 1;
    }

    for($i = 0; $i < 4; $i++){
        if($vet2[$i] >= 7){
            if($i == 0){
                $vittoria = "fiori";
            }else if($i == 1){
                $vittoria = "quadri";
            }else if($i == 2){
                $vittoria = "cuori";
            }else{
                $vittoria = "picche";
            }
        }
    }


    $stringa = implode(',', $vet);
    $stringa2 = implode(',', $vet2);


    echo ("<form action='' id='frmRegistrazione'>
                <p>
                <span>punti semi:</span>
                    <input type='text' id='txtNominativo' name='txtNominativo' placeholder='Inserisci il Cognome/Nome' value='$stringa2' />
                </p>

                <p>
                <span>vet:</span>
                    <input type='text' id='evto' name='veto' placeholder='Inserisci il Cognome/Nome' value='$stringa' />
                </p>

                <p>
                    <input type='button' value='CONFERMA' id='btnConferma' />
                </p>
            </form>

                <p>
                    ha vinto: $vittoria
                </p>
        ");

    ?>

</body>

</html>