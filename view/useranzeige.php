<?php include 'view/module/htmlbegin.php';?>

<table>
    <thead>
    <!--    <th>ID</th>-->
    <th>Username</th>
    <th>Passwort</th>
    </thead>
    <tbody>
    <?php
    for($i = 0;$i < count($benutzer); $i++)
    {
        if ($benutzer[$i]->getRolle() === 'regUser')
        {


        ?>
        <tr>

            <td><?php echo $benutzer[$i]->getName(); ?></td>
            <td><?php echo $benutzer[$i]->getPassword(); ?></td>
            <td><a href="index.php?action=delete&area=user&id=<?php echo $benutzer[$i]->getUid(); ?>"><input type="submit" name="submitLöschen" value="löschen"></a></td>
            <td><a href="index.php?action=update&area=user&id=<?php echo $benutzer[$i]->getUid(); ?>"><input type="submit" name="submitAendern" value="ändern"></a></td>
        </tr>
        <?php
        }
    }
    ?>
    </tbody>
</table>
<!--<a href="index.php?action=eingabe&area=user"><input type="submit" name="submitUser" value="registrieren"></a>-->

<?php

?>
<?php include 'view/module/htmlend.php';?>
