<?php
include 'view/module/htmlbegin.php';

$quest = Quest::getQuestFromDatabase();
$rnd = rand(1, count($quest) -1);
$quest = $quest[$rnd];

if(isset($user_id) && User::getById($user_id)->getRolle() === 'admin')
{
    ?>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="insert">
        <input type="hidden" name="area" value="quest">

        <table>
            <tr>
            <h2>Quest erstellen</h2>
            <td>
                <textarea rows="10" cols="50" name="frage"></textarea>
                <label for = "frage">Frage</label><br><br>
                <textarea rows="3" cols="50" name="antwort1"></textarea>
                <input type = "radio" name="a1bool">
                <label for = "radio">Antwort</label><br><br>
                <textarea rows="3" cols="50" name="antwort2"></textarea>
                <input type = "radio" name="abool2">
                <label for = "radio">Antwort</label><br><br>
                <textarea rows="3" cols="50" name="antwort3"></textarea>
                <input type = "radio" name="abool3">
                <label for = "radio">Antwort</label><br><br>
                <textarea rows="3" cols="50" name="antwort4"></textarea>
                <input type = "radio" name="abool4">
                <label for = "radio">Antwort</label>
            </td>
        </tr>
        </table>
        <td><input type="submit" name="submitname" value="Antwort abgeben"></td>
    </form>

<?php

}
else
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