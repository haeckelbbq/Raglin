<?php
include 'module/htmlbegin.php';

// JSON SCRIPT TEST     function myFunction() {
//        alert(JSON.stringify(<?php echo json_encode($charakter) Gibt Charakterdaten in Strinform aus
$jSoncharakter = json_encode($charakter);
$jSonwaffe= json_encode($waffe);
$jSonschild= json_encode($schild);
$jSonruestung=json_encode($ruestung);
$jSongegner=json_encode($gegner);


//if (!isset ($gegner))
//{
//    $gegner = Gegner::loadRandomGegner();
//}

Html::loadCharakterDataTableForm($charakter, $schild, $waffe, $ruestung);
//Html::loadGegnerDataTableForm($gegner);

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
        var charakter = JSON.parse('<?php echo $jSoncharakter ?>')
        var waffe = JSON.parse('<?php echo $jSonwaffe?>');
        var schild = JSON.parse('<?php echo $jSonschild?>');
        var ruestung = JSON.parse('<?php echo $jSonruestung?>');
        var gegner = JSON.parse('<?php echo $jSongegner?>');

        //formatAttributAbkuerzung liest den String aus der bei der waffe notiert ist. er liest den int Wert des passenden Attributs aus, dieser wert wird übertragen

        //Grundwerte des Charakters

        var charakterlptemp = <?php echo $charakter->getAktlebenspunkte()?>;

        var wertattri1 = <?php echo Anzeigeformat::formatAttributAbkuerzung($waffe->getAttri1(),$charakter->getAusstrahlung(), $charakter->getBeweglichkeit(),$charakter->getIntuition(),$charakter->getKonstitution(),$charakter->getMystik(),$charakter->getStaerke(), $charakter->getVerstand(), $charakter->getWillenskraft());?>;
        var wertattri2 = <?php echo Anzeigeformat::formatAttributAbkuerzung($waffe->getAttri2(),$charakter->getAusstrahlung(),$charakter->getBeweglichkeit(),$charakter->getIntuition(),$charakter->getKonstitution(),$charakter->getMystik(),$charakter->getStaerke(), $charakter->getVerstand(), $charakter->getWillenskraft());?>;
        var charakterinitiative =   10 - charakter.intuition;  // 10 ist die Konstante die als Startinitiative festgelegt ist und durch die Intuition des Charakters gesenkt werden kann.
        var verteidigungcharakter =<?php echo 12+$charakter->getBeweglichkeit()+$charakter->getStaerke()+Charakter::getVTDBonusMalusbyGK($groessenklasse)+ $schild->getVerteidigungsbonus() + $ruestung->getVerteidigungsbonus(); ?>;  // 12 ist die Konstante die zu der Verteidigungs immer zugerechnet wird
        var schadensreduktion= schild.schadensreduktion + ruestung.schadensreduktion;
        var fertigkeitsbonuswaffe=<?php echo Charakter::getWaffenfertigkeitswertaktuelleWaffe($waffe->getWaffenart(), $charakter->getHandgemengeskill(), $charakter->getKettenwaffenskill(),$charakter->getKlingenwaffenskill(), $charakter->getStangenwaffenskill() ,$charakter->getHiebwaffenskill() )?>;
        var angriffsbonus= fertigkeitsbonuswaffe +  wertattri1+ wertattri2;
        var gegnerlptemp = gegner.lebenspunkte;

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
            document.getElementById("Kampfprotokoll").innerHTML +='<b>Schaden durch  <?php echo $waffe->getWname();?></b>';

            for($i=0;$i<waffe.wuerfelanzahl;$i++){
                roll = Math.floor(Math.random() * waffe.wuerfelart) + 1;
                document.getElementById("Kampfprotokoll").innerHTML += '<br>Wurf '+ ($i+1) +': ' + roll ;
                wuerfelsummecharakter[$i] = roll;
            }

            document.getElementById("Kampfprotokoll").innerHTML += '<br>Schadensbonus: ' + waffe.schadensbonus + '<br>';
            return wuerfelsummecharakter;
        }

        function getSchadenGegner()
        {
            wuerfelsummegegner = [];
            document.getElementById("Kampfprotokoll").innerHTML +='<b>Schaden von  <?php echo $gegner->getGname();?></b>';
            for(i=0;i<gegner.wuerfelanzahl ;i++)
            {
                roll = Math.floor(Math.random() * gegner.wuerfelart ) + 1;
                document.getElementById("Kampfprotokoll").innerHTML += '<br>Wurf ' + (i+1) +": " + roll;
                wuerfelsummegegner[i] = roll;
            }

            document.getElementById("Kampfprotokoll").innerHTML += '<br>Schadensbonus: ' + gegner.schadensbonus  + '<br>';
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
            loadSpielerstatus();
            loadGegnerstatus();

        }
        function loadSpielerstatus()
        {
            document.getElementById("Spielerstatus").innerHTML = '<h2>' + charakter.cname + '</h2>';
            document.getElementById("Spielerstatus").innerHTML += 'Lebenspunkte: ' + charakterlptemp + '/' + charakter.lebenspunktemax + '<br>';
            document.getElementById("Spielerstatus").innerHTML += 'Schaden: ' + waffe.wuerfelanzahl + 'W' + waffe.wuerfelart + '<br>';
            document.getElementById("Spielerstatus").innerHTML += 'Verteidigung: ' + verteidigungcharakter + '<br>';
            document.getElementById("Spielerstatus").innerHTML += 'Schadensreduktion: ' + schadensreduktion + '<br>';
            document.getElementById("Spielerstatus").innerHTML += 'Angriffsbonus: ' + angriffsbonus + '<br>';
            document.getElementById("Spielerstatus").innerHTML += 'Initiative: ' + charakterinitiative + '<br>';
            document.getElementById("Spielerstatus").innerHTML += '<button onclick="Angriff()" id="angriffsbutton">Angriff</button>';
        }
        function loadGegnerstatus()
        {
            document.getElementById("Gegnerstatus").innerHTML = '<h2>' + gegner.gname  + '</h2>';
            document.getElementById("Gegnerstatus").innerHTML += 'Lebenspunkte: ' + gegnerlptemp + '/' + gegner.lebenspunkte + '<br>';
            document.getElementById("Gegnerstatus").innerHTML += 'Angriffswert: ' + gegner.angriffsbonus + '<br>';
            document.getElementById("Gegnerstatus").innerHTML += 'Verteidigung: ' + gegner.verteidigung + '<br>';
            document.getElementById("Gegnerstatus").innerHTML += 'Schadensreduktion: ' + gegner.schadensreduktion + '<br>';
            document.getElementById("Gegnerstatus").innerHTML += 'Angriffswert: ' + gegner.angriffsbonus + '<br>';
            document.getElementById("Gegnerstatus").innerHTML += 'Initiative: ' + gegner.initiative + '<br><br>';
        }
        function spielerAngriffswertWurf()
        {

            document.getElementById("Kampfprotokoll").innerHTML ='<b>Angriffswert <?php echo $charakter->getCname();?></b> <br>Erster Würfel: ';
            wuerfel1charakter=getWuerfelwurf() ;
            document.getElementById("Kampfprotokoll").innerHTML +=' <br>Zweiter Würfel : ';
            wuerfel2charakter=getWuerfelwurf();
            angriffcharakter=angriffsbonus+wuerfel1charakter+wuerfel2charakter;
            return angriffcharakter;
        }
        function gegnerAngriffswertWurf() {
            document.getElementById("Kampfprotokoll").innerHTML = '<b>Angriffswert von  ' + gegner.gname + '</b>';
            document.getElementById("Kampfprotokoll").innerHTML += '<br> Erster Würfel: ';
            wuerfel1gegner = getWuerfelwurf();
            document.getElementById("Kampfprotokoll").innerHTML += '<br>Zweiter Würfel: ';
            wuerfel2gegner = getWuerfelwurf();
            gegnerangriff = wuerfel1gegner + wuerfel2gegner + gegner.angriffsbonus
            return gegnerangriff;

        }
        function Angriff()
        {
            if (gegnerlptemp > 0 && charakterlptemp >0)
            {
                if (charakterinitiative <= gegner.initiative)
                {
                    angriffcharakter = spielerAngriffswertWurf();
                    charakterinitiative += waffe.waffengeschwindigkeit;
                    document.getElementById("Kampfprotokoll").innerHTML += " <br>Die Initiative erhöht sich um " + waffe.waffengeschwindigkeit + '<br>';
                    loadSpielerstatus();
                    if (angriffcharakter >= gegner.verteidigung)
                    {
                        document.getElementById("Kampfprotokoll").innerHTML += "Du hast getroffen! " + angriffcharakter + " gegen " + gegner.verteidigung + '<br>';
                        schadenswuerfel = getSchadenCharakter();
                        schadenswuerfel = schadenswuerfel.reduce(getSum, 0);
                        Schadenwaffe = schadenswuerfel + waffe.schadensbonus;
                        //    +waffe.schadensbonus-gegner.schadensreduktion;
                        //  else{return 0;}if((wuerfelsumme+waffe.schadensbonus)>gegner.schadensreduktion)
                        gegnerlptemp = gegnerlptemp - Schadenwaffe;
                        if (gegnerlptemp < 0)
                        {
                            gegnerlptemp = 0;
                        }
                        loadSpielerstatus();
                        loadGegnerstatus();
                        document.getElementById("Kampfprotokoll").innerHTML += "Die Waffe trifft mit " + Schadenwaffe + ". Der Gegner hat noch " + gegnerlptemp + " Lebenspunkte" + '<br>';
                    }
                    else
                    {
                        loadSpielerstatus();
                        loadGegnerstatus();
                        document.getElementById("Kampfprotokoll").innerHTML += "Du hast verfehlt" + '<br>';
                    }
                }
                else if (gegner.initiative < charakterinitiative)
                {
                    if (gegnerlptemp >= 0) {
                        gegnerangriff = gegnerAngriffswertWurf();
                        gegner.initiative += <?php echo $gegner->getTickzuschlag();?>;
                        document.getElementById("Kampfprotokoll").innerHTML += " <br>Die Initiative erhöht sich um " + <?php echo $gegner->getTickzuschlag();?>;
                        if (gegnerangriff >= verteidigungcharakter)
                        {
                            document.getElementById("Kampfprotokoll").innerHTML += " <br>Der Gegner hat getroffen " + gegnerangriff + " gegen " + verteidigungcharakter + '<br>';
                            Schadengegner = getSchadenGegner();
                            Schadengegner = Schadengegner.reduce(getSum, 0) + gegner.schadensbonus;
                            charakterlptemp = charakterlptemp - Schadengegner;
                            if (charakterlptemp < 0)
                            {
                                charakterlptemp = 0;
                            }
                            loadSpielerstatus();
                            loadGegnerstatus();
                            document.getElementById("Kampfprotokoll").innerHTML += "Der Gegner trifft mit " + Schadengegner + ' Schaden. Der Charakter hat noch ' + charakterlptemp + ' Lebenspunkte <br>';
                        } else
                        {
                            loadSpielerstatus();
                            loadGegnerstatus();
                            document.getElementById("Kampfprotokoll").innerHTML += "Der Gegner hat verfehlt<br>";
                        }
                    }
                }
                document.getElementById("Kampfprotokoll").innerHTML += "Summe = " + angriff + '<br>';
            }
            else if (gegnerlptemp <= 0)
            {
                document.getElementById("Kampfprotokoll").innerHTML = "Du hast gewonnen<br>";
                document.getElementById("Kampfprotokoll").innerHTML += 'Du erhälst : ' + (2 * <?php echo $gegner->getGegnerklasse();?>) + " Gold und " + (3 * <?php echo $gegner->getGegnerklasse();?>) + " Erfahrungspunkte";
                document.getElementById("Kampfprotokoll").innerHTML += '<br><button><a href="index.php?action=update&area=kampfsieg&cid=<?php echo $charakter->getCid()?>&gid=<?php echo $gegner->getGid() ?>&gegnerklasse=<?php echo $gegner->getGegnerklasse() ?>&aktlebenspunkte=' + charakterlptemp + '">Belohnung einsammeln</a></button>'

            }
            else
            {
                document.getElementById("Kampfprotokoll").innerHTML = "Du hast verloren blabla Malus";
                document.getElementById("Kampfprotokoll").innerHTML += '<br><button><a href="index.php?action=update&area=kampfniederlage&cid=<?php echo $charakter->getCid()?>&aktlebenspunkte=' + charakterlptemp + '">Belohnung einsammeln</a></button>'

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