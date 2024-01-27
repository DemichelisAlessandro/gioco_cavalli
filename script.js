/*function onload(){
    let rand = 0;
    let cont = 0;
    let trovato = 0;
    do {
        rand = Math.round(Math.random() * 48) + 1;
        for(let i; i<vettore.length; i++){
            if(vettore[i] == rand){
                trovato = 1;
            }
        }
        if(trovato == 0){
            vettore.push(rand);
            cont++;
            if(cont==1){
                div1.src(`Immagini Carte/`+ rand +`.gif`);
            }
            if(cont==2){
                div2.src(`Immagini Carte/`+ rand +`.gif`);
            }
            if(cont==3){
                div3.src(`Immagini Carte/`+ rand +`.gif`);
            }
            if(cont==4){
                div4.src(`Immagini Carte/`+ rand +`.gif`);
            }
            if(cont==5){
                div5.src(`Immagini Carte/`+ rand +`.gif`);
            }
            if(cont==6){
                div6.src(`Immagini Carte/`+ rand +`.gif`);
            }
        }

        
    } while (cont <= 6);
}


var div1 = document.getElementById("1");
var div2 = document.getElementById("2");
var div3 = document.getElementById("3");
var div4 = document.getElementById("4");
var div5 = document.getElementById("5");
var div6 = document.getElementById("6");
var div7 = document.getElementById("7");



var vettore = [];*/

document.addEventListener("DOMContentLoaded", function() {
    const showTableButton = document.getElementById("show-table-button");
    const cardsContainer = document.getElementById("cards-container");
    const tableWrapper = document.getElementById("table-wrapper");
    const drawPileImage = document.getElementById("draw-pile-image");

    showTableButton.addEventListener("click", function() {
        cardsContainer.style.display = "flex";
        tableWrapper.style.display = "flex";
        
        createDynamicTable(7, 4);
    });

    function createDynamicTable(rows, cols) {
        let tableHTML = "<table class='game-table'>";
        for (let i = 0; i < rows; i++) {
            tableHTML += "<tr>";
            for (let j = 0; j < cols; j++) {
                if (i < 7 && i > 5 && j < 4) {
                    tableHTML += "<td><img src='../gioco_cavalli-main/Immagini Carte/RE" + (j + 1) + ".gif' alt='Image " + (j + 1) + "'></td>";
                } else {
                    tableHTML += "<td></td>";
                }
            }
            tableHTML += "</tr>";
        }
        tableHTML += "</table>";
        document.getElementById("dynamic-table").innerHTML = tableHTML;
    }
});

