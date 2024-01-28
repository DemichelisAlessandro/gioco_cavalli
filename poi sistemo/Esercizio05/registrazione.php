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



    <?php

    $ripetuto = true;
    $vet = array();
    $vet2 = array();
    $vittoria = "";
    $scommessa = "";

    if ($_GET["sco"] != null) {
        $scommessa = $_GET["sco"];
    } else {
        $scommessa = "picche";
    }

    if ($_GET["vin"] != null) {
        $vittoria = $_GET["vin"];
    } else {
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
        if ($numeroCasuale < 13) {
            $vet2[0] += 1;
        } else if ($numeroCasuale > 12 && $numeroCasuale < 25) {
            $vet2[1] += 1;
        } else if ($numeroCasuale > 24 && $numeroCasuale < 37) {
            $vet2[2] += 1;
        } else {
            $vet2[3] += 1;
        }




        $stringa = implode(',', $vet);
        $stringa2 = implode(',', $vet2);


        $cose = "    <table border='1'>
    <tr> <td>vincitore</td>";

        for ($i = 0; $i < 4; $i++) {
            if ($vet2[$i] == 3) {
                if ($i == 0) {
                    $vittoria = "fiori";
                    $cose .= "<td>fiori</td>";
                } else if ($i == 1) {
                    $vittoria = "quadri";
                    $cose .= "<td>quadri</td>";
                } else if ($i == 2) {
                    $cose .= "<td>cuori</td>";
                    $vittoria = "cuori";
                } else if ($i == 3) {
                    $vittoria = "picche";
                    $cose .= "<td>picche</td>";
                }
            } else {
                $cose .= "<td></td>";
            }
        }

        $cose .= "</tr> <tr>";

        for ($i = 0; $i < 4; $i++) {
            if ($vet2[$i] == 2) {
                if ($i == 0) {

                    $cose .= "<td>fiori</td>";
                } else if ($i == 1) {

                    $cose .= "<td>quadri</td>";
                } else if ($i == 2) {

                    $cose .= "<td>cuori</td>";
                } else if ($i == 3) {

                    $cose .= "<td>picche</td>";
                } else {
                    $cose .= "<td></td>";
                }
            } else {
                $cose .= "<td></td>";
            }
        }

        $cose .= "</tr> <tr>";

        for ($i = 0; $i < 4; $i++) {
            if ($vet2[$i] == 1) {
                if ($i == 0) {

                    $cose .= "<td>fiori</td>";
                } else if ($i == 1) {

                    $cose .= "<td>quadri</td>";
                } else if ($i == 2) {

                    $cose .= "<td>cuori</td>";
                } else if ($i == 3) {

                    $cose .= "<td>picche</td>";
                } else {
                    $cose .= "<td></td>";
                }
            } else {
                $cose .= "<td></td>";
            }
        }

        $cose .= "</tr> <tr>";

        for ($i = 0; $i < 4; $i++) {
            if ($vet2[$i] == 0) {
                if ($i == 0) {
                    $cose .= "<td>fiori</td>";
                } else if ($i == 1) {
                    $cose .= "<td>quadri</td>";
                } else if ($i == 2) {
                    $cose .= "<td>cuori</td>";
                } else if ($i == 3) {
                    $cose .= "<td>picche</td>";
                } else {
                    $cose .= "<td></td>";
                }
            } else {
                $cose .= "<td></td>";
            }
        }

        $cose .= "</tr>";

        $cose .= "<form action='' id='frmRegistrazione'>

                    <input type='hidden' id='txtNominativo' name='txtNominativo' placeholder='Inserisci il Cognome/Nome' value='$stringa2' />
                    <input type='hidden' id='vin' name='vin' placeholder='Inserisci il Cognome/Nome' value='$vittoria' />
<input type='hidden' id='sco' name='sco' placeholder='picche/cuori/quadri/fiori' value='$scommessa'/>

                    <input type='hidden' id='evto' name='veto' placeholder='Inserisci il Cognome/Nome' value='$stringa' />

                    <input type='button' value='pesca' id='btnConferma' />

            </form>
                <p>
                    hai scommesso su:$scommessa
                </p>
                <p>
                    ha vinto: $vittoria
                </p>
        ";

        echo ($cose);
    }








    ?>

</body>

</html>