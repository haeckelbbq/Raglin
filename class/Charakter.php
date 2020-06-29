<?php


class Charakter implements JsonSerializable
{

//Verwaltung
    private int     $cid;
    private int     $fk_user;
    private int     $fk_aktivewaffe;
    private int     $fk_aktiveruestung;
    private int     $fk_aktivesschild;
    private string  $cname;

//Aktiva
    private int     $gold;
    private int     $gesamterfahrung;
    private int     $aktlebenspunkte;
    private int     $lebenspunktemax;
    private int     $tick;
    //Attribute
    private string  $rasse;
    private int     $startausstrahlung;
    private int     $startbeweglichkeit;
    private int     $startintuition;
    private int     $startkonstitution;
    private int     $startmystik;
    private int     $startstaerke;
    private int     $startverstand;
    private int     $startwillenskraft;
    private int     $ausstrahlung;
    private int     $beweglichkeit;
    private int     $intuition;
    private int     $konstitution;
    private int     $mystik;
    private int     $staerke;
    private int     $verstand;
    private int     $handgemengeskill;
    private int     $hiebwaffenskill;
    private int     $kettenwaffenskill;
    private int     $klingenwaffenskill;
    private int     $stangenwaffenskill;
    private int     $ausgegebeneerfahrung;
    private int     $willenskraft;


    /**
     * @return int
     */
    public function getStartausstrahlung(): int
    {
        return $this->startausstrahlung;
    }

    /**
     * @return int
     */
    public function getStartbeweglichkeit(): int
    {
        return $this->startbeweglichkeit;
    }

    /**
     * @return int
     */
    public function getStartintuition(): int
    {
        return $this->startintuition;
    }

    /**
     * @return int
     */
    public function getStartkonstitution(): int
    {
        return $this->startkonstitution;
    }

    /**
     * @return int
     */
    public function getStartmystik(): int
    {
        return $this->startmystik;
    }

    /**
     * @return int
     */
    public function getStartstaerke(): int
    {
        return $this->startstaerke;
    }

    /**
     * @return int
     */
    public function getStartverstand(): int
    {
        return $this->startverstand;
    }

    /**
     * @return int
     */
    public function getStartwillenskraft(): int
    {
        return $this->startwillenskraft;
    }
    public function getTick():float
    {
        return $this->tick;
    }




    public function __construct(int $cid,
                                int $fk_user,
                                int $fk_aktivewaffe,
                                int $fk_aktiveruestung,
                                int $fk_aktivesschild,
                                string $cname,
                                int $gold,
                                int $gesamterfahrung,
                                int $aktlebenspunkte,
                                int $lebenspunktemax,
                                string $rasse,
                                int $startausstrahlung,
                                int $startbeweglichkeit, int $startintuition,
                                int $startkonstitution,int $startmystik, int $startstaerke,int $startverstand, int $startwillenskraft,
                                int $ausstrahlung,
                                int $beweglichkeit, int $intuition,
                                int $konstitution,int $mystik, int $staerke,int $verstand, int $willenskraft, int $handgemengeskill, int $hiebwaffenskill, int $kettenwaffenskill,
                                int $klingenwaffenskill, int $stangenwaffenskill, float $tick,int $ausgegebeneerfahrung)

    {
        $this->cid = $cid;
        $this->fk_user = $fk_user;
        $this->fk_aktivewaffe = $fk_aktivewaffe;
        $this->fk_aktiveruestung = $fk_aktiveruestung;
        $this->fk_aktivesschild = $fk_aktivesschild;
        $this->cname = $cname;
        $this->gold = $gold;
        $this->gesamterfahrung = $gesamterfahrung;
        $this->aktlebenspunkte = $aktlebenspunkte;
        $this->lebenspunktemax = $lebenspunktemax;
        $this->ausgegebeneerfahrung= $ausgegebeneerfahrung;

        //attribute
        $this->rasse=$rasse;
        $this->startausstrahlung = $startausstrahlung;
        $this->startbeweglichkeit = $startbeweglichkeit;
        $this->startintuition = $startintuition;
        $this->startkonstitution = $startkonstitution;
        $this->startmystik = $startmystik;
        $this->startstaerke = $startstaerke;
        $this->startverstand = $startverstand;
        $this->startwillenskraft = $startwillenskraft;
        $this->ausstrahlung = $ausstrahlung;
        $this->beweglichkeit = $beweglichkeit;
        $this->intuition = $intuition;
        $this->konstitution = $konstitution;
        $this->mystik = $mystik;
        $this->staerke = $staerke;
        $this->verstand = $verstand;
        $this->willenskraft = $willenskraft;
        $this->handgemengeskill= $handgemengeskill;
        $this->hiebwaffenskill= $hiebwaffenskill;
        $this->kettenwaffenskill= $kettenwaffenskill;
        $this->klingenwaffenskill= $klingenwaffenskill;
        $this->stangenwaffenskill= $stangenwaffenskill;
        $this->tick = $tick;
    }

    public function getRasse(): string
    {
        return $this->rasse;
    }

    /**
     * @param int $ausgegebeneerfahrung
     */
    public function setAusgegebeneerfahrung(int $ausgegebeneerfahrung): void
    {
        $this->ausgegebeneerfahrung = $ausgegebeneerfahrung;
    }

    public function getAusstrahlung(): int
    {
        return $this->ausstrahlung;
    }

    public function getMystik(): int
    {
        return $this->mystik;
    }

    public function getVerstand(): int
    {
        return $this->verstand;
    }

    public function getWillenskraft(): int
    {
        return $this->willenskraft;
    }



    public function getHandgemengeskill(): int
    {
        return $this->handgemengeskill;
    }

    public function getCid(): int
    {
        return $this->cid;
    }

    public function getFkUser(): int
    {
        return $this->fk_user;
    }

    public function getFkAktivewaffe(): int
    {
        return $this->fk_aktivewaffe;
    }

    public function getFkAktiveruestung(): int
    {
        return $this->fk_aktiveruestung;
    }

    public function getFkAktivesschild(): int
    {
        return $this->fk_aktivesschild;
    }

    public function getCname(): string
    {
        return $this->cname;
    }

    public function getGold(): int
    {
        return $this->gold;
    }

    public function getGesamterfahrung(): int
    {
        return $this->gesamterfahrung;
    }

    public function getAktlebenspunkte(): int
    {
        return $this->aktlebenspunkte;
    }

    public function getLebenspunktemax(): int
    {
        return $this->lebenspunktemax;
    }

    public function getBeweglichkeit(): int
    {
        return $this->beweglichkeit;
    }

    public function getIntuition(): int
    {
        return $this->intuition;
    }

    public function getKonstitution(): int
    {
        return $this->konstitution;
    }

    public function getStaerke(): int
    {
        return $this->staerke;
    }

    public function getHiebwaffenskill(): int
    {
        return $this->hiebwaffenskill;
    }

    public function getKettenwaffenskill(): int
    {
        return $this->kettenwaffenskill;
    }

    public function getKlingenwaffenskill(): int
    {
        return $this->klingenwaffenskill;
    }

    public function getStangenwaffenskill(): int
    {
        return $this->stangenwaffenskill;
    }

    /**
     * @return int
     */
    public function getStarterfahrung(): int
    {
        return $this->starterfahrung;
    }

    /**
     * @return int
     */
    public function getAusgegebeneerfahrung(): int
    {
        return $this->ausgegebeneerfahrung;
    }



    public static function insertCharakter(int $fk_user, string $cname,string $rasse,int $ausstrahlung, int $beweglichkeit, int $intuition, int $konstitution,
                                           int $mystik, int $staerke, int $verstand, int $willenskraft,int $startausstrahlung, int $startbeweglichkeit, int $startintuition, int $startkonstitution,
                                           int $startmystik, int $startstaerke, int $startverstand, int $startwillenskraft)
    {

        $lebenspunktemax = (5 + $konstitution) * 5;
        $lebenspunkteakt = $lebenspunktemax;

        try {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'INSERT INTO charakter(cid, fk_user, fk_aktivewaffe, fk_aktiveruestung, fk_aktivesschild,
                                cname, gold, gesamterfahrung, aktlebenspunkte,lebenspunktemax,startausstrahlung, startbeweglichkeit,
                                startintuition, startkonstitution,startmystik, startstaerke, startverstand ,startwillenskraft, ausstrahlung, beweglichkeit,
                                intuition, konstitution,mystik, staerke, verstand ,willenskraft,
                                handgemengeskill,hiebwaffenskill,kettenwaffenskill,klingenwaffenskill,stangenwaffenskill,tick, rasse,ausgegebeneerfahrung)
                        VALUES(NULL, :fk_user, 1, 1, 1, :cname, 30, 0, :lebenspunktemax, 
                                     :lebenspunkteakt, :startausstrahlung, :startbeweglichkeit, :startintuition, :startkonstitution, :startmystik, :startstaerke, 
                                     :startverstand, :startwillenskraft, :ausstrahlung, :beweglichkeit, :intuition, :konstitution, :mystik, :staerke, :verstand, :willenskraft,
                                     0,0,0,0,0,0, :rasse,0)';
            $sth = $dbh->prepare($sql);;
            $sth->bindParam('cname', $cname, PDO::PARAM_STR);
            $sth->bindParam('lebenspunktemax', $lebenspunktemax, PDO::PARAM_INT);
            $sth->bindParam('lebenspunkteakt', $lebenspunkteakt, PDO::PARAM_INT);
            $sth->bindParam('fk_user', $fk_user, PDO::PARAM_INT);
            $sth->bindParam('rasse', $rasse, PDO::PARAM_STR);
            $sth->bindParam('ausstrahlung', $ausstrahlung, PDO::PARAM_INT);
            $sth->bindParam('beweglichkeit', $beweglichkeit, PDO::PARAM_INT);
            $sth->bindParam('intuition', $intuition, PDO::PARAM_INT);
            $sth->bindParam('konstitution', $konstitution, PDO::PARAM_INT);
            $sth->bindParam('mystik', $mystik, PDO::PARAM_INT);
            $sth->bindParam('staerke', $staerke, PDO::PARAM_INT);
            $sth->bindParam('verstand', $verstand, PDO::PARAM_INT);
            $sth->bindParam('willenskraft', $willenskraft, PDO::PARAM_INT);
            $sth->bindParam('startausstrahlung', $startausstrahlung, PDO::PARAM_INT);
            $sth->bindParam('startbeweglichkeit', $startbeweglichkeit, PDO::PARAM_INT);
            $sth->bindParam('startintuition', $startintuition, PDO::PARAM_INT);
            $sth->bindParam('startkonstitution', $startkonstitution, PDO::PARAM_INT);
            $sth->bindParam('startmystik', $startmystik, PDO::PARAM_INT);
            $sth->bindParam('startstaerke', $startstaerke, PDO::PARAM_INT);
            $sth->bindParam('startverstand', $startverstand, PDO::PARAM_INT);
            $sth->bindParam('startwillenskraft', $startwillenskraft, PDO::PARAM_INT);

            // Überlegung: Bei der Charaktererstellung evtl. Defaultwerte in die fk_s eintragen evtl auch Startgold? Wenn dann hier.
            // Aktuelle Lebenspunkte? reicht denk ich im Formular verwaltet zu werden, denn die sind ohnehin nur für die Kampfsequenz "temporär" vorhanden;
            // Parameterbinding einbauen nach der Entscheidungsfindung.
            $sth->execute();
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }
    public static  function getGroessenklasseByRasse(string $rasse):int{

        switch ($rasse) {
            case "Gnom":
                $groessenklasse=3;
                break;
            case "Zwerg":
                $groessenklasse=4;
                break;
            case "Mensch":
                $groessenklasse=5;
                break;
            case "Alb":
                $groessenklasse=5;
                break;
            case "Varg":
                $groessenklasse=6;
                break;

        }

return $groessenklasse;

    }

    public static function getNeusterCharakter():int {

        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT MAX(cid)
                    FROM charakter ';
            $sth = $dbh->prepare($sql);

            $sth->execute();
            $neuestercharakter = $sth->fetchAll(PDO::FETCH_COLUMN);

        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $neuestercharakter[0];
    }

    public static function getCharakterById($id)
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM charakter WHERE cid = :id ';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('id', $id, PDO::PARAM_INT);
            $sth->execute();
            $charakter = $sth->fetchAll(PDO::FETCH_FUNC, 'Charakter::buildFromPDO');

        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $charakter[0];
    }

    // buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt
    public static function buildFromPDO(int $cid, int $fk_user, int $fk_aktivewaffe, int $fk_aktiveruestung, int $fk_aktivesschild, string $cname,
                        int $gold, int $starterfahrung, int $aktlebenspunkte, int $lebenspunktemax,int $startausstrahlung, int $startbeweglichkeit,
                        int $startintuition, int $startkonsitution, int $startmystik, int $startstaerke, int $startverstand, int $startwillenskraft,int $ausstrahlung, int $beweglichkeit,
                        int $intuition, int $konsitution, int $mystik, int $staerke, int $verstand, int $willenskraft, int $handgemengeskill, int $hiebwaffenskill, int $kettenwaffenskill, int $klingenwaffenskill, int $stangenwaffenskill, float $tick,string $rasse, int $ausgegebeneerfahrung) : Charakter    {


            $charakter = new Charakter(
                $cid,
                $fk_user,
                $fk_aktivewaffe,
                $fk_aktiveruestung,
                $fk_aktivesschild,
                $cname,
                $gold,
                $starterfahrung,
                $aktlebenspunkte,
                $lebenspunktemax,
                $rasse,
                $startausstrahlung,
                $startbeweglichkeit,
                $startintuition,
                $startkonsitution,
                $startmystik,
                $startstaerke,
                $startverstand,
                $startwillenskraft,
                $ausstrahlung,
                $beweglichkeit,
                $intuition,
                $konsitution,
                $mystik,
                $staerke,
                $verstand,
                $willenskraft,
                $handgemengeskill,
                $hiebwaffenskill,
                $kettenwaffenskill,
                $klingenwaffenskill,
                $stangenwaffenskill,
                $tick,
                $ausgegebeneerfahrung);
        return $charakter;
    }

    public static function getCharakterByUserId($id)
{
    try
    {
        $dbh = Db::getConnection();
        //DB abfragen
        $sql = 'SELECT * FROM charakter WHERE fk_user = :id ';
        $sth = $dbh->prepare($sql);
        $sth->bindParam('id', $id, PDO::PARAM_INT);
        $sth->execute();
        $charakter = $sth->fetchAll(PDO::FETCH_FUNC, 'Charakter::buildFromPDO');

    }
    catch (PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
    }
    return $charakter;
}  // fragt alle Charaktere des Users ab

    public static function getAktiverCharakter(int $user_id, int $aktivercharakter) : Charakter
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM charakter WHERE fk_user = :user_id AND cid = :aktivercharakter';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('user_id', $user_id, PDO::PARAM_INT);
            $sth->bindParam('aktivercharakter', $aktivercharakter, PDO::PARAM_INT);
            $sth->execute();
            $aktChar = $sth->fetchAll(PDO::FETCH_FUNC, 'Charakter::buildFromPDO');
        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $aktChar[0];

    }  // fragt den aktuellen Charakter des Users ab

    public static function deleteCharakter(int $uid, int $cid)
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'DELETE FROM charakter WHERE fk_user = :uid AND cid = :cid';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('uid', $uid, PDO::PARAM_INT);
            $sth->bindParam('cid', $cid, PDO::PARAM_INT);
            $sth->execute();
        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }  // löscht den gewünschten Charakter aus der Userliste

    public static function getAktuelleWaffe($aktivewaffe) : Waffe
    {

        try {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM Waffe WHERE wid = :aktivewaffe';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('aktivewaffe', $aktivewaffe, PDO::PARAM_INT);
            $sth->execute();
            $waffe = $sth->fetchAll(PDO::FETCH_FUNC, 'Waffe::buildFromPDO');

        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $waffe[0];
    }  // konstruiert eine Waffe anhand der ID für die aktive Waffe am Charakter

    public static function updateAusruestung(int $charakter_id, string $typ, int $gegenstands_id)
    {
        if ($typ === 'Waffe')
        {
            $typ = 'fk_aktivewaffe';
        }
        elseif ($typ === 'Ruestung')
        {
            $typ = 'fk_aktiveruestung';
        }
        elseif ($typ === 'Schild')
        {
            $typ = 'fk_aktivesschild';
        }
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'UPDATE charakter
                    SET ' .$typ . '  = :gegenstands_id
                    WHERE cid = :charakter_id';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('charakter_id', $charakter_id, PDO::PARAM_INT);
            $sth->bindParam('gegenstands_id', $gegenstands_id, PDO::PARAM_INT);
            $sth->execute();
        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function getAktivesSchild(int $aktivesschild) : Schild
    {
        try {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM schild WHERE sid = :aktivesschild';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('aktivesschild', $aktivesschild, PDO::PARAM_INT);
            $sth->execute();
            $schild = $sth->fetchAll(PDO::FETCH_FUNC, 'Schild::buildFromPDO');

        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $schild[0];
    }  // konstruiert ein Schild anhand der ID für das aktive Schild am Charakter

    public static function getAktiveRuestung(int $aktiveruestung) : Ruestung
    {
        try {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM ruestung WHERE rid = :aktiveruestung';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('aktiveruestung', $aktiveruestung, PDO::PARAM_INT);
            $sth->execute();
            $ruestung = $sth->fetchAll(PDO::FETCH_FUNC, 'Ruestung::buildFromPDO');


        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $ruestung[0];
    }  // konstruiert eine Rüstung anhand der ID für die aktive Rüstung am Charakter

    public static function getCharakterInformation(int $user_id)
    {
        $fkcharakter = User::getFkAktuellerCharakterFromUser($user_id); //erfragt den aktiven Charakter des Users anhand des FK's zum Charakter
        $charakter =Charakter::getAktiverCharakter($user_id, $fkcharakter); //erzeugt ein Charakter-Objekt mit User ID und fk zum Charakter
        $waffe =Charakter::getAktuelleWaffe($charakter->getFkAktivewaffe()); //erzeugt ein Waffen-Objekt das an den Charakter gebunden ist durch den FK
        $schild = Charakter::getAktivesSchild($charakter->getFkAktivesschild()); //erzeugt ein Schild-Objekt das an den Charakter gebunden ist durch den FK
        $ruestung = Charakter::getAktiveRuestung($charakter->getFkAktiveruestung()); //erzeugt ein Ruestung-Objekt das an den Charakter gebunden ist durch den FK
        Html::echoPre($charakter);
        Html::echoPre($waffe);
        Html::echoPre($schild);
        Html::echoPre($ruestung);
    }  // ! FÜR ENTWICKLER ! Liest alle Informationen aus dem ausgewählten Charakter aus

    public static function updateGold(int $charakter_id, string $operator, int $gegenstandskosten)
    {

        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'UPDATE charakter
                    SET gold = gold' . $operator . ' :gegenstandskosten
                    WHERE cid = :charakter_id';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('charakter_id', $charakter_id, PDO::PARAM_INT);
            $sth->bindParam('gegenstandskosten', $gegenstandskosten, PDO::PARAM_INT);
            $sth->execute();

        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }  // aktualisiert Gold des Charakters - erwartet beim Aufruf einen mathematischen Operator, der der Datenbank übergeben wird

    public static function updateErfahrung(int $cid, string $operator, int $erfahrung)
    {

        try {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'UPDATE charakter
                    SET gesamterfahrung = gesamterfahrung' . $operator . ' :erfahrung
                    WHERE cid = :cid';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('cid', $cid, PDO::PARAM_INT);
            $sth->bindParam('erfahrung', $erfahrung, PDO::PARAM_INT);
            $sth->execute();
        }
        catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function getVTDBonusMalusbyGK($GK):int{

        switch ($GK) {
            case "3":
                $BonusMalus=+4;
                break;
            case "4":
                $BonusMalus=+2;
                break;
            case "5":
                $BonusMalus=0;
                break;
            case "6":
                $BonusMalus=-2;
                break;
                     }

        return $BonusMalus;


    } //gibt den Verteidigungsbonus/Malus zurück abhängig von der Größenklasse
                                                              //GK 3= VTD+4, GK 4=VTD+2...

    public function jsonSerialize()
    {
        return
            [
            'cid'  =>  $this->getCid(),
          'fk_user'  =>  $this->getFkUser(),
          'fk_aktivewaffe'  => $this->getFkAktivewaffe(),
          'fk_aktiveruestung'  => $this->getFkAktiveruestung(),
          'fk_aktivesschild'  => $this->getFkAktivesschild(),
          'cname'  => $this->getCname(),
          'gold'  => $this->getGold(),
          'erfahrung'  => $this->getGesamterfahrung(),
          'aktlebenspunkte'  => $this->getAktlebenspunkte(),
          'lebenspunktemax'  => $this->getLebenspunktemax(),

        //attribute
          'rasse'  => $this->getRasse(),
                'startausstrahlung'  => $this->getStartausstrahlung(),
                'startbeweglichkeit'  => $this->getStartbeweglichkeit(),
                'startintuition'  => $this->getStartintuition(),
                'startkonstitution'  => $this->getStartkonstitution(),
                'startmystik'  => $this->getStartmystik(),
                'startstaerke'  => $this->getStartstaerke(),
                'startverstand'  => $this->getStartverstand(),
                'startwillenskraft'  => $this->getStartwillenskraft(),
          'ausstrahlung'  => $this->getAusstrahlung(),
          'beweglichkeit'  => $this->getBeweglichkeit(),
          'intuition'  => $this->getIntuition(),
          'konstitution'  => $this->getKonstitution(),
          'mystik'  => $this->getMystik(),
          'staerke'  => $this->getStaerke(),
          'verstand'  => $this->getVerstand(),
          'willenskraft'  => $this->getWillenskraft(),

          'handgemenge'  => $this->getHandgemengeskill(),
          'hiebwaffenskill'  => $this->getHiebwaffenskill(),
          'kettenwaffenskill'  => $this->getKettenwaffenskill(),
          'klingenwaffenskill'  => $this->getKlingenwaffenskill(),
          'stangenwaffenskill'  => $this->getStangenwaffenskill(),
          'tick'  => $this->getTick()
            ];
    }

    public static function setAktuelleLebenspunkte($cid, $aktlebenspunkte)
    {
        try {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'UPDATE charakter SET aktlebenspunkte = :aktlebenspunkte  WHERE cid = :cid';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('cid', $cid, PDO::PARAM_INT);
            $sth->bindParam('aktlebenspunkte', $aktlebenspunkte, PDO::PARAM_INT);
            $sth->execute();

        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }
    public static function getWaffenfertigkeitswertaktuelleWaffe(string $waffenart,int $handgemengeskill, int $kettenwaffenskill, int $klingenwaffenskill,int $stangenwaffenskill, int $hiebwaffenskill):int
    {


        switch ($waffenart) {
        case "Handgemenge":
            $fertwert=$handgemengeskill;
            break;
        case "Kettenwaffen":
            $fertwert=$kettenwaffenskill;
            break;
        case "Klingenwaffen":
            $fertwert=$klingenwaffenskill;
            break;
        case "Stangenwaffen":
            $fertwert=$stangenwaffenskill;
            break;
        case "Hiebwaffen":
            $fertwert=$hiebwaffenskill;
            break;
    }

        return $fertwert;
    }


    public static function updateCharakter(int $cid,int $ausstrahlung, int $beweglichkeit, int $intuition, int $konstitution,
                                   int $mystik, int $staerke, int $verstand, int $willenskraft, int $gesamterfahrung, int $ausgegebeneerfahrung)
    {
        try {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'UPDATE  charakter 
                    SET     willenskraft = :willenskraft,
                            ausstrahlung = :ausstrahlung,
                            beweglichkeit = :beweglichkeit,
                            intuition = :intuition,
                            konstitution = :konstitution,
                            mystik = :mystik,
                            staerke = :staerke,
                            verstand = :verstand,
                            gesamterfahrung = :gesamterfahrung,
                            ausgegebeneerfahrung = :ausgegebeneerfahrung
                     
                    WHERE   cid = :cid';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('cid', $cid, PDO::PARAM_INT);
            $sth->bindParam('ausstrahlung', $ausstrahlung, PDO::PARAM_INT);
            $sth->bindParam('beweglichkeit', $beweglichkeit, PDO::PARAM_INT);
            $sth->bindParam('intuition', $intuition, PDO::PARAM_INT);
            $sth->bindParam('konstitution', $konstitution, PDO::PARAM_INT);
            $sth->bindParam('mystik', $mystik, PDO::PARAM_INT);
            $sth->bindParam('staerke', $staerke, PDO::PARAM_INT);
            $sth->bindParam('verstand', $verstand, PDO::PARAM_INT);
            $sth->bindParam('willenskraft', $willenskraft, PDO::PARAM_INT);
            $sth->bindParam('gesamterfahrung', $gesamterfahrung, PDO::PARAM_INT);
            $sth->bindParam('ausgegebeneerfahrung', $ausgegebeneerfahrung, PDO::PARAM_INT);
            $sth->execute();

        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }
}
