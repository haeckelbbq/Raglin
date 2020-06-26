

<?php
include 'module/htmlbegin.php';
?>
<br>
<h2>Deine Charaktere</h2>

<table>
    <thead>
    <!--    <th>ID</th>-->
    <th>Charaktername</th>
    </thead>
    <tbody>
    <?php
    //Übergabe von $charaktere erfolgt über index.php - $charaktere ist gefüllt mit den Charakteren die an einen User gebunden sind,
    //for-Schleife gibt für jedes Objekt im Array den Charakternamen aus und knüpft die Charakter ID an die Buttons.
    // Die daraus resultierenden Werte werden auf Knopfdruck an die index.php geliefert wo entsprechende Aktionen ausgeführt werden
    for($i = 0;$i < count($charaktere); $i++)
    {
        ?>
        <tr>
            <td><?php echo $charaktere[$i]->getCname(); ?></td>
            <td><a href="index.php?action=auswahl&area=charakter&cid=<?php echo $charaktere[$i]->getCid(); ?>"><input type="submit" name="submitAendern" value="auswählen"></a></td>
            <td><a href="index.php?action=delete&area=charakter&cid=<?php echo $charaktere[$i]->getCid(); ?>"><input type="submit" name="submitLöschen" value="löschen"></a></td>

        </tr>
        <?php
    }
    ?>
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
            <td><input name="ausstrahlung" type="number"  id="ausstrahlung" value="1"min ="<?php echo $charakter->getAusstrahlung();?>" max="<?php echo ($charakter->getErfahrung() /10) + $charakter->getAusstrahlung();?>" onclick="<?php Charakter::setSkillpunkt($cid);?>"></td>

        </tr>
        <tr>
            <td><label for="beweglichkeit">Beweglichkeit:</label></td>
            <td><input name="beweglichkeit" type="number"  id="beweglichkeit" value="1"min ="1" max="<?php echo ($charakter->getErfahrung() /10) + $charakter->getBeweglichkeit();?>"></td>

        </tr>
        <tr>
            <td><label for="intuition">Intuition: </label></td>
            <td><input name="intuition" type="number"  id="intuition" value="1"min ="1" max="<?php echo ($charakter->getErfahrung() /10) + $charakter->getIntuition();?>"></td>

        </tr>
        <tr>
            <td><label for="konstitution">Konstitution: </label></td>
            <td><input name="konstitution" type="number"  id="konstitution" value="1"min ="1" max="<?php echo ($charakter->getErfahrung() /10) + $charakter->getKonstitution();?>"></td>

        </tr>
        <tr>
            <td><label for="mystik">Mystik: </label></td>
            <td><input name="mystik" type="number"  id="mystik" value="1"min ="1" max="<?php echo ($charakter->getErfahrung() /10) + $charakter->getMystik();?>"></td>

        </tr>
        <tr>
            <td><label for="staerke">Stärke: </label></td>
            <td><input name="staerke" type="number"  id="staerke" value="<?php echo $charakter->getStaerke();?>"min ="<?php echo $charakter->getStaerke();?>" max="<?php echo ($charakter->getErfahrung() /10) + $charakter->getStaerke();?>"></td>
        </tr>
        <tr>
            <td><label for="verstand">Verstand: </label></td>
            <td><input name="verstand" type="number"  id="verstand" value="<?php echo $charakter->getVerstand();?>"min ="<?php echo $charakter->getVerstand();?>" max="<?php echo ($charakter->getErfahrung() /10) + $charakter->getVerstand();?>"></td>
        <tr>
            <td><label for="willenskraft">Willenskraft: </label></td>
            <td><input name="willenskraft" type="number"  id="willenskraft" value="<?php echo $charakter->getWillenskraft();?>"min ="<?php echo $charakter->getWillenskraft();?>" max="<?php echo ($charakter->getErfahrung() /10) + $charakter->getWillenskraft();?>"></td>
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














<?php include 'module/htmlend.php';?>
