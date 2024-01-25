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

    ?>
    
</body>
</html>