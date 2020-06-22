
<?php
include 'module/htmlbegin.php';

// JSON SCRIPT TEST     function myFunction() {
//        alert(JSON.stringify(<?php echo json_encode($charakter) Gibt Charakterdaten in Strinform aus



//if (!isset ($gegner))
//{
//    $gegner = Gegner::loadRandomGegner();
//}

Html::loadCharakterDataTableForm($charakter, $schild, $waffe, $ruestung);
//Html::loadGegnerDataTableForm($gegner);
$jSonCharakter = json_encode($charakter);
$jSonGegner = json_encode($gegner);
$groessenklasse=Charakter::getGroessenklasseByRasse($charakter->getRasse());
?>

<div>
    <p id="Kampfprotokollspieler"></p>
</div>
<div>
    <p id="Kampfprotokollgegner"></p>
</div>
<button onclick="Kampfstarten()" id="kampfstart">Starte Kampf</button>



<script>
    //formatAttributAbkuerzung liest den String aus der bei der waffe notiert ist. er liest den int Wert des passenden Attributs aus, dieser wert wird übertragen

    //Grundwerte des Charakters
    var charakterlp = <?php echo $charakter->getLebenspunktemax()?>;
    var wertattri1 = <?php echo Anzeigeformat::formatAttributAbkuerzung($waffe->getAttri1(),$charakter->getBeweglichkeit(),$charakter->getKonstitution(),$charakter->getIntuition(),$charakter->getStaerke());?>;
    var wertattri2 = <?php echo Anzeigeformat::formatAttributAbkuerzung($waffe->getAttri2(),$charakter->getBeweglichkeit(),$charakter->getKonstitution(),$charakter->getIntuition(),$charakter->getStaerke());?>;
    var verteidigungcharakter = <?php echo 12+$charakter->getBeweglichkeit()+$charakter->getStaerke()+Charakter::getVTDBonusMalusbyGK($groessenklasse)+ $schild->getVerteidigungsbonus() + $ruestung->getVerteidigungsbonus(); ?>;
    var schadensreduktion=<?php echo $schild->getSchadensreduktion()+$ruestung->getSchadensreduktion();?>;
    var wuerfelanzahlwaffe=<?php echo $waffe->getWuerfelanzahl();?>;
    var wuerfelartwaffe=<?php echo $waffe->getWuerfelart();?>;
    var schadensbonuswaffe=<?php echo $waffe->getSchadensbonus();?>;
    var fertigkeitsbonuswaffe=<?php echo Charakter::getWaffenfertigkeitswertaktuelleWaffe($waffe->getWaffenart(), $charakter->getHandgemengeskill(), $charakter->getKettenwaffenskill(),$charakter->getKlingenwaffenskill(), $charakter->getStangenwaffenskill() ,$charakter->getHiebwaffenskill() )?>;
    //12 ist die Konstante die zu der Verteidigungs immer zugerechnet wird

    var gegnerlp = <?php echo $gegner->getLebenspunkte();?>;
    var verteidigunggegner = <?php echo $gegner->getVerteidigung();?>;
    var angriffswertgegner = <?php echo $gegner->getAngriffsbonus();?>;
    var schadensbonusgegner = <?php echo $gegner->getSchadensbonus();?>;
    var schadensreduktiongegner = <?php echo $gegner->getSchadensreduktion();?>;

    function getWuerfelwurf2()
    {
        wuerfelergebnis1=Math.floor(Math.random() * 10) + 1;  // returns a random integer from 1 to 10

        return wuerfelergebnis1;
    }



    function getSchadenspieler() {
        wuerfelsumme = 0;
        for($i=0;$i<wuerfelanzahlwaffe;$i++){


            roll = Math.floor(Math.random() * wuerfelartwaffe) + 1;
            document.getElementById("Kampfprotokollspieler").innerHTML += '<br>Würfel: ' + roll + '<br>';
            wuerfelsumme += roll;
        }
        document.getElementById("Kampfprotokollspieler").innerHTML += '<br>Schadensbonus: ' + schadensbonuswaffe + '<br>';
        return wuerfelsumme+schadensbonuswaffe;

    }

    function Kampfstarten() {

        var hidden = false;

            hidden = !hidden;
            if(hidden) {
                document.getElementById('kampfstart').style.visibility = 'hidden';
            } else {
                document.getElementById('kampfstart').style.visibility = 'visible';
            }



        document.getElementById("Kampfprotokollspieler").innerHTML = '<button onclick="Angriff()">Angriff</button>';
        document.getElementById("Kampfprotokollspieler").innerHTML +=  '<h2><?php echo $charakter->getCname();?></h2>' ;
        document.getElementById("Kampfprotokollspieler").innerHTML += 'Lebenspunkte: ' + charakterlp + '<br>';
        document.getElementById("Kampfprotokollspieler").innerHTML += 'Würfelart: ' + wuerfelartwaffe+ '<br>';
        document.getElementById("Kampfprotokollspieler").innerHTML += 'Verteidigung: ' + verteidigungcharakter + '<br>';
        document.getElementById("Kampfprotokollspieler").innerHTML += 'Schadensreduktion: ' + schadensreduktion + '<br>';


        document.getElementById("Kampfprotokollgegner").innerHTML =  '<h2><?php echo $gegner->getGname();?></h2>' ;
        document.getElementById("Kampfprotokollgegner").innerHTML += 'Lebenspunkte: ' + gegnerlp + '<br>';
        document.getElementById("Kampfprotokollgegner").innerHTML += 'Angriffswert: ' + angriffswertgegner+ '<br>';
        document.getElementById("Kampfprotokollgegner").innerHTML += 'Verteidigung: ' + verteidigunggegner + '<br>';
        document.getElementById("Kampfprotokollgegner").innerHTML += 'Schadensreduktion: ' + schadensreduktiongegner + '<br>';



    }

    function Angriff() {
        document.getElementById("Kampfprotokollspieler").innerHTML = '<button onclick="Angriff()">Angriff</button>';
        wuerfel1gegner=getWuerfelwurf2();
        wuerfel2gegner=getWuerfelwurf2();
        wuerfelsummegegner=wuerfel1gegner+wuerfel2gegner;
        angriff= getSchadenspieler();
        gegnerangriff = wuerfelsummegegner+schadensbonusgegner;

        if (gegnerlp >0 && charakterlp >0)
        {

            if(angriff>=verteidigunggegner)
            {
                gegnerlp=gegnerlp-angriff
                document.getElementById("Kampfprotokollspieler").innerHTML +=  "Du hast getroffen";
            }
            else
            {
                document.getElementById("Kampfprotokollspieler").innerHTML +=  "Du hast verfehlt";
            }

        document.getElementById("Kampfprotokollspieler").innerHTML +=  '<h2><?php echo $charakter->getCname();?></h2>' ;
        document.getElementById("Kampfprotokollspieler").innerHTML += "Lebenspunkte: "+ charakterlp+ '<br>';
        document.getElementById("Kampfprotokollspieler").innerHTML += "Angriff" +angriff + '<br>';
        document.getElementById("Kampfprotokollspieler").innerHTML += "Vertd"+ verteidigunggegner + '<br>';

        document.getElementById("Kampfprotokollspieler").innerHTML += "Summe = "+ angriff + '<br>';


        if(gegnerangriff>=verteidigungcharakter)
        {
            charakterlp=charakterlp- <?php echo Kampf::getSchaden($gegner->getWuerfelanzahl(),$gegner->getWuerfelart(),$gegner->getSchadensbonus());?>;
            document.getElementById("Kampfprotokollgegner").innerHTML =  "Gegner hat getroffen";
        }
        else
        {
            document.getElementById("Kampfprotokollgegner").innerHTML =  "Gegner hat verfehlt";
        }

        document.getElementById("Kampfprotokollgegner").innerHTML +=  '<h2><?php echo $gegner->getGname();?></h2>' ;
        document.getElementById("Kampfprotokollgegner").innerHTML += 'Lebenspunkte: ' + gegnerlp + '<br>';
        document.getElementById("Kampfprotokollgegner").innerHTML += 'Angriffswert: ' + angriffswertgegner+ '<br>';
        document.getElementById("Kampfprotokollgegner").innerHTML += 'Verteidigung: ' + verteidigunggegner + '<br>';
        document.getElementById("Kampfprotokollgegner").innerHTML += 'Schadensreduktion: ' + schadensreduktiongegner + '<br>';
        document.getElementById("Kampfprotokollgegner").innerHTML += "W1 = "+ wuerfel1gegner + '<br>';
        document.getElementById("Kampfprotokollgegner").innerHTML += "W2 = "+ wuerfel2gegner + '<br>';
        document.getElementById("Kampfprotokollgegner").innerHTML += "Summe = "+ wuerfelsummegegner+ '<br>'
        }
        if(charakterlp<=0)
        {
            document.getElementById("Kampfprotokollspieler").innerHTML = 'Du hast verloren';
        }
        if(gegnerlp<=0)
        {
            document.getElementById("Kampfprotokollspieler").innerHTML = 'Du hast gewonnen';
        }


    }

</script>

<?php
//Charakter::getCharakterInformation($charakter);
//Db::echoPre($charakter);
//Db::echoPre($waffe);
//Db::echoPre($schild);
//Db::echoPre($ruestung);
include 'module/htmlend.php';
