<?php
include 'view/module/htmlbegin.php';
$quest = Quest::getQuestFromDatabase();

if(isset($user_id) && User::getById($user_id)->getRolle() === 'admin')
{
    echo 'Geschützter Adminbereich<br>Hier soll die Möglichkeit entstehen, sich Quests auszudenken<br>5 Textfelder davon eines für den Questtext<br> an den 4 kleinen soll jeweils ein string für die antwort<br>anhand der Radiobuttons der Wert 0 oder 1 hängen ob die Antwort falsch oder richtig ist<br>Und so soll es in der DB verwaltet werden ' ;
    ?>
    <form action="index.php" method="post">
        <table>
            <tr>
            <td>Quest erstellen</td>
            <td>
                <input type = "radio" name="antwort" value="<?php ?>">
                <label for = "radio1">checken</label>
                <input type = "radio" name="antwort">
                <label for = "radio1">checken</label>
                <input type = "radio" name="antwort">
                <label for = "radio1">checken</label>
                <input type = "radio" name="antwort">
                <label for = "radio1">checken</label>

            </td>
        </tr>
        </table>
    </form>
<?php

}
?>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="anzeige">
        <input type="hidden" name="area" value="quest">
        <br> <br>
        Frage: <?php echo $quest->getFrage();?>
        <table>
            <tr>
            <td>Antwort: :</td>
            <td>
                <input type = "radio" id="abool" name=antwort value="<?php echo $quest->getA1bool();?>">
                <label for = "radio1"><?php echo $quest->getAntwort1();?></label>
                <input type = "radio" id="abool" name=antwort value="<?php echo $quest->getA2bool();?>">
                <label for = "radio1"><?php echo $quest->getAntwort2();?></label>
                <input type = "radio" id="abool" name=antwort value="<?php echo $quest->getA3bool();?>">
                <label for = "radio1"><?php echo  $quest->getAntwort3();?></label>
                <input type = "radio" id="abool"  name=antwort value="<?php echo $quest->getA4bool();?>">
                <label for = "radio1"><?php echo $quest->getAntwort4();?></label>
            </td>
        </tr>
        </table>
        <td><input type="submit" name="submitname" value="Antwort abgeben"></td>
    </form>
<?php
if (isset($antwort))
{
    if ($antwort == 1)
    {
        echo 'Antwort war richtig - XY Erfahrungspunkte gewonnen';
    }
    if ($antwort == 0)
    {
        echo 'Krasses Nö - Abzüge ohne ende!';
    }
    else{

    }
    unset($antwort);
}
?>


   <!-- <td><button type="button" onclick="checkAntwort()">Request data</button></td> // Versuch die Berechnung innerhalb der View mittels Javsscript abzuhandeln
    <div>
        <p id="test"></p>
    </div>
    <script>
    function checkAntwort() {
        var antwort = <?php /*echo json_encode($antwort)*/?>;
        if (antwort == 1)
        {
            document.getElementById("test").innerHTML = 'War richtig':
        }
        else
        {
            document.getElementById("test").innerHTML = 'Nö';
        }

    }
</script>-->
<?php

echo 'questanzeige.php';

























include 'view/module/htmlend.php';