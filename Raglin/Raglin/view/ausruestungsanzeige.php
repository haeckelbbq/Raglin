
<?php
include 'module/htmlbegin.php';
$user_id = $_SESSION['user_id'];
$waffen = Waffe::getWaffenByCharakterId($cid);
$schilde  = Schild::getSchildeByCharakterId($cid);
$ruestungen = Ruestung::getRuestungByCharakterId($cid);

echo '            ausruestungsanzeige.php';
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
            <?php echo Anzeigeformat::formatSchaden( $waffen[$i]->getWuerfelanzahl()
                ,$waffen[$i]->getWuerfelart()
                ,$waffen[$i]->getSchadensbonus());?></td>
        <td><a href="index.php?action=update&area=ausruestung&id=<?php echo $waffen[$i]->getWid(); ?>&typ=<?php echo get_class($waffen[$i])?>"><input type="submit" value="ausruesten"></a></td>
        <?php }
        ?>

    </tbody>
</table>

<br>

<table cellspacing="0">
    <thead>
    <th>Rüstungen</th>
    <th>Verteidigung</th>
    <th>Reduktion</th>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < count($ruestungen); $i++)
    {
        ?>
        <tr>
            <td style="text-align:center"><?php echo $ruestungen[$i]->getRname(); ?></td>
            <td style="text-align:center"><?php echo $ruestungen[$i]->getVerteidigungsbonus(); ?></td>
            <td style="text-align:center"><?php echo $ruestungen[$i]->getSchadensreduktion(); ?></td>
            <td><a href="index.php?action=update&area=ausruestung&id=<?php echo $ruestungen[$i]->getRid(); ?>&typ=<?php echo get_class($ruestungen[$i])?>"><input type="submit" value="ausruesten"></a></td>
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
            <td><a href="index.php?action=update&area=ausruestung&id=<?php echo $schilde[$i]->getSid(); ?>&typ=<?php echo get_class($schilde[$i])?>"><input type="submit" value="ausruesten"></a></td>
        </tr>
    <?php }
    ?>

    </tbody>
</table>




<?php
include 'module/htmlend.php';
