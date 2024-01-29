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

    $ripetuto = true;//serve a controllare se la carta è già stata pescata quando pesco una nuova carta
    $vuoto = true;//serve quando una riga si svuota quindi devo pescare 2 carte ma per visualizzare entrambe le carte mi serve una if con questa variabile
    $vet = array();//contiene tutte le carte pescate finora per evitare ripetizioni
    $vet2 = array();//contiene la posizione dei vari semi nella tabella
    $vet3 = array();//contiene le carte a lato della tabella che vengono pescate quando non ce più nessuno nella righa
    $vittoria = "";//contiene il vincitore
    $scommessa = "";//contiene su chi si scommette

    if ($_GET["sco"] != null) {//questa roba recupera il valore della scommessa
        $scommessa = $_GET["sco"];
    } else {
        $scommessa = "picche";
    }

    if ($_GET["vin"] != null) {//questa riba recupera il valore di vittoria e se è vuoto contina il gioco
        $vittoria = $_GET["vin"];
    } else {
        $vittoria = "";
        if ($_GET["veto"] != null) {//questa roba recupera il valore di vet
            $stringa = $_GET["veto"];
        } else {
            $stringa = "0";
        }

        $vet = explode(',', $stringa);

        if ($_GET["bruh"] != null) {//questa roba recupera il valore di vet3
            $stringa = $_GET["bruh"];
        } else {
            $stringa = "0,0";
        }

        $vet3 = explode(',', $stringa);

        if ($_GET["txtNominativo"] != null) {//questa roba recupera il valore di  vet2
            $stringa = $_GET["txtNominativo"];
        } else {
            $stringa = "0,0,0,0";
        }

        $vet2 = explode(',', $stringa);

        while (count($vet) < 48 && $ripetuto) {//questa roba pesca una carta
            $ripetuto = false;
            $numeroCasuale = random_int(1, 48);
            for ($i = 0; $i < count($vet); $i++) {
                if ($vet[$i] == $numeroCasuale) {
                    $ripetuto = true;
                }
            }
        }
        $vet[count($vet)] = $numeroCasuale;
        if ($numeroCasuale < 13) {//questa roba aggiorna la posizione dei re in vet2
            $vet2[0] += 1;
        } else if ($numeroCasuale > 12 && $numeroCasuale < 25) {
            $vet2[1] += 1;
        } else if ($numeroCasuale > 24 && $numeroCasuale < 37) {
            $vet2[2] += 1;
        } else {
            $vet2[3] += 1;
        }

        if($vet2[0] > 0 && $vet2[1] > 0 && $vet2[2] > 0 && $vet2[3] > 0 && $vet3[0] == 0){//queste enormi if e else if servono per quando una riga si svuota e bisogna quindi pesacre un'altra carta e aggiornare le varie variabili e vettori

            $vuoto = false;

            $ripetuto = true;
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
            $vet3[0] = $numeroCasuale;

        }else if ($vet2[0] > 1 && $vet2[1] > 1 && $vet2[2] > 1 && $vet2[3] > 1 && $vet3[1] == 0){

            $vuoto = false;

            $ripetuto = true;
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
            $vet3[1] = $numeroCasuale;
        }




        $stringa = implode(',', $vet);
        $stringa2 = implode(',', $vet2);//quasi tutte le variabili chiamate stringa nel codice sono completamente inutili visto che si può stampare direttamente il valore della variabile
        $stringa4 = implode(',', $vet3);

        //si inizia la creazione della tabella che viene rifatta da zero tutte le volte che si pesca una carta
        $cose = "    <table border='1'>
    <tr>";
        $cose .= "<td>vincitore</td>";
        for ($i = 0; $i < 4; $i++) {
            if ($vet2[$i] == 3) {
                if ($i == 0) {
                    $vittoria = "fiori";//questa è la creazione della prima riga qundi è anche dove si aggiorna la variabile vittoria
                    $cose .= "<td><img src='IMG/RE1.gif' /></td>";
                } else if ($i == 1) {
                    $vittoria = "quadri";
                    $cose .= "<td><img src='IMG/RE2.gif' /></td>";
                } else if ($i == 2) {
                    $cose .= "<td><img src='IMG/RE3.gif' /></td>";
                    $vittoria = "cuori";
                } else if ($i == 3) {
                    $vittoria = "picche";
                    $cose .= "<td><img src='IMG/RE4.gif' /></td>";
                }
            } else {
                $cose .= "<td></td>";
            }
        }

        $cose .= "</tr> <tr>";
        $cose .= "<td><img src='IMG/dorso.JPG' /></td>";
        for ($i = 0; $i < 4; $i++) {
            if ($vet2[$i] == 2) {//creazione della secona riga
                if ($i == 0) {

                    $cose .= "<td><img src='IMG/RE1.gif' /></td>";
                } else if ($i == 1) {

                    $cose .= "<td><img src='IMG/RE2.gif' /></td>";
                } else if ($i == 2) {

                    $cose .= "<td><img src='IMG/RE3.gif' /></td>";
                } else if ($i == 3) {

                    $cose .= "<td><img src='IMG/RE4.gif' /></td>";
                } else {
                    $cose .= "<td></td>";
                }
            } else {
                $cose .= "<td></td>";
            }
        }

        $cose .= "</tr> <tr>";
        if ($vet3[1] != 0) {
            $stringa5 = $vet3[1];//creazione della terza righa è se è il caso si aggiunge anche la carta accanto che è stata pescata per quando la riga si svuota
            $cose .= "<td><img src='IMG/$stringa5.gif' /></td>";
        } else {
            $cose .= "<td><img src='IMG/dorso.JPG' /></td>";
        }
        for ($i = 0; $i < 4; $i++) {
            if ($vet2[$i] == 1) {
                if ($i == 0) {

                    $cose .= "<td><img src='IMG/RE1.gif' /></td>";
                } else if ($i == 1) {

                    $cose .= "<td><img src='IMG/RE2.gif' /></td>";
                } else if ($i == 2) {

                    $cose .= "<td><img src='IMG/RE3.gif' /></td>";
                } else if ($i == 3) {

                    $cose .= "<td><img src='IMG/RE4.gif' /></td>";
                } else {
                    $cose .= "<td></td>";
                }
            } else {
                $cose .= "<td></td>";
            }
        }

        $cose .= "</tr> <tr>";
        if($vet3[0] != 0){
            $stringa5 = $vet3[0]; //creazione dell'ultima riga (da dove partono i re) righa è se è il caso si aggiunge anche la carta accanto che è stata pescata per quando la riga si svuota
            $cose .= "<td><img src='IMG/$stringa5.gif' /></td>";
        }else{
            $cose .= "<td><img src='IMG/dorso.JPG' /></td>";
        }

        for ($i = 0; $i < 4; $i++) {
            if ($vet2[$i] == 0) {
                if ($i == 0) {
                    $cose .= "<td><img src='IMG/RE1.gif' /></td>";
                } else if ($i == 1) {
                    $cose .= "<td><img src='IMG/RE2.gif' /></td>";
                } else if ($i == 2) {
                    $cose .= "<td><img src='IMG/RE3.gif' /></td>";
                } else if ($i == 3) {
                    $cose .= "<td><img src='IMG/RE4.gif' /></td>";
                } else {
                    $cose .= "<td></td>";
                }
            } else {
                $cose .= "<td></td>";
            }
        }
        if($vuoto){//qua si decide quale carta stampare come ultima carta pescata che dipende dalle righe vuote
            $stringa3 = $vet[count($vet) - 1];
        }else{
            $stringa3 = $vet[count($vet) - 2];
        }
        $cose .= "</tr>";
        //questo è il cuore del codice dove in pratica creo degli input invisibili nei quali metto tutti i valori che voglio memorizzare questo deve essere fatto perchè tutte le volte che richiamo il php tutte le variabili vengono azzerate quindi per memorizzarle siamo costretti a fare questo
        $cose .= "<form action='' id='frmRegistrazione'>

                    <input type='hidden' id='txtNominativo' name='txtNominativo' placeholder='Inserisci il Cognome/Nome' value='$stringa2' />
                    <input type='hidden' id='vin' name='vin' placeholder='Inserisci il Cognome/Nome' value='$vittoria' />
                    <input type='hidden' id='sco' name='sco' placeholder='picche/cuori/quadri/fiori' value='$scommessa'/>

                    <input type='hidden' id='veto' name='veto' placeholder='Inserisci il Cognome/Nome' value='$stringa' />
                    <input type='hidden' id='bruh' name='bruh' placeholder='Inserisci il Cognome/Nome' value='$stringa4' />

                    <input type='button' value='pesca' id='btnConferma' />

            </form>
                <p>
                    ultima carta pescata: <img src='IMG/$stringa3.gif' />
                </p>
                <p>
                    hai scommesso su:$scommessa
                </p>
                <p>
                    ha vinto: $vittoria
                </p>
        ";

        echo ($cose);//cose contiene tutto il body della pagina che viene costruito nel codice
    }








    ?>

</body>

</html>