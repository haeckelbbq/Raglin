<?php
$jSoncharakter =    json_encode($charakter);
$jSonfertigkeiten=  json_encode($aktfertigkeitsbogen);

if($ausgegebeneerfahrung>=600){
    $heldengrad=4;
}
elseif($ausgegebeneerfahrung>=300){
    $heldengrad=3;
}
elseif($ausgegebeneerfahrung>=100) {
    $heldengrad =2;
} else{
    $heldengrad =1;

}
?>

<table>


    <tr></tr>
    <tr><button onclick="starteprobe()"  id="starteprobe"; this.onclick=null;>Herausforderung annehmen</button></tr>

    <tr></tr>
    <div>

        <p id="probe"></p>
    </div>

</table>

<script>
    var fertigkeitsbogen = JSON.parse('<?php echo $jSonfertigkeiten?>')

    var charakter = JSON.parse('<?php echo $jSoncharakter ?>')


    function starteprobe() {

        var zufallszahl=<?php echo Html::RNG(11) ?>

        switch(zufallszahl){
            case 1
                probe="akrobatik";
                document.getElementById("probe").innerHTML += 'Du kommst an ein steilen Hang, würfel bitte Akrobatik um unverletzt unten anzukommen'+'<br>';

                verlust="leben" ;
                break;
            case 2
                probe="athletik";
                document.getElementById("probe").innerHTML += 'Du musst einen Überhang erklimmen, würfel bitte Athletik um unverletzt oben anzukommen'+'<br>';

                verlust="leben" ;
                break;
            case 3
                probe="diplomatie"
                document.getElementById("probe").innerHTML += 'Der streitlustige Räuber möchte sich mit dir anlegen probierst du ihn davon zu überzeugen, dass das eine dumme idee ist und ihr friedlich auseinander gehen solltet oder greifst du ihn an'+'<br>';

                verlust="kampfmensch" ;
                break;
            case 4
                probe="entschlossenheit"
                document.getElementById("probe").innerHTML += 'Ein spontaner Brand schneidet dir den Weg ab, würfel Entschlossenheit um durch die Flammen in Sicherheit zu kommen'+'<br>';
                verlust="leben" ;
                break;
            case 5
                probe="handwerk";
                document.getElementById("probe").innerHTML += 'Du kommst an eine einsturzgefährdete Brücke würfel auf Handwerk um behelfsmäßig sie sicherer zu machen'+'<br>';
                verlust="leben" ;
                break;
            case 6
                probe="heimlichkeit";
                document.getElementById("probe").innerHTML += 'Ein garstiges Raubtier hat deine Wtterung aufgenommen stellst du dich ihm direkt oder probierst du dich wegzuschleichen'+'<br>';
                verlust="kampftier" ;
                break;
            case 7
                probe="schloesserundfallen";
                document.getElementById("probe").innerHTML += 'Du trittst in eine Falle würfel Schlösser und Fallen um unbeschadet wieder herauszukommen'+'<br>';
                verlust="leben" ;
                break;
            case 8
                probe="schwimmen";
                document.getElementById("probe").innerHTML += 'Die Flut macht dir einen Strich durch die Rechnung du musst ein kleines Stück schwimmen, würfel Schwimmen um wieder sicheren Boden unter die Füße zu bekommen'+'<br>';
                verlust="leben" ;
                break;
            case 9
                probe="ueberleben";
                document.getElementById("probe").innerHTML += 'Ein Sturzregen überrascht dich würfel Überleben um dir einen sicheren Unterschlupf zu finden'+'<br>';
                verlust="leben" ;
                break;
            case 10
                probe="wahrnehmung";
                document.getElementById("probe").innerHTML += 'Du bemerkst etwas aus den Augenwinkel würfel Wahrnehmung um die Gefahr rechtzeitig zu bemerken'+'<br>';
                verlust="kampftier" ;
                break;
            case 11
                probe="zaehigkeit";
                document.getElementById("probe").innerHTML += 'Das Wetter setzt dir zu du fühlst dich schlapp würfel Zähigkeit um die Erkältung abzuschütteln'+'<br>';
                verlust="leben" ;
                break;


        }

        function buttonauswahl(zufallszahl) {


            document.getElementById("probe").innerHTML +='<button onclick="probe1()"  id="starteprobe"; this.onclick=null;></button>';
    
                
        }

    }
</script>