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
<table>


    <th>
        <div>
            <p id="Spielerstatus"></p>
        </div>
        <div>
            <p id="Gegnerstatus"></p>
        </div>
    </th>
</table>
    <div class="Kampfprotokoll">
        <p id="Kampfprotokoll"></p>
    </div>

    <button onclick="Kampfstarten()" id="kampfstart">Starte Kampf</button>



<script>
    //formatAttributAbkuerzung liest den String aus der bei der waffe notiert ist. er liest den int Wert des passenden Attributs aus, dieser wert wird übertragen

    //Grundwerte des Charakters
    var charakterlp = <?php echo $charakter->getLebenspunktemax()?>;
    var wertattri1 = <?php echo Anzeigeformat::formatAttributAbkuerzung($waffe->getAttri1(),$charakter->getBeweglichkeit(),$charakter->getKonstitution(),$charakter->getIntuition(),$charakter->getStaerke());?>;
    var wertattri2 = <?php echo Anzeigeformat::formatAttributAbkuerzung($waffe->getAttri2(),$charakter->getBeweglichkeit(),$charakter->getKonstitution(),$charakter->getIntuition(),$charakter->getStaerke());?>;
    //12 ist die Konstante die zu der Verteidigungs immer zugerechnet wird
    var verteidigungcharakter = <?php echo 12+$charakter->getBeweglichkeit()+$charakter->getStaerke()+Charakter::getVTDBonusMalusbyGK($groessenklasse)+ $schild->getVerteidigungsbonus() + $ruestung->getVerteidigungsbonus(); ?>;
    var schadensreduktion=<?php echo $schild->getSchadensreduktion()+$ruestung->getSchadensreduktion();?>;
    var wuerfelanzahlwaffe=<?php echo $waffe->getWuerfelanzahl();?>;
    var wuerfelartwaffe=<?php echo $waffe->getWuerfelart();?>;
    var schadensbonuswaffe=<?php echo $waffe->getSchadensbonus();?>;
    var fertigkeitsbonuswaffe=<?php echo Charakter::getWaffenfertigkeitswertaktuelleWaffe($waffe->getWaffenart(), $charakter->getHandgemengeskill(), $charakter->getKettenwaffenskill(),$charakter->getKlingenwaffenskill(), $charakter->getStangenwaffenskill() ,$charakter->getHiebwaffenskill() )?>;
    var angriffsbonus= fertigkeitsbonuswaffe +  wertattri1+ wertattri2;
    var schdensreduktioncharakter=<?php echo $schild->getSchadensreduktion() + $ruestung->getSchadensreduktion(); ?>;

    var gegnerlp = <?php echo $gegner->getLebenspunkte();?>;
    var verteidigunggegner = <?php echo $gegner->getVerteidigung();?>;
    var angriffswertgegner = <?php echo $gegner->getAngriffsbonus();?>;
    var wuerfelanzahlahlgegner = <?php echo $gegner->getWuerfelanzahl();?>;
    var wuerfelartgegner = <?php echo $gegner->getWuerfelart();?>;
    var schadensbonusgegner = <?php echo $gegner->getSchadensbonus();?>;
    var schadensreduktiongegner = <?php echo $gegner->getSchadensreduktion();?>;

    function getWuerfelwurf()
    {
        min = Math.ceil(1);
        max = Math.floor(10);
        wuerfelergebnis=Math.floor(Math.random() * (max  - min)) + min  // returns a random integer from 1 to 10
        document.getElementById("Kampfprotokoll").innerHTML += '<br>Würfel: ' + wuerfelergebnis + '<br>';
        return wuerfelergebnis;
    }

    function getSchadenCharakter()
    {
        wuerfelsumme = 0;
        for($i=0;$i<wuerfelanzahlwaffe;$i++){
            roll = Math.floor(Math.random() * wuerfelartwaffe) + 1;
            document.getElementById("Kampfprotokoll").innerHTML += '<br>Würfel: ' + roll + '<br>';
            wuerfelsumme += roll;
        }

        document.getElementById("Kampfprotokoll").innerHTML += '<br>Schadensbonus: ' + schadensbonuswaffe + '<br>';
        if((wuerfelsumme+schadensbonuswaffe)>schadensreduktiongegner) return wuerfelsumme+schadensbonuswaffe-schadensreduktiongegner;
        else{return 0;}
    }

    function getSchadenGegner()
    {
        wuerfelsumme = 0;
        for($i=0;$i<wuerfelanzahlahlgegner ;$i++)
        {
            roll = Math.floor(Math.random() * wuerfelartgegner ) + 1;
            document.getElementById("Kampfprotokoll").innerHTML += '<br>Würfel: ' + roll + '<br>';
            wuerfelsumme += roll;
        }

        document.getElementById("Kampfprotokoll").innerHTML += '<br>Schadensbonus: ' + schadensbonusgegner  + '<br>';
        if((wuerfelsumme+schadensbonusgegner )
            >schdensreduktioncharakter)
            return wuerfelsumme+schadensbonusgegner-schdensreduktioncharakter;
        else{return 0;}
    }

    function Kampfstarten() {

        var hidden = false;

        hidden = !hidden;
        if (hidden) {
            document.getElementById('kampfstart').style.visibility = 'hidden';
        } else {
            document.getElementById('kampfstart').style.visibility = 'visible';
        }

        document.getElementById("Spielerstatus").innerHTML = '<h2><?php echo $charakter->getCname();?></h2>';
        document.getElementById("Spielerstatus").innerHTML += 'Lebenspunkte: ' + charakterlp + '<br>';
        document.getElementById("Spielerstatus").innerHTML += 'Würfelart: ' + wuerfelartwaffe + '<br>';
        document.getElementById("Spielerstatus").innerHTML += 'Verteidigung: ' + verteidigungcharakter + '<br>';
        document.getElementById("Spielerstatus").innerHTML += 'Schadensreduktion: ' + schadensreduktion + '<br>';
        document.getElementById("Spielerstatus").innerHTML += '<button onclick="Angriff()">Angriff</button>';

        document.getElementById("Gegnerstatus").innerHTML = '<h2><?php echo $gegner->getGname();?></h2>';
        document.getElementById("Gegnerstatus").innerHTML += 'Lebenspunkte: ' + gegnerlp + '<br>';
        document.getElementById("Gegnerstatus").innerHTML += 'Angriffswert: ' + angriffswertgegner + '<br>';
        document.getElementById("Gegnerstatus").innerHTML += 'Verteidigung: ' + verteidigunggegner + '<br>';
        document.getElementById("Gegnerstatus").innerHTML += 'Schadensreduktion: ' + schadensreduktiongegner + '<br>';
    }



    function Angriff()
    {


        if (gegnerlp >0 && charakterlp >0)
        {
            document.getElementById("Spielerstatus").innerHTML = '<button onclick="Angriff()">Angriff</button>';
        }
        wuerfel1charakter=getWuerfelwurf();
        wuerfel2charakter=getWuerfelwurf();
        angriffcharakter=angriffsbonus+wuerfel1charakter+wuerfel2charakter;

        if(angriffcharakter>=verteidigunggegner)
        {
            document.getElementById("Kampfprotokoll").innerHTML +=  "Du hast getroffen"+'<br>';
            Schadenwaffe=getSchadenCharakter()
            gegnerlp=gegnerlp-Schadenwaffe;
            document.getElementById("Kampfprotokoll").innerHTML +=   "Die Waffe trifft mit " + Schadenwaffe + " der Gegner hat noch "+gegnerlp+ " Lebenspunkte"+'<br>';

            if(gegnerlp<=0)
            {
                document.getElementById("Kampfprotokoll").innerHTML += 'Du hast gewonnen';
            }
        }else{
            document.getElementById("Kampfprotokoll").innerHTML +=  "Du hast verfehlt";
        }

        wuerfel1gegner=getWuerfelwurf();
        wuerfel2gegner=getWuerfelwurf();
        gegnerangriff=wuerfel1gegner+wuerfel2gegner+angriffswertgegner;


        if(gegnerlp>0&&gegnerangriff>=verteidigungcharakter) {
            document.getElementById("Kampfprotokoll").innerHTML +=  "Der Gegner hat getroffen"+'<br>';
            Schadengegner=getSchadenGegner()
            charakterlp=charakterlp-Schadengegner;
            document.getElementById("Kampfprotokoll").innerHTML +=   "Die Waffe trifft mit " + Schadengegner + '<br>';
            if(charakterlp<=0)
            {
                document.getElementById("Kampfprotokoll").innerHTML += 'Du hast verloren';
            }
        }else{
            document.getElementById("Kampfprotokoll").innerHTML +=  "Der Gegner hat verfehlt";
        }

        document.getElementById("Kampfprotokoll").innerHTML += "Summe = "+ angriff + '<br>';


        if(gegnerangriff>=verteidigungcharakter)
        {
            charakterlp=charakterlp- <?php echo Kampf::getSchaden($gegner->getWuerfelanzahl(),$gegner->getWuerfelart(),$gegner->getSchadensbonus());?>;
            document.getElementById("Kampfprotokoll").innerHTML +=  "Gegner hat getroffen";
        }
        else
        {
            document.getElementById("Kampfprotokoll").innerHTML +=  "Gegner hat verfehlt";
        }

        document.getElementById("Kampfprotokoll").innerHTML +=  '<h2><?php echo $gegner->getGname();?></h2>' ;
        document.getElementById("Kampfprotokoll").innerHTML += 'Lebenspunkte: ' + gegnerlp + '<br>';
        document.getElementById("Kampfprotokoll").innerHTML += 'Angriffswert: ' + angriffswertgegner+ '<br>';
        document.getElementById("Kampfprotokoll").innerHTML += 'Verteidigung: ' + verteidigunggegner + '<br>';
        document.getElementById("Kampfprotokoll").innerHTML += 'Schadensreduktion: ' + schadensreduktiongegner + '<br>';
        document.getElementById("Kampfprotokoll").innerHTML += "W1 = "+ wuerfel1gegner + '<br>';
        document.getElementById("Kampfprotokoll").innerHTML += "W2 = "+ wuerfel2gegner + '<br>';
        document.getElementById("Kampfprotokoll").innerHTML += "Summe = "+ wuerfelsummegegner+ '<br>'




    }



</script>

<?php
//Charakter::getCharakterInformation($charakter);
//Db::echoPre($charakter);
//Db::echoPre($waffe);
//Db::echoPre($schild);
//Db::echoPre($ruestung);
include 'module/htmlend.php';