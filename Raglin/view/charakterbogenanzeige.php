

<?php
include 'module/htmlbegin.php';
// es folgt ein <html>-Teil der Felder erzeugt die dem User die Möglichkeit bieten, den Charakter bei Erstellung
// individuell mit Werten zu bestücken. Nach absenden werden die
// Werte an die Übergabevariablen in index.php geleitet und an die entsprechenden Methoden übergeben
if(isset($charakter)){
    $ausgegebeneerfahrung=$charakter->getAusgegebeneerfahrung();

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


    $jSoncharakter =    json_encode($charakter);
    $jSonfertigkeiten=  json_encode($aktfertigkeitsbogen);

?>


<br>
            <form action="index.php" method="post">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="area" value="charakter">

            <input type="hidden" name="gesamterfahrung" id="gesamterfahrung" value="<?php echo $charakter->getGesamterfahrung();?>">
            <input type="hidden" id="ausgegebeneerfahrung" name="ausgegebeneerfahrung" value="<?php echo $charakter->getAusgegebeneerfahrung();?>">


    <h1>Charakterbogen</h1>
    <h5>Attribute</h5>
    <table cellspacing="0">
        <tbody>
        <th><tr>
        <td style="text-align:center">Name</td>
        <td style="text-align:center">Ausstrahlung(AUS)</td>
        <td style="text-align:center">Beweglichkeit(BEW)</td>
        <td style="text-align:center">Intuition(INT)</td>
        <td style="text-align:center">Konstitution(KON)</td>
        <td style="text-align:center">Mystik(MYS)</td>
        <td style="text-align:center">Stärke(STA)</td>
        <td style="text-align:center">Verstand(VER)</td>
        <td style="text-align:center">Willenskraft(WIL)</td>

                </th></tr>
            <tr>
                <td style="text-align:center"><?php echo $charakter->getCname(); ?></td>
                <td><input name="ausstrahlung"  onchange="vergleicheAusstrahlung()"   style="text-align:center" type="number" value="<?php echo $charakter->getAusstrahlung();?>"   id="ausstrahlung" min="<?php echo $charakter->getAusstrahlung();?>" max="<?php echo $charakter->getStartausstrahlung()+$heldengrad;?>"></td>
                <td><input name="beweglichkeit" onchange="vergleicheBeweglichkeit()" style="text-align:center" type="number" value="<?php echo $charakter->getBeweglichkeit();?>"   id="beweglichkeit" min="<?php echo $charakter->getBeweglichkeit();?>" max="<?php echo $charakter->getStartbeweglichkeit()+$heldengrad;?>"></td>
                <td><input name="intuition"     onchange="vergleicheIntuition()"     style="text-align:center" type="number" value="<?php echo $charakter->getIntuition();?>"       id="intuition" min="<?php echo $charakter->getIntuition();?>" max="<?php echo $charakter->getStartintuition()+$heldengrad;?>"></td>
                <td><input name="konstitution"  onchange="vergleicheKonstitution()"  style="text-align:center" type="number" value="<?php echo $charakter->getKonstitution();?>"    id="konstitution" min="<?php echo $charakter->getKonstitution();?>" max="<?php echo $charakter->getStartkonstitution()+$heldengrad;?>"></td>
                <td><input name="mystik"        onchange="vergleicheMystik()  "      style="text-align:center" type="number" value="<?php echo $charakter->getMystik();?>"          id="mystik" min="<?php echo $charakter->getMystik();?>" max="<?php echo $charakter->getStartmystik()+$heldengrad;?>"></td>
                <td><input name="staerke"       onchange="vergleicheStaerke()  "     style="text-align:center" type="number" value="<?php echo $charakter->getStaerke();?>"         id="staerke" min="<?php echo $charakter->getStaerke();?>" max="<?php echo $charakter->getStartstaerke()+$heldengrad;?>"></td>
                <td><input name="verstand"      onchange="vergleicheVerstand()  "    style="text-align:center" type="number" value="<?php echo $charakter->getVerstand();?>"        id="verstand" min="<?php echo $charakter->getVerstand();?>" max="<?php echo $charakter->getStartverstand()+$heldengrad;?>"></td>
                <td><input name="willenskraft"  onchange="vergleicheWillenskraft()"  style="text-align:center" type="number" value="<?php echo $charakter->getWillenskraft();?>"    id="willenskraft" min="<?php echo $charakter->getWillenskraft();?>" max="<?php echo $charakter->getStartwillenskraft()+$heldengrad;?>"></td>



            </tr>
        </tbody>
    </table>


    <input onclick="speichererfahrung()" type="button" id="speicherknopf" value="Charakter überprüfen">
    <input disabled="true" type="submit" id="submitbutton" value="Charakter speichern" >
        </form>



    <?php $groessenklasse=Charakter::getGroessenklasseByRasse($charakter->getRasse())  ?>
    <h5>Abgeleitete Werte</h5>
    <table>
        <tbody>
        <th><tr>
        <td>Wertname</td>
        <td style="text-align:center">Abk.</td>
        <td style="text-align:center">Wert</td>
        <td style="text-align:center">mod.</td>
        <td style="text-align:center">temp.</td>
        <td style="text-align:center">Schlüssel</td>
        </th></tr>

            <tr>
        <td>Größenklasse</td>
        <td>GK</td>
        <td style="text-align:center"><?php echo $groessenklasse ?></td>
        <td style="text-align:center"><?php echo $groessenklasse ?></td>
        <td></td>
        <td>Rasse</td></tr>

            <tr>
                <td>Geschwindigkeit</td>
                <td style="text-align:center">GSW</td>
                <td style="text-align:center"><?php echo $groessenklasse+$charakter->getBeweglichkeit() ?></td>
                <td style="text-align:center"></td>
                <td style="text-align:center"></td>
                <td>GK+BEW</td>

            </tr>

            <tr>
                <td>Initative</td>
                <td style="text-align:center">INI</td>
                <td style="text-align:center"><?php echo 10-$charakter->getIntuition() ?></td>
                <td style="text-align:center"></td>
                <td style="text-align:center"></td>
                <td>10-Int</td>


            </tr>

            <tr>
                <td>Lebenspunkte</td>
                <td style="text-align:center">LP</td>
                <td style="text-align:center"><?php echo ($groessenklasse+$charakter->getKonstitution())*5 ?></td>
                <td style="text-align:center"></td>
                <td style="text-align:center"></td>
                <td>5x(GK+KON)</td>


            </tr>
            <tr>
                <td>Verteidigung</td>
                <td style="text-align:center">VTD</td>
                <td style="text-align:center"><?php echo 12+$charakter->getBeweglichkeit()+$charakter->getStaerke()+Charakter::getVTDBonusMalusbyGK($groessenklasse) ?></td>
                <td style="text-align:center"></td>
                <td style="text-align:center"></td>
                <td>12+BEW+STÄ +/-Rasse</td>


            </tr>


        </tbody>
    </table>



    <h5>Fertigkeiten</h5>
<div> <p id="fertigkeiten"></p></div>
    <button onclick="Fertigkeitenanzeigen()" id="fertigkeitenstart">Zeige Fertigkeiten</button>







</table>
<script>
    var charakter = JSON.parse('<?php echo $jSoncharakter ?>')
    var fertigkeitsbogen= JSON.parse('<?php echo $jSonfertigkeiten ?>')

    var erfahrungskosten=0;
    var ausstrahlung=           <?php echo$charakter->getAusstrahlung();?>;
    var beweglichkeit=          <?php echo$charakter->getBeweglichkeit();?>;
    var intuition=              <?php echo$charakter->getIntuition();?>;
    var konstitution=           <?php echo$charakter->getKonstitution();?>;
    var mystik=                 <?php echo$charakter->getMystik();?>;
    var staerke=                <?php echo$charakter->getStaerke();?>;
    var verstand=               <?php echo$charakter->getVerstand();?>;
    var willenskraft=           <?php echo$charakter->getWillenskraft();?>;
    var verfuegbareerfahrung=   <?php echo ($charakter->getGesamterfahrung()-$charakter->getAusgegebeneerfahrung());?>;





    //Fertigkeiten
    var akrobatik =<?php echo Fertigkeiten::getAttributezuFert("akrobatik")?>;
    var alchemie =<?php echo Fertigkeiten::getAttributezuFert("alchemie")?>;
    var anfuehren =<?php echo Fertigkeiten::getAttributezuFert("anfuehren")?>;
    var arkanekunde =<?php echo Fertigkeiten::getAttributezuFert("arkanekunde")?>;
    var athletik =<?php echo Fertigkeiten::getAttributezuFert("athletik")?>;
    var darbietung =<?php echo Fertigkeiten::getAttributezuFert("darbietung")?>;
    var diplomatie =<?php echo Fertigkeiten::getAttributezuFert("diplomatie")?>;
    var edelhandwerk =<?php echo Fertigkeiten::getAttributezuFert("edelhandwerk")?>;
    var empathie =<?php echo Fertigkeiten::getAttributezuFert("empathie")?>;
    var entschlossenheit =<?php echo Fertigkeiten::getAttributezuFert("entschlossenheit")?>;
    var fingerfertigkeit =<?php echo Fertigkeiten::getAttributezuFert("fingerfertigkeit")?>;
    var geschichteundmythen =<?php echo Fertigkeiten::getAttributezuFert("geschichteundmythen")?>;
    var handwerk =<?php echo Fertigkeiten::getAttributezuFert("handwerk")?>;
    var heilkunde =<?php echo Fertigkeiten::getAttributezuFert("heilkunde")?>;
    var heimlichkeit =<?php echo Fertigkeiten::getAttributezuFert("heimlichkeit")?>;
    var jagdkunst =<?php echo Fertigkeiten::getAttributezuFert("jagdkunst")?>;
    var laenderkunde =<?php echo Fertigkeiten::getAttributezuFert("laenderkunde")?>;
    var naturkunde =<?php echo Fertigkeiten::getAttributezuFert("naturkunde")?>;
    var redegewandtheit =<?php echo Fertigkeiten::getAttributezuFert("redegewandtheit")?>;
    var schloesserundfallen =<?php echo Fertigkeiten::getAttributezuFert("schloesserundfallen")?>;
    var schwimmen =<?php echo Fertigkeiten::getAttributezuFert("schwimmen")?>;
    var seefahrt =<?php echo Fertigkeiten::getAttributezuFert("seefahrt")?>;
    var strassenkunde =<?php echo Fertigkeiten::getAttributezuFert("strassenkunde")?>;
    var tierfuehrung =<?php echo Fertigkeiten::getAttributezuFert("tierfuehrung")?>;
    var ueberleben =<?php echo Fertigkeiten::getAttributezuFert("ueberleben")?>;
    var wahrnehmung =<?php echo Fertigkeiten::getAttributezuFert("wahrnehmung")?>;
    var zaehigkeit =<?php echo Fertigkeiten::getAttributezuFert("zaehigkeit")?>;

    function speichererfahrung() {


        document.getElementById('submitbutton').disabled= false;
        document.getElementById("ausgegebeneerfahrung").value = erfahrungskosten+<?php echo $charakter->getAusgegebeneerfahrung();?>;


    }
function Fertigkeitenanzeigen() {


    document.getElementById("fertigkeiten").innerHTML = '<tr><td style="text-align:center">Name</td><td style="text-align:center">Wert</td>' +
        '<td style="text-align:center">Punkte</td><td style="text-align:center">Attribute</td>' +
        ' </tr>';
    document.getElementById("fertigkeiten").innerHTML += '<tr><td>Akrobatik</td>+<td> '
        +(charakter.beweglichkeit+charakter.staerke+fertigkeitsbogen.akrobatik)+'</td>' +
        '    <td> ' + fertigkeitsbogen.akrobatik+' </td>' +
        '    <td> 'charakter.beweglichkeit ' +  'charakter.staerke' </td></tr>';

    document.getElementById("fertigkeiten").innerHTML += '<tr><td>Alchemie</td><td>' +
        (charakter.mystik+charakter.verstand+fertigkeitsbogen.alchemie)+
        '</td><td> '+fertigkeitsbogen.alchemie'+</td><td> ' +
    +charakter.mystik +' + ' +charakter.verstand' </td></tr>';
    document.getElementById("fertigkeiten").innerHTML += '<tr>
        <td>Anführen</td>
        <td> (charakter.ausstrahlung+charakter.willenskraft+fertigkeitsbogen.anfuehren)</td>
        <td> fertigkeitsbogen.anfuehren </td>
        <td> charakter.ausstrahlung " + " charakter.willenskraft </td>


    </tr>';
    document.getElementById("fertigkeiten").innerHTML += '<tr>
        <td>Arkane Kunde</td>
        <td> (charakter.mystik+charakter.verstand+fertigkeitsbogen.arkanekunde)</td>
        <td> fertigkeitsbogen.arkanekunde </td>
        <td> charakter.mystik " + " charakter.verstand </td>


    </tr>';
    document.getElementById("fertigkeiten").innerHTML += '<tr>
        <td>Athletik</td>
        <td> (charakter.beweglichkeit+charakter.staerke+fertigkeitsbogen.athletik)</td>
        <td> fertigkeitsbogen.athletik </td>
        <td> charakter.beweglichkeit " + " charakter.staerke </td>


    </tr>';
    document.getElementById("fertigkeiten").innerHTML += '<tr>
        <td>Darbietung</td>
        <td> (charakter.ausstrahlung+charakter.willenskraft+fertigkeitsbogen.darbietung)</td>
        <td> fertigkeitsbogen.darbietung </td>
        <td> charakter.ausstrahlung " + " charakter.willenskraft </td>


    </tr>';
    document.getElementById("fertigkeiten").innerHTML += '<tr>
        <td>Diplomatie</td>
        <td> (charakter.ausstrahlung+charakter.verstand+fertigkeitsbogen.diplomatie)</td>
        <td> fertigkeitsbogen.diplomatie </td>
        <td> charakter.ausstrahlung " + " charakter.verstand </td>


    </tr>';
    document.getElementById("fertigkeiten").innerHTML += '<tr>
        <td>Edelhandwerk</td>
        <td> (charakter.intuition+charakter.verstand+fertigkeitsbogen.edelhandwerk)</td>
        <td> fertigkeitsbogen.edelhandwerk </td>
        <td> charakter.intuition " + " charakter.verstand </td>


    </tr>';
    document.getElementById("fertigkeiten").innerHTML += '<tr>
        <td>Entschlossenheit</td>
        <td> (charakter.ausstrahlung+charakter.willenskraft+fertigkeitsbogen.entschlossenheit)</td>
        <td> fertigkeitsbogen.entschlossenheit </td>
        <td> charakter.ausstrahlung " + " charakter.willenskraft </td>


    </tr>';


    document.getElementById("fertigkeiten").innerHTML += '<tr>
        <td>Fingerfertigkeit</td>
        <td> (charakter.ausstrahlung+charakter.beweglichkeit+fertigkeitsbogen.fingerfertigkeit)</td>
        <td> fertigkeitsbogen.fingerfertigkeit </td>
        <td> charakter.ausstrahlung " + " charakter.beweglichkeit </td>


    </tr>';



}

    
function vergleicheAusstrahlung() {


    var ausstrahlungtemp = document.getElementById('ausstrahlung').value;

    if (ausstrahlung < ausstrahlungtemp || ausstrahlung > ausstrahlungtemp) {
        erfahrungskosten += ((ausstrahlungtemp - ausstrahlung) * (((ausstrahlungtemp -<?php echo $charakter->getStartausstrahlung();?>) * 5) + 5))
        if (ausstrahlungtemp < ausstrahlung) {
            erfahrungskosten -= 5
        }

        ausstrahlung = ausstrahlungtemp;


        if (erfahrungskosten > verfuegbareerfahrung) {
            document.getElementById("speicherknopf").style.visibility = "hidden";
            document.getElementById('submitbutton').disabled= true;
        } else {
            document.getElementById("speicherknopf").style.visibility = "visible";

        }

    }
}
    function vergleicheBeweglichkeit() {

        var beweglichkeittemp = document.getElementById('beweglichkeit').value;

        if(beweglichkeit < beweglichkeittemp || beweglichkeit > beweglichkeittemp)
        {
            erfahrungskosten += ((beweglichkeittemp-beweglichkeit)*(((beweglichkeittemp-<?php echo$charakter->getStartbeweglichkeit();?>)*5)+5))
            if(beweglichkeittemp<beweglichkeit)
            {erfahrungskosten -=5}

            beweglichkeit=beweglichkeittemp;
        }


        if(erfahrungskosten>verfuegbareerfahrung){
            document.getElementById("speicherknopf").style.visibility = "hidden";
            document.getElementById('submitbutton').disabled= true;
        }
        else{
            document.getElementById("speicherknopf").style.visibility = "visible";

        }
    }

    function vergleicheIntuition() {

        var intuitiontemp = document.getElementById('intuition').value;

        if(intuition < intuitiontemp || intuition > intuitiontemp)
        {
            erfahrungskosten += ((intuitiontemp-intuition)*(((intuitiontemp-<?php echo$charakter->getStartintuition();?>)*5)+5))
            if(intuitiontemp<intuition)
            {erfahrungskosten -=5}

            intuition=intuitiontemp;
        }


        if(erfahrungskosten>verfuegbareerfahrung){
            document.getElementById("speicherknopf").style.visibility = "hidden";
            document.getElementById('submitbutton').disabled= true;
        }
        else{
            document.getElementById("speicherknopf").style.visibility = "visible";
        }
    }

    function vergleicheKonstitution() {

        var konstitutiontemp = document.getElementById('konstitution').value;

        if(konstitution < konstitutiontemp || konstitution > konstitutiontemp)
        {
            erfahrungskosten += ((konstitutiontemp-konstitution)*(((konstitutiontemp-<?php echo$charakter->getStartkonstitution();?>)*5)+5))
            if(konstitutiontemp<konstitution)
            {erfahrungskosten -=5}

            konstitution=konstitutiontemp;
        }


        if(erfahrungskosten>verfuegbareerfahrung){
            document.getElementById("speicherknopf").style.visibility = "hidden";
            document.getElementById('submitbutton').disabled= true;
        }
        else{
            document.getElementById("speicherknopf").style.visibility = "visible";
        }
    }

    function vergleicheMystik() {

        var mystiktemp = document.getElementById('mystik').value;

        if(mystik < mystiktemp || mystik > mystiktemp)
        {
            erfahrungskosten += ((mystiktemp-mystik)*(((mystiktemp-<?php echo$charakter->getStartmystik();?>)*5)+5))
            if(mystiktemp<mystik)
            {erfahrungskosten -=5}

            mystik=mystiktemp;


        }

        if(erfahrungskosten>verfuegbareerfahrung){
            document.getElementById("speicherknopf").style.visibility = "hidden";
            document.getElementById('submitbutton').disabled= true;}
        else{
            document.getElementById("speicherknopf").style.visibility = "visible";
        }
    }


    function vergleicheStaerke() {

        var staerketemp = document.getElementById('staerke').value;

        if(staerke < staerketemp || staerke > staerketemp)
        {
            erfahrungskosten += ((staerketemp-staerke)*(((staerketemp-<?php echo$charakter->getStartstaerke();?>)*5)+5))

            if(staerketemp<staerke)
            {erfahrungskosten -=5};

            staerke=staerketemp;

        }


        if(erfahrungskosten>verfuegbareerfahrung){
            document.getElementById("speicherknopf").style.visibility = "hidden";
            document.getElementById('submitbutton').disabled= true;
        }
        else{
            document.getElementById("speicherknopf").style.visibility = "visible";
        }
    }
    function vergleicheVerstand() {

        var verstandtemp = document.getElementById('verstand').value;

        if(verstand < verstandtemp || verstand > verstandtemp)
        {
            erfahrungskosten += ((verstandtemp-verstand)*(((verstandtemp-<?php echo$charakter->getStartverstand();?>)*5)+5))
            if(verstandtemp<verstand)
            {erfahrungskosten -=5}

            verstand=verstandtemp;

        }

        if(erfahrungskosten>verfuegbareerfahrung){
            document.getElementById("speicherknopf").style.visibility = "hidden";
            document.getElementById('submitbutton').disabled= true;
        }
        else{
            document.getElementById("speicherknopf").style.visibility = "visible";
        }
    }
    function vergleicheWillenskraft() {

        var willenskrafttemp = document.getElementById('willenskraft').value;

        if(willenskraft < willenskrafttemp || willenskraft > willenskrafttemp)
        {
            erfahrungskosten += ((willenskrafttemp-willenskraft)*(((willenskrafttemp-<?php echo$charakter->getStartwillenskraft();?>)*5)+5))
            if(willenskrafttemp<willenskraft)
            {erfahrungskosten -=5}

            willenskraft=willenskrafttemp;
        }

        if(erfahrungskosten>verfuegbareerfahrung){
            document.getElementById("speicherknopf").style.visibility = "hidden";
            document.getElementById('submitbutton').disabled= false;
        }
        else{
            document.getElementById("speicherknopf").style.visibility = "visible";
        }
    }








    // var savechar={  ausstrahlung: getElementByName("austrahlung"), beweglichkeit: getElementByName("beweglichkeit"), intuition: getElementByName("intuition"),
//                 konstitution: getElementByName("konstitution"), mystik: getElementByName("mystik"), staerke: getElementByName("staerke"),
//                 verstand: getElementByName("verstand"), willenskraft: getElementByName("willenskraft");
// }






</script>

<?php } else{?>
    <br>
<h2>Baue einen neuen Charakterer</h2>









    <?php }

include 'module/htmlend.php';