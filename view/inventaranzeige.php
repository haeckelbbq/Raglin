
<?php
include 'module/htmlbegin.php';



echo '            inventaranzeige.php';


$waffen = Waffe::getWaffenByCharakterId($cid);
//$waffen2 = json_encode($waffen[0]);
//echo $waffen2;
$schilde  = Schild::getSchildeByCharakterId($cid);
$ruestungen = Ruestung::getRuestungByCharakterId($cid);
$gegenstaende = Gegenstand::getGegenstandeByCharakterId($cid);
$gegenstaendeCgids = Gegenstand::getGegenstandCgidByCharakterId($cid, 'Gegenstand');
$waffenCgids = Gegenstand::getGegenstandCgidByCharakterId($cid, 'Waffe');
$ruestungenCgids = Gegenstand::getGegenstandCgidByCharakterId($cid, 'Ruestung');
$schildeCgids = Gegenstand::getGegenstandCgidByCharakterId($cid, 'Schild');




?>

<style>
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<br>

<h2>Dein Inventar</h2>
<table cellspacing="0">
    <thead>
    <th>Waffe</th>
    <th>Attribut 1</th>
    <th>Attribut 2</th>
    <th>Schaden</th>
    <th>Verkaufswert</th>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < count($waffen); $i++)
        {
        ?>
    <tr>
        <td style="text-align:center"><?php echo $waffen[$i]->getWname(); ?></td>
        <td style="text-align:center"><?php echo $waffen[$i]->getAttri1(); ?></td>
        <td style="text-align:center"><?php echo $waffen[$i]->getAttri2(); ?></td>
        <td style="text-align:center">
            <?php echo Anzeigeformat::formatSchaden( $waffen[$i]->getwuerfelanzahl()
                ,$waffen[$i]->getWuerfelart()
                ,$waffen[$i]->getSchadensbonus());?></td>
        <td style="text-align:center"><?php echo round( $waffen[$i]->getKosten() / 3,0); ?></td>
        <td><a href="index.php?cgid=<?php echo $waffenCgids[$i]?>&action=delete&area=inventar&kosten=<?php echo $waffen[$i]->getKosten();?>"><button>Verkaufen</button></a></td>
    <?php }
    ?>


    </tbody>
</table>

<br>

<table cellspacing="0">
    <thead>
    <th>Rüstungen</th>
    <th>Verteidigung</th>
    <th>Schadensreduktion</th>
    <th>Tickzuschlag</th>
    <th>Behinderung</th>
    <th>Verkaufswert</th>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < count($ruestungen); $i++)
    {
        ?>
        <tr>
            <td style="text-align:center"><?php echo $ruestungen[$i]->getRname(); ?></td>
            <td style="text-align:center"><?php echo $ruestungen[$i]->getVerteidigungsbonus(); ?></td>
            <td style="text-align:center"><?php echo $ruestungen[$i]->getSchadensreduktion(); ?></td>
            <td style="text-align:center"><?php echo $ruestungen[$i]->getTickzuschlag(); ?></td>
            <td style="text-align:center"><?php echo $ruestungen[$i]->getBehinderung(); ?></td>
            <td style="text-align:center"><?php echo round( $ruestungen[$i]->getKosten() / 3,0); ?></td>

            <td><a href="index.php?cgid=<?php echo $ruestungenCgids[$i]?>&action=delete&area=inventar&kosten=<?php echo $ruestungen[$i]->getKosten();?>"><button>Verkaufen</button></a></td>

        </tr>
    <?php }
    ?>

    </tbody>
</table>

<br>

<table cellspacing="0">
    <thead>
    <th>Schilde</th>
    <th>Verteidigung</th>
    <th>Reduktion</th>
    <th>Verkaufswert</th>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < count($schilde); $i++)
    {
        ?>
        <tr>
            <td style="text-align:center"><?php echo $schilde[$i]->getSname(); ?></td>
            <td style="text-align:center"><?php echo $schilde[$i]->getVerteidigungsbonus(); ?></td>
            <td style="text-align:center"><?php echo $schilde[$i]->getSchadensreduktion(); ?></td>
            <td style="text-align:center"><?php echo round( $schilde[$i]->getKosten() / 3,0); ?></td>
            <td><a href="index.php?cgid=<?php echo $schildeCgids[$i]?>&action=delete&area=inventar&kosten=<?php echo $schilde[$i]->getKosten();?>"><button>Verkaufen</button></a></td>

        </tr>


    <?php }
    ?>

    </tbody>
</table>

<br>

<table cellspacing="0">
    <thead>
    <th>Gegenstände</th>
    <th>Heilwert</th>
    <th>Verkaufswert</th>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < count($gegenstaende); $i++)
    {
        ?>
        <tr>
            <td style="text-align:center"><?php echo $gegenstaende[$i]->getGegname(); ?></td>
            <td style="text-align:center">30</td>
            <td style="text-align:center"><?php echo round( $gegenstaende[$i]->getKosten() / 3,0); ?></td>
            <td><a href="index.php?cgid=<?php echo $gegenstaendeCgids[$i]?>&action=heilen&area=inventar"><button>Heilen</button></a></td>
            <td><a href="index.php?cgid=<?php echo $gegenstaendeCgids[$i]?>&action=delete&area=inventar&kosten=<?php echo $gegenstaende[$i]->getKosten();?>"><button>Verkaufen</button></a></td>

        </tr>
    <?php }
    ?>

    </tbody>
</table>
<?php

include 'module/htmlend.php';
