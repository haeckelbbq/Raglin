

<?php
include 'module/htmlbegin.php';
// es folgt ein <html>-Teil der Felder erzeugt die dem User die Möglichkeit bieten, den Charakter bei Erstellung
// individuell mit Werten zu bestücken. Nach absenden werden die
// Werte an die Übergabevariablen in index.php geleitet und an die entsprechenden Methoden übergeben
if(isset($charakter)){
?>

<br>
<table>
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
                <td style="text-align:center"><?php echo $charakter->getAusstrahlung(); ?></td>
                <td style="text-align:center"><?php echo $charakter->getBeweglichkeit(); ?></td>
                <td style="text-align:center"><?php echo $charakter->getIntuition(); ?></td>
                <td style="text-align:center"><?php echo $charakter->getKonstitution(); ?></td>
                <td style="text-align:center"><?php echo $charakter->getMystik(); ?></td>
                <td style="text-align:center"><?php echo $charakter->getStaerke(); ?></td>
                <td style="text-align:center"><?php echo $charakter->getVerstand(); ?></td>
                <td style="text-align:center"><?php echo $charakter->getWillenskraft(); ?></td>


            </tr>
        </tbody>
    </table>

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
    <table>
        <tbody>
        <td style="text-align:center">Name</td>
        <td style="text-align:center">Wert</td>
        <td style="text-align:center">Punkte</td>
        <td style="text-align:center">Attribute</td>



        </tbody>
    </table>


<h2>Baue einen neuen Charakter</h2>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="insert">
    <input type="hidden" name="area" value="charakter">
    <table>
        <tbody>
        <tr>
            <td><label for="name">Charaktername:</label></td>
            <td><input name="name" type="text" id="name"></td>
        </tr>
        <tr>
            <td><label for="ausstrahlung">Ausstrahlung:</label></td>
            <td><input name="ausstrahlung" type="text" id="ausstrahlung"></td>
        </tr>
        <tr>
            <td><label for="beweglichkeit">Beweglichkeit:</label></td>
            <td><input name="beweglichkeit" type="text" id="beweglichkeit"></td>
        </tr>
        <tr>
        <td><label for="intuition">Intuition: </label></td>
        <td><input name="intuition" type="text" id="intuition"></td>
        </tr>
        <tr>
            <td><label for="konstitution">Konstitution: </label></td>
            <td><input name="konstitution" type="konstitution" id="konstitution"></td>
        </tr>
        <tr>
            <td><label for="mystik">Mystik: </label></td>
            <td><input name="mystik" type="text" id="mystik"></td>
        </tr>
        <tr>
            <td><label for="staerke">Stärke: </label></td>
            <td><input name="staerke" type="text" id="staerke"></td>
        </tr>
        <tr>
            <td><label for="verstand">Verstand: </label></td>
            <td><input name="verstand" type="text" id="verstand"></td>
        </tr>
        <tr>
            <td><label for="willenskraft">Willenskraft: </label></td>
            <td><input name="willenskraft" type="text" id="willenskraft"></td>
        </tr>
        <td>Rasse wählen</td>
        <td>
            <input type = "radio" name="rasse">
            <label for = "radio1">Gnom</label>
            <input type = "radio" name="rasse">
            <label for = "radio1">Zwerg</label>
            <input type = "radio" name="rass">
            <label for = "radio1">Mensch</label>
            <input type = "radio" name="rasse">
            <label for = "radio1">Alb</label>
            <input type = "radio" name="rasse">
            <label for = "radio1">Varg</label>
        </td>

            <td></td>
            <td><input type="submit" name="submitname" value="Charakter erstellen"></td>
        </tr>
        </tbody>
    </table>
</form>



</table>

<?php } else{?>
    <br>
<h2>Baue einen neuen Charakter</h2>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="insert">
    <input type="hidden" name="area" value="charakter">
    <table>
        <tbody>

        <tr>
            <td><label for="willenskraft">Willenskraft: </label></td>
            <td><input name="willenskraft" type="number"  id="willenskraft" min ="1" max=10"></td>
        </tr>

        <td>Rasse wählen</td>
        <td>
            <input type = "radio" name="rasse" value="Gnom">
            <label for = "radio1">Gnom</label>
            <input type = "radio" name="rasse"value="Zwerg">
            <label for = "radio1">Zwerg</label>
            <input type = "radio" name="rasse"value="Mensch">
            <label for = "radio1">Mensch</label>
            <input type = "radio" name="rasse"value="Alb">
            <label for = "radio1">Alb</label>
            <input type = "radio" name="rasse"value="Varg">
            <label for = "radio1">Varg</label>
        </td>

        <td></td>
        <td><input type="submit" name="submitname" value="Charakter erstellen"></td>
        </tr>
        </tbody>
    </table>
</form>



</table>





    <?php }
include 'module/htmlend.php';