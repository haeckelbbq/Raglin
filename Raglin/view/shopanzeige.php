<?php include 'module/htmlbegin.php';
$fkcharakter = User::getFkAktuellerCharakterFromUser($user_id);  // erfragt den aktiven Charakter des Users anhand des FK's zum Charakter
$charakter =Charakter::getAktiverCharakter($user_id, $fkcharakter);
$waffen = Waffe::getWaffenFromDatabase();
$ruestungen = Ruestung::getRuestungenFromDatabase();
$schilde = Schild::getSchildeFromDatabase();
$gegenstaende=Gegenstand::getGegenstaendeFromDatabase();
?>
<script>

</script>
<style>
   td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<div>
    <p id = "kaufen"></p>
</div>
<br>
    <h2>Coras kleiner Laden</h2>

    <table cellspacing="0">
        <tbody>
        <th><tr><td style="text-align:center">Name</td>
        <td style="text-align:center">Konsumierbar</td>
        <td style="text-align:center">Kosten</td></th></tr>
        <?php
        for($i = 0;$i < count($gegenstaende); $i++)
        {
            ?>
            <tr>


                <td style="text-align:center"><?php echo $gegenstaende[$i]->getGegname(); ?></td>
                <td style="text-align:center"><?php if( $gegenstaende[$i]->getEinnehmbar()==1)
                {
                    echo "ja";}else{echo "nein";}?></td>

                <td style="text-align:center"><?php echo $gegenstaende[$i]->getKosten(); ?> Gold</td>
                <?php
                if ($charakter->getGold() >= $gegenstaende[$i]->getKosten())
                {
                    ?>
                    <td><a href="index.php?action=insert&area=shop&id=<?php echo $gegenstaende[$i]->getGegid(); ?>&typ=<?php echo get_class($gegenstaende[$i])?>&kosten=<?php echo $gegenstaende[$i]->getKosten();?>"><input type="submit" name="submitLöschen" value="kaufen"></a></td>
                    <?php
                }
                ?>
            </tr>
            <?php

        }
        ?>
        </tbody>
    </table>
<br>


<table cellspacing="0">
<tbody>
<th><tr><td style="text-align:center">Waffenname</td>
    <td style="text-align:center">Attribute </td>
    <td style="text-align:center">Schaden</td>
    <td style="text-align:center">Waffenart</td>
    <td style="text-align:center">Waffengeschwindigkeit</td>
    <td style="text-align:center">Kosten</td>
    </tr></th>
<?php
for($i = 1;$i < count($waffen); $i++)
{
    ?>
    <tr>


        <td style="text-align:center"><?php echo $waffen[$i]->getWname(); ?></td>
        <td style="text-align:center"><?php echo $waffen[$i]->getAttri1(); ?>+<?php echo $waffen[$i]->getAttri2(); ?></td>
        <td style="text-align:center">
            <?php echo Anzeigeformat::formatSchaden( $waffen[$i]->getwuerfelanzahl()
                                                    ,$waffen[$i]->getWuerfelart()
                                                    ,$waffen[$i]->getSchadensbonus());?></td>
        <td style="text-align:center"><?php echo $waffen[$i]->getWaffenart(); ?></td>

        <td style="text-align:center"><?php echo $waffen[$i]->getWaffengeschwindigkeit(); ?> </td>
        <td style="text-align:center"><?php echo $waffen[$i]->getKosten(); ?> Gold</td>
        <?php
        if ($charakter->getGold() >= $waffen[$i]->getKosten())
        {
        ?>
            <td><a href="index.php?action=insert&area=shop&id=<?php echo $waffen[$i]->getWid(); ?>&typ=<?php echo get_class($waffen[$i])?>&kosten=<?php echo $waffen[$i]->getKosten();?>"><input type="submit" name="submitLöschen" value="kaufen"></a></td>
            <?php
        }
        ?>

    </tr>
    <?php

}
?>
</tbody>
</table>

    <br>
       <table cellspacing="0">
        <tbody>
        <th><tr><td style="text-align:center">Rüstungsname</td>
            <td style="text-align:center">Verteidigungsbonus</td>
            <td style="text-align:center">Schadensreduktion</td>
            <td style="text-align:center">Tickzuschlag</td>
            <td style="text-align:center">Behinderung</td>
            <td style="text-align:center">Kosten</td>

            </tr></th>
        <?php
        for($i = 1;$i < count($ruestungen); $i++)
        {
            ?>
            <tr>


                <td style="text-align:center"><?php echo $ruestungen[$i]->getRname(); ?></td>
                <td style="text-align:center"><?php echo $ruestungen[$i]->getVerteidigungsbonus();?></td>
                <td style="text-align:center"><?php echo $ruestungen[$i]->getSchadensreduktion(); ?></td>
                <td style="text-align:center"><?php echo $ruestungen[$i]->getTickzuschlag(); ?></td>
                <td style="text-align:center"><?php echo $ruestungen[$i]->getBehinderung(); ?></td>
                <td style="text-align:center"><?php echo $ruestungen[$i]->getKosten(); ?> Gold</td>
                <?php
                if ($charakter->getGold() >= $ruestungen[$i]->getKosten())
                {
                    ?>
                    <td><a href="index.php?action=insert&area=shop&id=<?php echo $ruestungen[$i]->getRid(); ?>&typ=<?php echo get_class($ruestungen[$i])?>&kosten=<?php echo $ruestungen[$i]->getKosten();?>"><input type="submit" name="submitLöschen" value="kaufen"></a></td>
                    <?php
                }
                ?>

            </tr>
            <?php

        }
        ?>
        </tbody>
    </table>
    <br>

    <table cellspacing="0">
        <tbody>
        <th><tr><td style="text-align:center">Schildname</td>
        <td style="text-align:center">Verteidigungsbonus</td>
        <td style="text-align:center">Schadensreduktion</td>
        <td style="text-align:center">Tickzuschlag</td>
        <td style="text-align:center">Behinderung</td>
        <td style="text-align:center">Kosten</td></tr></th>
        <?php
        for($i = 1;$i < count($schilde); $i++)
        {
            ?>
            <tr>


                <td style="text-align:center"><?php echo $schilde[$i]->getSname(); ?></td>
                <td style="text-align:center"><?php echo $schilde[$i]->getVerteidigungsbonus();?></td>
                <td style="text-align:center"><?php echo $schilde[$i]->getSchadensreduktion(); ?></td>
                <td style="text-align:center"><?php echo $schilde[$i]->getTickzuschlag(); ?></td>
                <td style="text-align:center"><?php echo $schilde[$i]->getBehinderung(); ?></td>
                <td style="text-align:center"><?php echo $schilde[$i]->getKosten(); ?> Gold</td>
                <?php
                               if ($charakter->getGold() >= $schilde[$i]->getKosten())
                {
                    ?>
                    <td><a href="index.php?action=insert&area=shop&id=<?php echo $schilde[$i]->getSid(); ?>&typ=<?php echo get_class($schilde[$i])?>&kosten=<?php echo $schilde[$i]->getKosten();?>"><input type="submit" name="submitLöschen" value="kaufen"></a></td>
                    <?php
                }
                ?>

            </tr>
            <?php

        }
        ?>
        </tbody>
    </table>



<?php include 'module/htmlend.php';?>