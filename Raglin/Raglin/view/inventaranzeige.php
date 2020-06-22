
<?php
include 'module/htmlbegin.php';



echo '            inventaranzeige.php';


$waffen = Waffe::getWaffenByCharakterId($cid);
//$waffen2 = json_encode($waffen[0]);
//echo $waffen2;
$schilde  = Schild::getSchildeByCharakterId($cid);
$ruestungen = Ruestung::getRuestungByCharakterId($cid);
$gegenstaende = Gegenstand::getGegenstandeByCharakterId($cid);


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
    </thead>
    <tbody>
    <?php for ($i = 0; $i < count($schilde); $i++)
    {
        ?>
        <tr>
            <td style="text-align:center"><?php echo $schilde[$i]->getSname(); ?></td>
            <td style="text-align:center"><?php echo $schilde[$i]->getVerteidigungsbonus(); ?></td>
            <td style="text-align:center"><?php echo $schilde[$i]->getSchadensreduktion(); ?></td>
        </tr>
    <?php }
    ?>

    </tbody>
</table>

<br>

<table cellspacing="0">
    <thead>
    <th>Gegenstände</th>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < count($gegenstaende); $i++)
    {
        ?>
        <tr>
            <td style="text-align:center"><?php echo $gegenstaende[$i]->getGegname(); ?></td>
        </tr>
    <?php }
    ?>

    </tbody>
</table>
<?php

include 'module/htmlend.php';
