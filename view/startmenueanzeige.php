

<?php
include 'module/htmlbegin.php';
?>
<br>
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
            <td><input name="ausstrahlung" type="number"  id="ausstrahlung" value="1" min ="1" max="4"></td>

        </tr>
        <tr>
            <td><label for="beweglichkeit">Beweglichkeit:</label></td>
            <td><input name="beweglichkeit" type="number"  id="beweglichkeit" value="1" min ="1" max="4"></td>

        </tr>
        <tr>
            <td><label for="intuition">Intuition: </label></td>
            <td><input name="intuition" type="number"  id="intuition" value="1" min ="1" max="4"></td>

        </tr>
        <tr>
            <td><label for="konstitution">Konstitution: </label></td>
            <td><input name="konstitution" type="number"  id="konstitution" value="1" min ="1" max="4"></td>

        </tr>
        <tr>
            <td><label for="mystik">Mystik: </label></td>
            <td><input name="mystik" type="number"  id="mystik" value="1" min ="1" max="4"></td>

        </tr>
        <tr>
            <td><label for="staerke">Stärke: </label></td>
            <td><input name="staerke" type="number"  id="staerke" value="1" min="1" max="4"></td>
        </tr>
        <tr>
            <td><label for="verstand">Verstand: </label></td>
            <td><input name="verstand" type="number"  id="verstand" value="1" min ="1" max="4"></td>
        <tr>
            <td><label for="willenskraft">Willenskraft: </label></td>
            <td><input name="willenskraft" type="number"  id="willenskraft" value="1" min ="1" max="4"></td>
        </tr>
        <td>Rasse wählen</td>
        <tr>
            <td> <img src="css\IMG\Gnom.png" alt="Gnon" class="responsive"></td><td><img src="css\IMG\Zwerg.png" alt="Zwerg" class="responsive"></td><td><img src="css\IMG\Mensch.png" alt="Mensch" class="responsive"></td><td><img src="css\IMG\Alb.png" alt="Alb" class="responsive"></td><td><img src="css\IMG\Varg.png" alt="Varg" class="responsive"></td>
        </tr>
        <tr>
            <td style="text-align:center; vertical-align: middle" >
            <input type = "radio" name="rasse" value="Gnom" " >
            <label for = "radio1">Gnom</label></td>
            <td style="text-align:center; vertical-align: middle">    <input type = "radio" name="rasse" value="Zwerg">
            <label for = "radio1">Zwerg</label></td>
            <td style="text-align:center; vertical-align: middle">   <input type = "radio" name="rasse" value="Mensch">
            <label for = "radio1">Mensch</label></td>
            <td style="text-align:center; vertical-align: middle">   <input type = "radio" name="rasse" value="Alb">
            <label for = "radio1">Alb</label></td>
            <td style="text-align:center; vertical-align: middle">    <input type = "radio" name="rasse" value="Varg">
            <label for = "radio1">Varg</label></td>
        </td>
        </tr>

        <td><input type="submit" name="submitname" value="Charakter erstellen"></td>
        </tr>
        </tbody>
    </table>
</form>



</table>














<?php include 'module/htmlend.php';?>
