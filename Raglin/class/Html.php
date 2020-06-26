<?php


class Html
{
    public static function echoPre($test)
    {
        echo '<pre>';
        print_r($test);
        echo '</pre>';
    }

    public static function loadNavForReguser()
    {
        ?>
        <br>
        <a href="index.php?action=anzeige&area=charakterbogen">Charakterbogen</a>
        <br><br>
        <a href="index.php?action=anzeige&area=inventar">Inventar</a>
        <br><br>
        <a href="index.php?action=anzeige&area=ausruestung">Ausrüstung</a>
        <br><br>
        <a href="index.php?action=anzeige&area=shop">Shop</a>
        <br><br>
        <a href="index.php?action=anzeige&area=aktivwerden">Aktiv werden</a>
        <br><br>
<!--        <a href="index.php?action=anzeige&area=einstellungen">Einstellungen</a>-->
<!--        <br><br>-->
        <a href="index.php?action=anzeige&area=startmenue">Startmenü</a>
        <br><br>
        <a href="index.php?action=logout">Ausloggen</a>
        <?php
    }  // lädt Nav-Bereich für den registrierten Nutzer

    public static function loadNavForAdmin()
    {
        ?>
        <br>
        <a href="index.php?action=anzeige&area=restaurant">Wird erweitert</a>
        <br><br>
        <a href="index.php?action=anzeige&area=quest">Quest erstellen</a>
        <br><br>
        <a href="index.php?action=anzeige&area=user">Userliste anzeigen</a>
        <br><br>
        <a href="index.php?action=logout">Ausloggen</a>
        <?php
    }  // lädt Nav-Bereich für den Admin

    public static function loadNavForCustomer()
    {
        ?>
        <br>
        <a href="index.php?action=anzeige&area=login">Einloggen</a>
        <br><br>
        <a href="index.php?action=anzeige&area=registry">Registrieren</a>
        <br><br>
        <a href="index.php?action=anzeige">Startseite</a>
        <?php
    }  // lädt Nav-Bereich für den User

    public static function loadGegnerDataTableForm($gegner)
    {
        ?>
        <table style="text-align: center" border="1">
        <thead>

        <th>Gegner</th>
        <th>Lebenspunkte</th>
        <th>Verteidigung</th>
        <th>Schadensreduktion</th>
        <th>Angriff</th>
        <th>Gegnerklasse</th>


        </thead>
        <tbody>
            <tr>
                <td><?php echo $gegner->getGname(); ?></td>
        <td><?php echo $gegner->getLebenspunkte()?> </td>
        <td><?php echo $gegner->getVerteidigung(); ?></td>
        <td><?php echo $gegner->getSchadensreduktion(); ?></td>
        <td><?php echo $gegner->getAngriffsbonus();?></td>
        <td><?php echo $gegner->getGegnerklasse();?></td>

        </tr>

        </tbody>
        </table>
        <?php
    }  // lädt aktuellen Gegner in tabellarischer Form (Prototyp)

    public static function loadSuchfeld()
    {
        ?>
        <form method="post" action="index.php">
        <input type="text" value="" name="suchfeld">
        <input type="hidden" name="action" value="suchfeld">
        <button type="submit" name="submit" value="suchfeld">suchen</button>
    </form>
    <?php
    }  // lädt ein Suchfeld

    public static function loadCharakterDataTableForm($charakter, $schild, $waffe, $ruestung)
    {
        ?>

        <table style="text-align: center" border="1">
        <thead>


        <th>Name</th>
        <th>Beweglichkeit</th>
        <th>Konstition</th>
        <th>Intuition</th>
        <th>Stärke</th>

        </thead>
        <tbody>
            <tr>
                <td><?php echo $charakter->getCname(); ?></td>
        <td><?php echo $charakter->getBeweglichkeit()?> </td>
        <td><?php echo $charakter->getKonstitution(); ?></td>
        <td><?php echo $charakter->getIntuition(); ?></td>
        <td><?php echo $charakter->getStaerke();?></td>
        </tr>

        </tbody>
        </table>
        <table style="text-align: center" border="1">
            <thead>


        <th>Waffe</th>
        <th>Attri1</th>
        <th>Attri2</th>
        <th>Schaden</th>
        <th>Waffenart</th>
        <th>Fertigkeitswert</th>


        </thead>
        <tbody>
        <tr>

            <td><?php echo $waffe->getWname(); ?></td>
            <td><?php echo Anzeigeformat::formatAttributAbkuerzung($waffe->getAttri1(),$charakter->getAusstrahlung(),$charakter->getBeweglichkeit(),$charakter->getIntuition(),$charakter->getKonstitution(),$charakter->getMystik(),$charakter->getStaerke(),$charakter->getVerstand(),$charakter->getWillenskraft()); ?></td>
            <td><?php echo Anzeigeformat::formatAttributAbkuerzung($waffe->getAttri2(),$charakter->getAusstrahlung(),$charakter->getBeweglichkeit(),$charakter->getIntuition(),$charakter->getKonstitution(),$charakter->getMystik(),$charakter->getStaerke(),$charakter->getVerstand(),$charakter->getWillenskraft()); ?></td>
            <td><?php echo Anzeigeformat::formatSchaden( $waffe->getwuerfelanzahl()
                                                    ,$waffe->getWuerfelart()
                                                    ,$waffe->getSchadensbonus());?></td>


            <td><?php echo $waffe->getWaffenart();?></td>
            <td><?php echo Charakter::getWaffenfertigkeitswertaktuelleWaffe($waffe->getWaffenart(),$charakter->getHandgemengeskill(), $charakter->getKettenwaffenskill(),$charakter->getKlingenwaffenskill(), $charakter->getStangenwaffenskill(), $charakter->getHiebwaffenskill());?></td>
        </tr>

        </tbody>
        <table style="text-align: center" border="1">
            <thead>


            <th>Schild</th>
            <th>Verteidgungsbonus</th>
            <th>Schadensreduktion</th>


            </thead>
            <tbody>
            <tr>
                <td><?php echo $schild->getSname(); ?></td>
                <td><?php echo $schild->getVerteidigungsbonus(); ?></td>
                <td><?php echo $schild->getSchadensreduktion(); ?></td>

            </tr>

            </tbody>
            <table style="text-align: center" border="1">
                <thead>


                <th>Rüstung</th>
                <th>Verteidgungsbonus</th>
                <th>Schadensreduktion</th>


                </thead>
                <tbody>
                <tr>
                    <td><?php echo $ruestung->getRname(); ?></td>
                    <td><?php echo $ruestung->getVerteidigungsbonus(); ?></td>
                    <td><?php echo $ruestung->getSchadensreduktion(); ?></td>

                </tr>

                </tbody>
        <table></table>
                <?php
    }  // lädt alle für den Kampf benötigten Daten in tabellarischer Form (Prototyp)

    public static function loadUserCharakterAside($user_id)
    {
        $fkcharakter = User::getFkAktuellerCharakterFromUser($user_id);  // erfragt den aktiven Charakter des Users anhand des FK's zum Charakter
        $charakter =Charakter::getAktiverCharakter($user_id, $fkcharakter);  // erzeugt ein Charakter-Objekt mit User ID und fk zum Charakter
        $waffe = Charakter::getAktuelleWaffe($charakter->getFkAktivewaffe());  // erzeugt ein Waffen-Objekt das an den Charakter gebunden ist durch den FK
        $schild = Charakter::getAktivesSchild($charakter->getFkAktivesschild());  // erzeugt ein Schild-Objekt das an den Charakter gebunden ist durch den FK
        $ruestung = Charakter::getAktiveRuestung($charakter->getFkAktiveruestung());  // erzeugt ein Ruestung-Objekt das an den Charakter gebunden ist durch den FK


                ?>
        Charakterwerte
        <br>
        <br>
        Aktueller Charakter:
        <br><?php echo $charakter->getCname(); ?>
        <br>
        <br>Lebenspunkte :
        <?php echo $charakter->getAktlebenspunkte(); ?>/<?php echo $charakter->getLebenspunktemax();?>
        <br>
        <br> Gold :
        <?php echo $charakter->getGold(); ?>
        <br>
        <br> verfügbare Erfahrung :
        <?php echo ($charakter->getGesamterfahrung()-$charakter->getAusgegebeneerfahrung()); ?>
        <br>
        <br>
        Waffe:
        <br><?php echo $waffe->getWname(); ?>
        <br>
        <br>Rüstung:
        <br>
        <?php echo $ruestung->getRname(); ?>
        <br>
        <br> Schild:<br>
        <?php echo $schild->getSname(); ?>
        <?php
    }  // lädt den aktuell ausgewählen Charakter des Users in den Aside-Bereich

}