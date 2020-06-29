<?php

// Allgemeine Nächste Schritte: Kampfanzeige herstellen DONE, Charakterwerte angemessen anzeigen lassen DONE,
//                              Gegner erzeugen DONE, Werte ebenfalls in die View schaffen DONE
//                              sobald alle gebrauchten Informationen in der View vorhanden sind, anfangen den Kampf zu berechnen DONE
//                              Verbindungsdatenbank zwischen Charakter und Gegenständen konzipieren und einsetzbar machen DONE
//                              Nach erfolgreich absolviertem Kampf Drops errechnen (Gold, EP, Gegenstände) und für Persistenz derselben sorgen // Drops Gegenstände als letzter fehlender Schritt
//                              Nach Abschluss dessen, überlegen wie man seine EP ausgeben kann und dafür Steuerelemente schaffen
//                              Shopfunktion detaillierter ausklügeln
//                              LOOT UND QUEST



//
// index.php dient als Controller zur Navigation durch das Programm
//


// inkludieren der config und aller Klassen
include 'config.php';
spl_autoload_register(function ($class){
    include 'class/' . $class . '.php';
});



// Im Folgenden werden Übergabevariablen deklariert die als Schnittstelle zwischen den Views und den Methoden fungieren.

$id = $_REQUEST     ['id'] ?? 0;             // Ansteuerung der meisten ID's im laufenden Programm
$cid = $_REQUEST    ['cid'] ?? 0;            // Ansteuerung der Charakter ID
$gid = $_REQUEST    ['gid'] ?? 0;            // Ansteuerung der Gegner ID
$cgid = $_REQUEST    ['cgid'] ?? 0;          // Ansteuerung der Inventar ID des Charakters (charakter_gegenstand)
$typ = $_REQUEST    ['typ'] ?? '';           // Ansteuerung des Typs für Gegenstände (inkl. Waffen, Rüstungen & Schilde)
$action = $_REQUEST ['action'] ?? '';        // steuert die Aktion die ausgeführt werden soll
$area = $_REQUEST  ['area'] ?? '';           // steuert den Ort an dem etwas ausgeführt werden soll
$kosten = $_REQUEST['kosten'] ?? 0;          // übergibt den Goldwert eines Gegenstands
$password = $_POST  ['password'] ?? '';      // Dient Login und der Registrierung
$password2 = $_POST ['password2'] ?? '';     // Dient der Registrierung
$name = $_POST      ['name'] ?? '';          // Dient Login (wird auch einmalig in anderem Zusammenhang verwendet

// Übergabevariablen Charaktererstellung (+ Charaktername $POST['name']

$gesamterfahrung = $_REQUEST['gesamterfahrung'] ?? 0;
$ausgegebeneerfahrung=$_REQUEST['ausgegebeneerfahrung']?? 0;
$ausstrahlung = $_REQUEST['ausstrahlung'] ?? 0;
$beweglichkeit = $_REQUEST['beweglichkeit'] ?? 0;
$staerke = $_REQUEST['staerke'] ?? 0;
$intuition = $_REQUEST['intuition'] ?? 0;
$konstitution = $_REQUEST['konstitution'] ?? 0;
$mystik = $_REQUEST['mystik'] ?? 0;
$verstand = $_REQUEST['verstand'] ?? 0;
$willenskraft = $_REQUEST['willenskraft'] ?? 0;
$rasse = $_REQUEST['rasse'] ?? 0;

// Übergabevariablen für den Kampf

$gegnerklasse=$_REQUEST['gegnerklasse'] ?? 0;  // bestimmt darüber wie groß die Belohnung nach dem Kampf ist
$aktlebenspunkte=$_REQUEST['aktlebenspunkte'] ?? 0;  // wird nach jedem Kampf aktualisiert

// Übergabevariablen für die Questarbeitung

$frage = $_REQUEST['frage'] ?? '';
$antwort1 = $_REQUEST['antwort1'] ?? '';
$antwort2 = $_REQUEST['antwort2'] ?? '';
$antwort3 = $_REQUEST['antwort3'] ?? '';
$antwort4 = $_REQUEST['antwort4'] ?? '';
$a1bool = $_REQUEST['abool1'] ?? '';
$a2bool = $_REQUEST['abool2'] ?? '';
$a3bool = $_REQUEST['abool3'] ?? '';
$a4bool = $_REQUEST['abool4'] ?? '';
$antwort = $_POST['antwort'] ?? 2;  // Wertet die Antwort im Questmodus aus, in der DB steht 1 für richtig und 0 für falsch. Deswegen Initialisierung mit der 2

//$test = getimagesize ('css\IMG\scroll right.png');
//Html::echoPre($test);
// Bild mit PHP anzeigen lassen
// header("Content-Type: image/jpg");
// $bild = imagecreatefromjpeg('IMG/Fantasy.jpg');
// imagejpeg($bild);

session_start();  // Session & Controller - Start

switch ($action)
{

    case ($action === 'anzeige');  // anzeige öffnet im Folgenden die einzelnen Views
    {
        if ($area === 'charakterbogen')
        {
            $user_id = $_SESSION['user_id'];
            $charaktere = Charakter::getCharakterByUserId($user_id);  // Die auf den User bezogenen Charaktere werden aus der Datenbank geholt
            $fkcharakter = User::getFkAktuellerCharakterFromUser($user_id);  // bekommt die ID des aktuell ausgewählten Charakters

            if($fkcharakter!=0)
            {
                $charakter = Charakter::getAktiverCharakter($user_id, $fkcharakter);  // erzeugt ein Array mit den Daten des aktuellen Charakters
                $aktfertigkeitsbogen = Fertigkeiten::getAktuellenFertigkeitsbogen($fkcharakter);  // erzeugt ein Array mit den Daten des aktuellen Fertigkeitsbogens
            }

            else{$charakter=0;}
            include 'view/charakterbogenanzeige.php';
        }
        elseif ($area === 'inventar')
        {
            $user_id = $_SESSION['user_id'];
            include 'view/inventaranzeige.php';
        }
        elseif ($area === 'quest')
        {
            $user_id = $_SESSION['user_id'];
            include 'view/questanzeige.php';
        }
        elseif ($area === 'ausruestung')
        {

            $user_id = $_SESSION['user_id'];
            include 'view/ausruestungsanzeige.php';
        }
        elseif ($area === 'aktivwerden')
        {
            $user_id = $_SESSION['user_id'];
            include 'view/aktivwerdenanzeige.php';
        }
        elseif ($area === 'einstellungen')
        {
            $user_id = $_SESSION['user_id'];
            include 'view/einstellungenanzeige.php';
        }
        elseif ($area === 'shop')
        {
            $user_id = $_SESSION['user_id'];
            include 'view/shopanzeige.php';
        }
        elseif ($area === 'startmenue')
        {
            $user_id = $_SESSION['user_id'];
            $charaktere = Charakter::getCharakterByUserId($user_id);  // erzeugt ein Array mit allen Charakteren des Users
            include 'view/startmenueanzeige.php';
        }
        elseif ($area === 'login')
        {
            include 'view/loginanzeige.php';
        }
        elseif ($area === 'registry')
        {
            include 'view/registrieranzeige.php';
        }
        elseif ($area === 'kampf')
        {
            $user_id = $_SESSION['user_id'];
            $fkcharakter = User::getFkAktuellerCharakterFromUser($user_id);  // erfragt den aktiven Charakter des Users anhand des FK's zum Charakter
            $charakter =Charakter::getAktiverCharakter($user_id, $fkcharakter);  // erzeugt ein Charakter-Objekt mit User ID und fk zum Charakter
            $waffe =Charakter::getAktuelleWaffe($charakter->getFkAktivewaffe());  // erzeugt ein Waffen-Objekt das an den Charakter gebunden ist durch den FK
            $schild = Charakter::getAktivesSchild($charakter->getFkAktivesschild());  // erzeugt ein Schild-Objekt das an den Charakter gebunden ist durch den FK
            $ruestung = Charakter::getAktiveRuestung($charakter->getFkAktiveruestung());  // erzeugt ein Ruestung-Objekt das an den Charakter gebunden ist durch den FK
            $gegner = Gegner::loadGegner();
            include 'view/kampfanzeige.php';
        }

        elseif ($area === '')
        {
            include 'view/startseite.php';
        }

        elseif ($area === 'user')
        {
            $user_id = $_SESSION['user_id'];
            $benutzer = User::getDataFromDatabase();  // Holt dem Admin ein Array mit allen Usern aus der Datenbank
            include 'view/useranzeige.php';
        }
        break;
    }


    case ($action === 'auswahl');
    {
        $user_id = $_SESSION['user_id'];
        User::updateAktiverCharakter($user_id, $cid);            // An dieser Stelle wechselt der User seinen Charakter.
        $charaktere = Charakter::getCharakterByUserId($user_id); // anschließend wird seine Liste aktualisiert und wieder auf die Charakteranzeige zurückgeführt

        include 'view/startseite.php';

        if ($area === 'quest')
        {
            echo 'frag die datenbank ob die antwort richtig war ';
        }
        break;
    }

    case ($action === 'update');
    {
        $user_id = $_SESSION['user_id'];
        if ($area === 'ausruestung')        {

            $cid = User::getFkAktuellerCharakterFromUser($user_id);  // fragt den aktuellen Charakter des Users ab
            Charakter::updateAusruestung($cid, $typ, $id);
            include 'view/ausruestungsanzeige.php';
        }

        else if ($area === 'charakter')
        {
            $user_id = $_SESSION['user_id'];
            $fkcharakter = User::getFkAktuellerCharakterFromUser($user_id);  // erfragt den aktiven Charakter des Users anhand des FK's zum Charakter
            Charakter::updateCharakter($fkcharakter, $ausstrahlung, $beweglichkeit, $intuition,$konstitution,$mystik,$staerke,$verstand,$willenskraft,$gesamterfahrung,$ausgegebeneerfahrung);  // setzt die Attribute des Charakters neu (steigert sie)
            $charakter =Charakter::getAktiverCharakter($user_id, $fkcharakter);  // erzeugt ein Charakter-Objekt mit User ID und fk zum Charakter
            include 'view/charakterbogenanzeige.php';
        }
        else if ($area === 'kampfsieg')
        {
            Kampf::getDrops($cid, $gid, $gegnerklasse);
            Charakter::setAktuelleLebenspunkte($cid, $aktlebenspunkte);  // Lebenspunkte werden nach dem Kampf in die DB eingetragen
            include 'view/aktivwerdenanzeige.php';
        }
        else if ($area === 'kampfniederlage')
        {
            Charakter::setAktuelleLebenspunkte($cid, $aktlebenspunkte);  // Lebenspunkte werden nach dem Kampf in die DB eingetragen
            include 'view/aktivwerdenanzeige.php';
        }
        break;
    }
    case ($action === 'heilen');
    {
            $user_id = $_SESSION['user_id'];
            $cid = User::getFkAktuellerCharakterFromUser($user_id);  // erfragt den aktiven Charakter des Users anhand des FK's zum Charakter
            $charakter = Charakter::getAktiverCharakter($user_id, $cid);  // erzeugt ein Charakter-Objekt mit User ID und fk zum Charakter

            if ($charakter->getAktlebenspunkte() + 30 > $charakter->getLebenspunktemax())
            {
                $heilung =$charakter->getLebenspunktemax();  // heilt höchstens bis zu den maximalen Lebenspunkten
            }
            else
            {
                $heilung = $charakter->getAktlebenspunkte() + 30;  // heilt um 30 Lebenspunkte
            }

            Charakter::setAktuelleLebenspunkte($cid, $heilung);  // aktuelle Lebenspunkte werden eingetraqen
            Gegenstand::deleteGegenstand($cgid);  // benutzter Heiltrank wird zerstört
            include 'view/inventaranzeige.php';
            break;
    }
    case ($action === 'logout');
    {
        session_destroy();
        include 'view/startseite.php';
        break;
    }
    case ($action === 'insert');
    {
        if ($area === 'charakter')
        {
            $user_id = $_SESSION['user_id'];
            $charaktere = Charakter::getCharakterByUserId($user_id);  // Charaktere werden hier aus der Datenbank abgefragt um zu verhindern

            if (count($charaktere ) > 14)                             // dass ein einzelner User mehr als 15 Charaktere verwalten darf
            {
                echo 'Maximal 15 Charaktere erlaubt';
            }
            else
            {
                Charakter::insertCharakter($user_id, $name,$rasse,$ausstrahlung, $beweglichkeit, $intuition, $konstitution,
                    $mystik, $staerke, $verstand, $willenskraft,$ausstrahlung, $beweglichkeit, $intuition, $konstitution,
                    $mystik, $staerke, $verstand, $willenskraft);  // Werte kommen vom User aus der Charakterbogenanzeige und werden in die Datenbank gespeichert


                $letzterCharakter=Charakter::getNeusterCharakter();  // Holt die ID des zuletzt erstellten Charakters
                Fertigkeiten::insertFertigkeitsbogen($letzterCharakter);  // schreibt den Key in die Tabelle um einen Tupel an den Charakter zu knüpfen
                $charaktere = Charakter::getCharakterByUserId($user_id);  // Holt ein Array mit allen Charakteren (auch den eben erstellten)
                User::updateAktiverCharakter($user_id, $letzterCharakter);  // wählt den neu erstellten Charakter sofort aus
            }
            include 'view/startmenueanzeige.php';
        }

        elseif ($area === 'user')
        {
            if ($password !== $password2)
            {
                echo 'Die Passwörter stimmen nicht überein';
                include 'view\loginanzeige.php';
            }
            if (strlen($password) < 1)
            {
                echo 'Passwort ist zu kurz';
                include 'view\loginanzeige.php';
            }
            else {
                if (User::doesNameExist($name) === true)
                {
                    echo 'Username bereits vergeben';
                    include 'view\loginanzeige.php';

                }
                else {
                    echo 'Sie haben eine E-Mail erhalten, bitte aktivieren sie den Link darin und ihr Benutzerkonto wird freigeschaltet';
                    User::buildNewUser($name, $password);
                    include 'view\startseite.php';
                }
            }
            break;
        }
        elseif ($area === 'quest')
        {
            $user_id = $_SESSION['user_id'];
            Quest::insertQuest($frage, $antwort1, $antwort2, $antwort3, $antwort4 ,$a1bool, $a2bool, $a3bool,  $a4bool);  // Methodenaufruf mit dem der Admin eine Frage mit entsprechenden Antworten in die DB schreiben kann
            include 'view/questanzeige.php';
        }
        elseif($area === 'shop')
        {
            $user_id = $_SESSION['user_id'];
            $cid = User::getFkAktuellerCharakterFromUser($user_id);  // Liest den aktuellen Charakter des Users aus
            Gegenstand::insertGegenstand($cid, $typ, $id);  // Übergibt den aktuellen Charakter, den Gegenstandstyp und die Id des Gegenstands und schreibt ihn rein.
            Charakter::updateGold($cid, '-', $kosten);  // Zieht dem Charakter das Gold entsprechend dem Gegenstandswert ab
            include 'view/shopanzeige.php';
        }
        break;
    }

    case ($action === 'delete');
    {
        $user_id = $_SESSION['user_id'];
        if ($area === 'user')
        {
            User::deleteUser($id);
            $benutzer = User::getDataFromDatabase(); // Hier wird für den Admin die Benutzerliste erzeugt und in der View mittels for-Schleife zur Anzeige aufbereitet.
            include 'view/useranzeige.php';
        }
        elseif ($area === 'charakter')
        {

            $user = User::getById($user_id);  //an dieser Stelle wird ein Userobjekt anhand der $user_id erzeugt um folgenden Schritt durchzuführen:

            if($user->getFkAktivercharakter() == $cid)                // Hier wird eine Abfrage auf den FK zum aktiven Charakter durchgeführt der sich am Userobjekt befindet.
            {                                                         // Damit soll die Charakter ID beim Button 'löschen' aus der Charakteranzeige verglichen werden
                User::updateAktiverCharakter($user_id, 0);  // Sollte der User den Charakter wählen, den er gerade als aktiven Char führt, wird der FK auf 0 (default) gesetzt
            }                                                         // !! WICHTIG !! - Verhindert einen Fehler, dass bei der Aktualisierung der Anzeige der noch der alte FK abgefragt wird, der Charakter aber nicht mehr existiert

            Charakter::deleteCharakter($user_id, $cid); // löscht den Charakter und aktualisiert die Anzeige
            $charaktere = Charakter::getCharakterByUserId($user_id);  // holt ein Array aller Charaktere des Users aus der DB
            include 'view/charakterbogenanzeige.php';
        }
        else if ($area === 'inventar')
        {
            $cid = User::getFkAktuellerCharakterFromUser($user_id);  // fragt den aktuellen Charakter ab
            Charakter::updateGold($cid, '+', round($kosten / 3, 0));  // teilt beim Verkaufen den Gegenstandswert durch 3 und rundet ihn, das Ergebnis bekommt der Charakter als Gold
            Gegenstand::deleteGegenstand($cgid);  // der verkaufte Gegenstand wird zerstört
            include 'view/inventaranzeige.php';
        }
        break;
    }

    case ($action === 'checklogin');
    {
        if (User::loginUser($name, $password))  // überprüft ob ein User mit den eingegebenen Daten vorhanden ist
        {
            $user_id = User::getIdByNamePassword($name, $password);  // gibt die User-ID aus sofern der Login erfolgreich durchgeführt werden konnte
            $_SESSION['user_id'] = $user_id;
            $charaktere = Charakter::getCharakterByUserId($user_id);  // holt ein Array aller Charaktere des Users aus der DB

            if(isset($user_id) && User::getById($user_id)->getRolle() === 'admin')
            {
                $benutzer = User::getDataFromDatabase();  // Holt dem Admin ein Array mit allen Usern aus der Datenbank
                include 'view/useranzeige.php';
            }
            else{
            include 'view/startmenueanzeige.php';}
        }
        else
        {
            //einloggen fehlgeschlagen
            $fehlermeldung = 'Der Username oder das Passwort ist falsch';
            include 'view\loginanzeige.php';
        }
        break;
    }
    default:
        include 'view\loginanzeige.php';
}
