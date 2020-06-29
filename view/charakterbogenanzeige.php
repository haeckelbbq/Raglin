

<?php
include 'module/htmlbegin.php';
// es folgt ein <html>-Teil der Felder erzeugt die dem User die Möglichkeit bieten, den Charakter bei Erstellung
// individuell mit Werten zu bestücken. Nach absenden werden die
// Werte an die Übergabevariablen in index.php geleitet und an die entsprechenden Methoden übergeben
if(isset($charakter)){


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
    if(isset($aktfertigkeitsbogen)){
    $jSoncharakter =    json_encode($charakter);
    $jSonfertigkeiten=  json_encode($aktfertigkeitsbogen);
}

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
        <td style="text-align:center">Attribute</td>
        <td style="text-align:center">Werte</td>








                </th></tr>


            <tr> <td style="text-align:center">Ausstrahlung</td><td><input size="10%" name="ausstrahlung"  onchange="vergleicheAusstrahlung()"  style="text-align:center" type="number" value="<?php echo $charakter->getAusstrahlung();?>"   id="ausstrahlung" min="<?php echo $charakter->getAusstrahlung();?>" max="<?php echo $charakter->getStartausstrahlung()+$heldengrad;?>"></td></tr>
            <tr>   <td style="text-align:center">Beweglichkeit(BEW)</td><td><input size="10%"  name="beweglichkeit" onchange="vergleicheBeweglichkeit()" style="text-align:center" type="number" value="<?php echo $charakter->getBeweglichkeit();?>"   id="beweglichkeit" min="<?php echo $charakter->getBeweglichkeit();?>" max="<?php echo $charakter->getStartbeweglichkeit()+$heldengrad;?>"></td></tr>
            <tr><td style="text-align:center">Intuition(INT)</td>   <td><input size="10%"  name="intuition"     onchange="vergleicheIntuition()"     style="text-align:center" type="number" value="<?php echo $charakter->getIntuition();?>"       id="intuition" min="<?php echo $charakter->getIntuition();?>" max="<?php echo $charakter->getStartintuition()+$heldengrad;?>"></td></tr>
            <tr><td style="text-align:center">Konstitution(KON)</td><td><input size="10%"  name="konstitution"  onchange="vergleicheKonstitution()"  style="text-align:center" type="number" value="<?php echo $charakter->getKonstitution();?>"    id="konstitution" min="<?php echo $charakter->getKonstitution();?>" max="<?php echo $charakter->getStartkonstitution()+$heldengrad;?>"></td></tr>
            <tr><td style="text-align:center">Mystik(MYS)</td>  <td><input size="10%"  name="mystik"        onchange="vergleicheMystik()  "      style="text-align:center" type="number" value="<?php echo $charakter->getMystik();?>"          id="mystik" min="<?php echo $charakter->getMystik();?>" max="<?php echo $charakter->getStartmystik()+$heldengrad;?>"></td></tr>
            <tr><td style="text-align:center">Stärke(STA)</td>   <td><input size="10%"  name="staerke"       onchange="vergleicheStaerke()  "     style="text-align:center" type="number" value="<?php echo $charakter->getStaerke();?>"         id="staerke" min="<?php echo $charakter->getStaerke();?>" max="<?php echo $charakter->getStartstaerke()+$heldengrad;?>"></td></tr>
            <tr><td style="text-align:center">Verstand(VER)</td> <td><input size="10%"  name="verstand"      onchange="vergleicheVerstand()  "    style="text-align:center" type="number" value="<?php echo $charakter->getVerstand();?>"        id="verstand" min="<?php echo $charakter->getVerstand();?>" max="<?php echo $charakter->getStartverstand()+$heldengrad;?>"></td></tr>
            <tr><td style="text-align:center">Willenskraft(WIL)</td>  <td><input size="10%"  name="willenskraft"  onchange="vergleicheWillenskraft()"  style="text-align:center" type="number" value="<?php echo $charakter->getWillenskraft();?>"    id="willenskraft" min="<?php echo $charakter->getWillenskraft();?>" max="<?php echo $charakter->getStartwillenskraft()+$heldengrad;?>"></tr>




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
<button onclick="Fertigkeitenanzeigen()" class="fertigkeitenstart" id="fertigkeitenstart"; this.onclick=null;>Zeige Fertigkeiten</button>







</table>
<script>

    var fertigkeitsbogen = JSON.parse('<?php echo $jSonfertigkeiten?>')

    var charakter = JSON.parse('<?php echo $jSoncharakter ?>')

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




   function Fertigkeitenanzeigen(){


       var hidden = false;

       hidden = !hidden;
       if (hidden) {
           document.getElementById('fertigkeitenstart').style.visibility = 'hidden';
       } else {
           document.getElementById('fertigkeitenstart').style.visibility = 'visible';
       }

       let ausgabe= '<table> ';
        ausgabe+= '<tr>'
        ausgabe+= '<td>Fertigkeit</td>';
        ausgabe+= '<td>Wert</td>';
        ausgabe+= '<td>Punkte</td>';
        ausgabe+= '<td>Attribute</td>';
        ausgabe+= '</tr>';

       ausgabe+= '<tr>';
       ausgabe+= '<td>Akrobatik</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.akrobatik+charakter.beweglichkeit+charakter.staerke)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.akrobatik +'</td>';
       ausgabe+= '<td>'+ charakter.beweglichkeit+' + '+charakter.staerke +'</td>';
       ausgabe+= '</tr>';

       ausgabe+= '<tr>';
       ausgabe+= '<td>Alchemie</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.alchemie+charakter.mystik+charakter.verstand)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.alchemie +'</td>';
       ausgabe+= '<td>'+ charakter.mystik+' + '+charakter.verstand +'</td>';
       ausgabe+= '</tr>';

       ausgabe+= '<tr>';
       ausgabe+= '<td>Anführen</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.anfuehren+charakter.ausstrahlung+charakter.willenskraft)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.anfuehren +'</td>';
       ausgabe+= '<td>'+ charakter.ausstrahlung+' + '+charakter.ausstrahlung +'</td>';
       ausgabe+= '</tr>';

       ausgabe+= '<tr>';
       ausgabe+= '<td>Arkane Kunde</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.arkanekunde+charakter.mystik+charakter.verstand)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.arkanekunde +'</td>';
       ausgabe+= '<td>'+ charakter.mystik+' + '+charakter.verstand +'</td>';
       ausgabe+= '</tr>';

       ausgabe+= '<tr>';
       ausgabe+= '<td>Athletik</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.athletik+charakter.beweglichkeit+charakter.staerke)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.athletik +'</td>';
       ausgabe+= '<td>'+ charakter.beweglichkeit+' + '+charakter.staerke +'</td>';
       ausgabe+= '</tr>';

       ausgabe+= '<tr>';
       ausgabe+= '<td>Darbietung</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.darbietung+charakter.ausstrahlung+charakter.willenskraft)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.darbietung +'</td>';
       ausgabe+= '<td>'+ charakter.ausstrahlung+' + '+charakter.willenskraft +'</td>';
       ausgabe+= '</tr>';

       ausgabe+= '<tr>';
       ausgabe+= '<td>Edelhandwerk</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.edelhandwerk+charakter.intuition+charakter.verstand)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.edelhandwerk +'</td>';
       ausgabe+= '<td>'+ charakter.intuition+' + '+charakter.verstand +'</td>';
       ausgabe+= '</tr>';

       ausgabe+= '<tr>';
       ausgabe+= '<td>Empathie</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.empathie+charakter.intuition+charakter.verstand)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.empathie +'</td>';
       ausgabe+= '<td>'+ charakter.intuition+' + '+charakter.verstand +'</td>';
       ausgabe+= '</tr>';


       ausgabe+= '<tr>';
       ausgabe+= '<td>Entschlossenheit</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.entschlossenheit+charakter.ausstrahlung+charakter.willenskraft)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.entschlossenheit +'</td>';
       ausgabe+= '<td>'+ charakter.ausstrahlung+' + '+charakter.willenskraft +'</td>';
       ausgabe+= '</tr>';

       ausgabe+= '<tr>';
       ausgabe+= '<td>Fingerfertigkeit</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.fingerfertigkeit+charakter.ausstrahlung+charakter.beweglichkeit)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.fingerfertigkeit +'</td>';
       ausgabe+= '<td>'+ charakter.ausstrahlung+' + '+charakter.beweglichkeit +'</td>';
       ausgabe+= '</tr>';

       ausgabe+= '<tr>';
       ausgabe+= '<td>Geschichte und Mythen</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.geschichteundmythen+charakter.mystik+charakter.verstand)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.geschichteundmythen +'</td>';
       ausgabe+= '<td>'+ charakter.mystik+' + '+charakter.verstand +'</td>';
       ausgabe+= '</tr>';

       ausgabe+= '<tr>';
       ausgabe+= '<td>Handwerk</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.handwerk+charakter.konstitution+charakter.verstand)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.handwerk +'</td>';
       ausgabe+= '<td>'+ charakter.konstitution+' + '+charakter.verstand +'</td>';
       ausgabe+= '</tr>';

       ausgabe+= '<tr>';
       ausgabe+= '<td>Heilkunde</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.heilkunde+charakter.intuition+charakter.verstand)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.heilkunde +'</td>';
       ausgabe+= '<td>'+ charakter.intuition+' + '+charakter.verstand +'</td>';
       ausgabe+= '</tr>';

       ausgabe+= '<tr>';
       ausgabe+= '<td>Heilkunde</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.heilkunde+charakter.intuition+charakter.verstand)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.heilkunde +'</td>';
       ausgabe+= '<td>'+ charakter.intuition+' + '+charakter.verstand +'</td>';
       ausgabe+= '</tr>';

       ausgabe+= '<tr>';
       ausgabe+= '<td>Heimlichkeit</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.heimlichkeit+charakter.beweglichkeit+charakter.intuition)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.heimlichkeit +'</td>';
       ausgabe+= '<td>'+ charakter.beweglichkeit+' + '+charakter.intuition +'</td>';
       ausgabe+= '</tr>';


       ausgabe+= '<tr>';
       ausgabe+= '<td>Heimlichkeit</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.heimlichkeit+charakter.beweglichkeit+charakter.intuition)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.heimlichkeit +'</td>';
       ausgabe+= '<td>'+ charakter.beweglichkeit+' + '+charakter.intuition +'</td>';
       ausgabe+= '</tr>';


       ausgabe+= '<tr>';
       ausgabe+= '<td>Jagdkunst</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.jagdkunst+charakter.konstitution+charakter.verstand)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.jagdkunst +'</td>';
       ausgabe+= '<td>'+ charakter.konstitution+' + '+charakter.verstand +'</td>';
       ausgabe+= '</tr>';


       ausgabe+= '<tr>';
       ausgabe+= '<td>Länderkunde</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.laenderkunde+charakter.intuition+charakter.verstand)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.laenderkunde +'</td>';
       ausgabe+= '<td>'+ charakter.intuition+' + '+charakter.verstand +'</td>';
       ausgabe+= '</tr>';




       ausgabe+= '<tr>';
       ausgabe+= '<td>Naturkunde</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.naturkunde+charakter.intuition+charakter.verstand)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.naturkunde +'</td>';
       ausgabe+= '<td>'+ charakter.intuition+' + '+charakter.verstand +'</td>';
       ausgabe+= '</tr>';


       ausgabe+= '<tr>';
       ausgabe+= '<td>Redegewandtheit</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.redegewandtheit+charakter.ausstrahlung+charakter.willenskraft)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.redegewandtheit +'</td>';
       ausgabe+= '<td>'+ charakter.ausstrahlung+' + '+charakter.willenskraft +'</td>';
       ausgabe+= '</tr>';


       ausgabe+= '<tr>';
       ausgabe+= '<td>Schlösser und Fallen</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.schloesserundfallen+charakter.intuition+charakter.beweglichkeit)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.schloesserundfallen +'</td>';
       ausgabe+= '<td>'+ charakter.intuition+' + '+charakter.beweglichkeit +'</td>';
       ausgabe+= '</tr>';


       ausgabe+= '<tr>';
       ausgabe+= '<td>Schwimmen</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.schwimmen+charakter.staerke+charakter.konstitution)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.schwimmen +'</td>';
       ausgabe+= '<td>'+ charakter.staerke+' + '+charakter.konstitution +'</td>';
       ausgabe+= '</tr>';


       ausgabe+= '<tr>';
       ausgabe+= '<td>Seefahrt</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.seefahrt+charakter.beweglichkeit+charakter.konstitution)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.seefahrt +'</td>';
       ausgabe+= '<td>'+ charakter.beweglichkeit+' + '+charakter.konstitution +'</td>';
       ausgabe+= '</tr>';



       ausgabe+= '<tr>';
       ausgabe+= '<td>Straßenkunde</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.seefahrt+charakter.ausstrahlung+charakter.intuition)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.seefahrt +'</td>';
       ausgabe+= '<td>'+ charakter.beweglichkeit+' + '+charakter.konstitution +'</td>';
       ausgabe+= '</tr>';


       ausgabe+= '<tr>';
       ausgabe+= '<td>Tierführung</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.tierfuehrung+charakter.ausstrahlung+charakter.beweglichkeit)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.tierfuehrung +'</td>';
       ausgabe+= '<td>'+ charakter.ausstrahlung+' + '+charakter.beweglichkeit +'</td>';
       ausgabe+= '</tr>';



       ausgabe+= '<tr>';
       ausgabe+= '<td>Überleben</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.ueberleben+charakter.intuition+charakter.konstitution)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.ueberleben +'</td>';
       ausgabe+= '<td>'+ charakter.intuition+' + '+charakter.konstitution +'</td>';
       ausgabe+= '</tr>';

       ausgabe+= '<tr>';
       ausgabe+= '<td>Wahrnehmung</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.wahrnehmung+charakter.intuition+charakter.willenskraft)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.wahrnehmung +'</td>';
       ausgabe+= '<td>'+ charakter.intuition+' + '+charakter.willenskraft +'</td>';
       ausgabe+= '</tr>';

       ausgabe+= '<tr>';
       ausgabe+= '<td>Zähigkeit</td>';
       ausgabe+= '<td>'+(fertigkeitsbogen.zaehigkeit+charakter.konstitution+charakter.willenskraft)+ '</td>';
       ausgabe+= '<td>'+ fertigkeitsbogen.zaehigkeit +'</td>';
       ausgabe+= '<td>'+ charakter.konstitution+' + '+charakter.willenskraft +'</td>';
       ausgabe+= '</tr>';



       document.getElementById('fertigkeiten').innerHTML = ausgabe
   }



    function speichererfahrung() {


        document.getElementById('submitbutton').disabled= false;
        document.getElementById("ausgegebeneerfahrung").value = erfahrungskosten+<?php echo $charakter->getAusgegebeneerfahrung();?>;


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