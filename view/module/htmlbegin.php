
<?php
    //hier wird einmalig inkludiert. da später im Index erneut inkludiert wird
    //Der Nutzer soll die Werte seines Charakters im <aside> Bereich zu sehen bekommen sofern er einen aktiven Charakter hat und die $user_id gesetzt ist
    include_once 'class/Charakter.php';
    include_once 'class/User.php';
?>
<!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title>Raglin</title>
    <link type="text/css" href="css/style.css" rel="stylesheet" media="screen" />
</head>
<style>
    a:link {
        color: black;
        background-color: transparent;
        text-decoration: none;
    }
</style>
<body>
</body>
<header>
    Willkommen in der mystischen Welt von Raglin!
</header>
<aside>
    <?php
   // Html::loadSuchfeld();  // Laden eines Suchfelds

    if(isset($user_id ))  // Nach dem einloggen ist die $user_id gesetzt - anschließend wird der fk_aktiver Charakter aus der Usertabelle abgefragt und übergeben
    {

        $cid = User::getFkAktuellerCharakterFromUser($user_id); //wenn fk_aktivercharakter = 0 ist, hat der User keinen ausgewählten Charakter.
                                                                // 0 = default


        // ist ein Charakter vorhanden, ist die Charakter ID > 0
        if($cid !=0)
        {
            Html::loadUserCharakterAside($user_id);  //Es folgt ein <HTML>-Anteil der die Charakterwerte des Users im <aside>-Bereich anzeigt.
        }
//        elseif($cid == 0)
//        {
//            if ($area !== 'charakterbogen'){
//            ?>
<!--            <br>-->
<!--                Kein aktiver Charakter-->
<!--                <br><br>-->
<!--            <a href="index.php?action=anzeige&area=charakterbogen">zum Charakterbogen</a>-->
<!--            <br><br>-->
<!--            --><?php
//            }
//        }
    }
    ?>
</aside>

<nav>
<?php
if(isset($user_id) && User::getById($user_id)->getRolle() === 'regUser' && $area !== 'kampf')  //Der <nav>-Bereich ändert sich in dem die Rolle des Users aus der DB abgefragt wird.
{                                                                         //siehe loadNavForReguser() / loadNavForAdmin() / loadNavForCustomer
    Html::loadNavForReguser();
}
elseif(isset($user_id) && User::getById($user_id)->getRolle() === 'admin')
{
    Html::loadNavForAdmin();
}
elseif(!isset($user_id))
{
    Html::loadNavForCustomer();
}
?>
</nav>

<article>