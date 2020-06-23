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

    <button onclick="Kampfstarten()" id="kampfstart">Starte Kampf</button>
    <th>
        <div>
            <p id="Spielerstatus"></p>
        </div>
        </th>
        <th>
        <div>
            <p id="Gegnerstatus"></p>
        </div>
    </th>
<th>

</th>
</table>
    <div class="Kampfprotokoll">
        <p id="Kampfprotokoll"></p>

    </div>




<script>
    //formatAttributAbkuerzung liest den String aus der bei der waffe notiert ist. er liest den int Wert des passenden Attributs aus, dieser wert wird übertragen

    //Grundwerte des Charakters
    var charakterlp = <?php echo $charakter->getLebenspunktemax()?>;
    var charakterlptemp = <?php echo $charakter->getAktlebenspunkte()?>;
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
    var gegnerlptemp = gegnerlp;
    var verteidigunggegner = <?php echo $gegner->getVerteidigung();?>;
    var angriffswertgegner = <?php echo $gegner->getAngriffsbonus();?>;
    var wuerfelanzahlgegner = <?php echo $gegner->getWuerfelanzahl();?>;
    var wuerfelartgegner = <?php echo $gegner->getWuerfelart();?>;
    var schadensbonusgegner = <?php echo $gegner->getSchadensbonus();?>;
    var schadensreduktiongegner = <?php echo $gegner->getSchadensreduktion();?>;

    function getSum(total, num) {
        return total + num;
    }

    function getWuerfelwurf()
    {
        min = Math.ceil(1);
        max = Math.floor(10);
        wuerfelergebnis=Math.floor(Math.random() * (max  - min)) + min;  // returns a random integer from 1 to 10
        document.getElementById("Kampfprotokoll").innerHTML += wuerfelergebnis + ' ' ;
        return wuerfelergebnis;
    }

    function getSchadenCharakter()
    {
        wuerfelsummecharakter = [];
        for($i=0;$i<wuerfelanzahlwaffe;$i++){
            roll = Math.floor(Math.random() * wuerfelartwaffe) + 1;
            document.getElementById("Kampfprotokoll").innerHTML += '<br>Schadenswürfel '+ ($i+1) +': ' + roll ;
            wuerfelsummecharakter[$i] = roll;
    }

        document.getElementById("Kampfprotokoll").innerHTML += '<br>Schadensbonus: ' + schadensbonuswaffe + '<br>';
        return wuerfelsummecharakter;
        }

    function getSchadenGegner()
    {
        wuerfelsummegegner = [];
        for($i=0;$i<wuerfelanzahlgegner ;$i++)
        {
            roll = Math.floor(Math.random() * wuerfelartgegner ) + 1;
            document.getElementById("Kampfprotokoll").innerHTML += '<br>Schadenswürfel' + ($i+1) +": " + roll + '<br>';

            wuerfelsummegegner[$i] = roll;

        }

        document.getElementById("Kampfprotokoll").innerHTML += '<br>Schadensbonus: ' + schadensbonusgegner  + '<br>';
        return wuerfelsummegegner;
    }

    function Kampfstarten() {

        var hidden = false;

        hidden = !hidden;
        if (hidden) {
            document.getElementById('kampfstart').style.visibility = 'hidden';
        } else {
            document.getElementById('kampfstart').style.visibility = 'visible';
        }

        document.getElementById("Gegnerstatus").innerHTML = '<h2><?php echo $gegner->getGname();?></h2>';
        document.getElementById("Gegnerstatus").innerHTML += 'Lebenspunkte: ' + gegnerlptemp + '/' + gegnerlp + '<br>';
        document.getElementById("Gegnerstatus").innerHTML += 'Angriffswert: ' + angriffswertgegner + '<br>';
        document.getElementById("Gegnerstatus").innerHTML += 'Verteidigung: ' + verteidigunggegner + '<br>';
        document.getElementById("Gegnerstatus").innerHTML += 'Schadensreduktion: ' + schadensreduktiongegner + '<br>';
        document.getElementById("Gegnerstatus").innerHTML += 'Angriffswert: ' + angriffswertgegner + '<br><br>';

        document.getElementById("Spielerstatus").innerHTML = '<h2><?php echo $charakter->getCname();?></h2>';
        document.getElementById("Spielerstatus").innerHTML += 'Lebenspunkte: ' + charakterlptemp + '/' + charakterlp + '<br>';
        document.getElementById("Spielerstatus").innerHTML += 'Würfelart: ' + wuerfelartwaffe + '<br>';
        document.getElementById("Spielerstatus").innerHTML += 'Verteidigung: ' + verteidigungcharakter + '<br>';
        document.getElementById("Spielerstatus").innerHTML += 'Schadensreduktion: ' + schadensreduktion + '<br>';
        document.getElementById("Spielerstatus").innerHTML += 'Angriffsbonus: ' + angriffsbonus + '<br>';
        document.getElementById("Spielerstatus").innerHTML +=  '<button onclick="Angriff()" id="angriffsbutton">Angriff</button>';


        document.getElementById("Gegnerstatus").innerHTML = '<h2><?php echo $gegner->getGname();?></h2>';
        document.getElementById("Gegnerstatus").innerHTML += 'Lebenspunkte: ' + gegnerlptemp + '/' + gegnerlp + '<br>';
        document.getElementById("Gegnerstatus").innerHTML += 'Angriffswert: ' + angriffswertgegner + '<br>';
        document.getElementById("Gegnerstatus").innerHTML += 'Verteidigung: ' + verteidigunggegner + '<br>';
        document.getElementById("Gegnerstatus").innerHTML += 'Schadensreduktion: ' + schadensreduktiongegner + '<br>';
        document.getElementById("Gegnerstatus").innerHTML += 'Angriffswert: ' + angriffswertgegner + '<br><br>';

    }

    function Angriff()
    {

        document.getElementById("Kampfprotokoll").innerHTML +='<b>Angriffswert <?php echo $charakter->getCname();?></b> <br>Erster Würfel: ';
            wuerfel1charakter=getWuerfelwurf() ;
        document.getElementById("Kampfprotokoll").innerHTML +=' <br>Zweiter Würfel : ';
            wuerfel2charakter=getWuerfelwurf();
        document.getElementById("Kampfprotokoll").innerHTML +='<br>';
        angriffcharakter=angriffsbonus+wuerfel1charakter+wuerfel2charakter;

        if (gegnerlptemp > 0 && charakterlptemp >0)
        {
            if (angriffcharakter >= verteidigunggegner)
            {
                document.getElementById("Kampfprotokoll").innerHTML += "Du hast getroffen! " + angriffcharakter + " gegen " + verteidigunggegner + '<br>';
                schadenswuerfel = getSchadenCharakter();
                schadenswuerfel = schadenswuerfel.reduce(getSum, 0);
                Schadenwaffe = schadenswuerfel + schadensbonuswaffe;

                //    +schadensbonuswaffe-schadensreduktiongegner;
                //  else{return 0;}if((wuerfelsumme+schadensbonuswaffe)>schadensreduktiongegner)
                gegnerlptemp = gegnerlptemp - Schadenwaffe;
                document.getElementById("Gegnerstatus").innerHTML = '<h2><?php echo $gegner->getGname();?></h2>';
                document.getElementById("Gegnerstatus").innerHTML += 'Lebenspunkte: ' + gegnerlptemp + '/' + gegnerlp + '<br>';
                document.getElementById("Gegnerstatus").innerHTML += 'Angriffswert: ' + angriffswertgegner + '<br>';
                document.getElementById("Gegnerstatus").innerHTML += 'Verteidigung: ' + verteidigunggegner + '<br>';
                document.getElementById("Gegnerstatus").innerHTML += 'Schadensreduktion: ' + schadensreduktiongegner + '<br>';
                document.getElementById("Gegnerstatus").innerHTML += 'Angriffswert: ' + angriffswertgegner + '<br><br>';


                document.getElementById("Kampfprotokoll").innerHTML += "Die Waffe trifft mit " + Schadenwaffe + ". Der Gegner hat noch " + gegnerlptemp + " Lebenspunkte" + '<br>';
                if(gegnerlptemp<=0){
                    document.getElementById('angriffsbutton').style.visibility = 'hidden';
                    document.getElementById("Kampfprotokoll").innerHTML = "Du hast gewonnen";
                }
            }
            else
            {
                document.getElementById("Kampfprotokoll").innerHTML += "Du hast verfehlt" + '<br>';
            }

            if(gegnerlptemp>=0) {
                document.getElementById("Kampfprotokoll").innerHTML += '<br> Erster Würfel: ';
                wuerfel1gegner = getWuerfelwurf();

                document.getElementById("Kampfprotokoll").innerHTML += '<br>Zweiter Würfel: ';
                wuerfel2gegner = getWuerfelwurf() + ' <br>';


                gegnerangriff = wuerfel1gegner + wuerfel2gegner + angriffswertgegner;


                if (gegnerangriff >= verteidigungcharakter) {
                    document.getElementById("Kampfprotokoll").innerHTML += " <br>Der Gegner hat getroffen " + gegnerangriff + " gegen " + verteidigungcharakter + '<br>';
                    Schadengegner = setTimeout(getSchadenGegner, 1000)
                    Schadengegner = Schadengegner.reduce(getSum, 0) + schadensbonusgegner;

                    charakterlptemp = charakterlptemp - Schadengegner;

                    document.getElementById("Spielerstatus").innerHTML = '<h2><?php echo $charakter->getCname();?></h2>';
                    document.getElementById("Spielerstatus").innerHTML += 'Lebenspunkte: ' + charakterlptemp + '/' + charakterlp + '<br>';
                    document.getElementById("Spielerstatus").innerHTML += 'Würfelart: ' + wuerfelartwaffe + '<br>';
                    document.getElementById("Spielerstatus").innerHTML += 'Verteidigung: ' + verteidigungcharakter + '<br>';
                    document.getElementById("Spielerstatus").innerHTML += 'Schadensreduktion: ' + schadensreduktion + '<br>';
                    document.getElementById("Spielerstatus").innerHTML += 'Angriffsbonus: ' + angriffsbonus + '<br>';
                    document.getElementById("Spielerstatus").innerHTML += '<button onclick="Angriff()" id="angriffsbutton">Angriff</button>';

                    document.getElementById("Kampfprotokoll").innerHTML += "Der Gegner trifft mit " + Schadengegner + ' Schaden. Der Charakter hat noch ' + charakterlptemp + ' Lebenspunkte <br>';
                } else {
                    document.getElementById("Kampfprotokoll").innerHTML += "Der Gegner hat verfehlt<br>";
                }
            }
            document.getElementById("Kampfprotokoll").innerHTML += "Summe = " + angriff + '<br>';


            if (gegnerangriff >= verteidigungcharakter)
            {
                charakterlp = charakterlp - <?php echo Kampf::getSchaden($gegner->getWuerfelanzahl(), $gegner->getWuerfelart(), $gegner->getSchadensbonus());?>;
                document.getElementById("Kampfprotokoll").innerHTML += "Gegner hat getroffen";
            }
            else
            {
                document.getElementById("Kampfprotokoll").innerHTML += "Gegner hat verfehlt";
            }

        }
        else if (gegnerlptemp <= 0)
        {
            document.getElementById("Kampfprotokoll").innerHTML = "Du hast gewonnen blabla Belohnung";
        }
        else
        {
            document.getElementById("Kampfprotokoll").innerHTML = "Du hast verloren blabla Malus";
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