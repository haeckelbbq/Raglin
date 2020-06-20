

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















<?php include 'module/htmlend.php';?>
