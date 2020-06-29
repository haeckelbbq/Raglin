<?php


class Fertigkeiten implements JsonSerializable
{
    private int $fk_cid;
    private int $akrobatik ;
    private int $alchemie ;
    private int $anfuehren ;
    private int $arkanekunde ;
    private int $athletik ;
    private int $darbietung ;
    private int $diplomatie;
    private int $edelhandwerk;
    private int $empathie;
    private int $entschlossenheit;
    private int $fingerfertigkeit;
    private int $geschichteundmythen;
    private int $handwerk;
    private int $heilkunde;
    private int $heimlichkeit;
    private int $jagdkunst;
    private int $laenderkunde;
    private int $naturkunde;
    private int $redegewandtheit;
    private int $schloesserundfallen;
    private int $schwimmen;
    private int $seefahrt;
    private int $strassenkunde;
    private int $tierfuehrung;
    private int $ueberleben;
    private int $wahrnehmung;
    private int $zaehigkeit;

    public function __construct(int $fk_cid, int $akrobatik, int $alchemie, int $anfuehren, int $arkanekunde, int $athletik, int $darbietung, int $diplomatie, int $edelhandwerk, int $empathie, int $entschlossenheit, int $fingerfertigkeit, int $geschichteundmythen, int $handwerk, int $heilkunde, int $heimlichkeit, int $jagdkunst, int $laenderkunde, int $naturkunde, int $redegewandtheit, int $schloesserundfallen, int $schwimmen, int $seefahrt, int $strassenkunde, int $tierfuehrung, int $ueberleben, int $wahrnehmung, int $zaehigkeit)
    {
        $this->fk_cid = $fk_cid;
        $this->akrobatik = $akrobatik;
        $this->alchemie = $alchemie;
        $this->anfuehren = $anfuehren;
        $this->arkanekunde = $arkanekunde;
        $this->athletik = $athletik;
        $this->darbietung = $darbietung;
        $this->diplomatie = $diplomatie;
        $this->edelhandwerk = $edelhandwerk;
        $this->empathie = $empathie;
        $this->entschlossenheit = $entschlossenheit;
        $this->fingerfertigkeit = $fingerfertigkeit;
        $this->geschichteundmythen = $geschichteundmythen;
        $this->handwerk = $handwerk;
        $this->heilkunde = $heilkunde;
        $this->heimlichkeit = $heimlichkeit;
        $this->jagdkunst = $jagdkunst;
        $this->laenderkunde = $laenderkunde;
        $this->naturkunde = $naturkunde;
        $this->redegewandtheit = $redegewandtheit;
        $this->schloesserundfallen = $schloesserundfallen;
        $this->schwimmen = $schwimmen;
        $this->seefahrt = $seefahrt;
        $this->strassenkunde = $strassenkunde;
        $this->tierfuehrung = $tierfuehrung;
        $this->ueberleben = $ueberleben;
        $this->wahrnehmung = $wahrnehmung;
        $this->zaehigkeit = $zaehigkeit;
    }



    public function getFkCid(): int
    {
        return $this->fk_cid;
    }

    public function getAkrobatik(): int
    {
        return $this->akrobatik;
    }

    public function getAlchemie(): int
    {
        return $this->alchemie;
    }

    public function getAnfuehren(): int
    {
        return $this->anfuehren;
    }

    public function getArkanekunde(): int
    {
        return $this->arkanekunde;
    }

    public function getAthletik(): int
    {
        return $this->athletik;
    }

    public function getDarbietung(): int
    {
        return $this->darbietung;
    }

    public function getDiplomatie(): int
    {
        return $this->diplomatie;
    }

    public function getEdelhandwerk(): int
    {
        return $this->edelhandwerk;
    }

    public function getEmpathie(): int
    {
        return $this->empathie;
    }

    public function getEntschlossenheit(): int
    {
        return $this->entschlossenheit;
    }

    public function getFingerfertigkeit(): int
    {
        return $this->fingerfertigkeit;
    }

    public function getGeschichteundmythen(): int
    {
        return $this->geschichteundmythen;
    }

    public function getHandwerk(): int
    {
        return $this->handwerk;
    }

    public function getHeilkunde(): int
    {
        return $this->heilkunde;
    }

    public function getHeimlichkeit(): int
    {
        return $this->heimlichkeit;
    }

    public function getJagdkunst(): int
    {
        return $this->jagdkunst;
    }

    public function getLaenderkunde(): int
    {
        return $this->laenderkunde;
    }

    public function getNaturkunde(): int
    {
        return $this->naturkunde;
    }

    public function getRedegewandtheit(): int
    {
        return $this->redegewandtheit;
    }

    public function getSchloesserundfallen(): int
    {
        return $this->schloesserundfallen;
    }

    public function getSchwimmen(): int
    {
        return $this->schwimmen;
    }

    public function getSeefahrt(): int
    {
        return $this->seefahrt;
    }

    public function getStrassenkunde(): int
    {
        return $this->strassenkunde;
    }

    public function getTierfuehrung(): int
    {
        return $this->tierfuehrung;
    }

    public function getUeberleben(): int
    {
        return $this->ueberleben;
    }

    public function getWahrnehmung(): int
    {
        return $this->wahrnehmung;
    }

    public function getZaehigkeit(): int
    {
        return $this->zaehigkeit;
    }

    public static function getAttributezuFert (string $fertigkeit):array
    {

        switch ($fertigkeit) {
            case "akrobatik":
                $AttributezuFert = ["BEW", "STA"];
                break;
            case "alchemie":
                $AttributezuFert = ["MYS", "VER"];
                break;
            case "anfuehren":
                $AttributezuFert = ["AUS", "WIL"];
                break;
            case "arkanekunde":
                $AttributezuFert = ["MYS", "VER"];
                break;
            case "athletik":
                $AttributezuFert = ["BEW", "STA"];
                break;
            case "darbietung":
                $AttributezuFert = ["AUS", "WIL"];
                break;
            case "diplomatie":
                $AttributezuFert = ["AUS", "VER"];
                break;
            case "edelhandwerk":
                $AttributezuFert = ["INT", "VER"];
                break;
            case "empathie":
                $AttributezuFert = ["INT", "VER"];
                break;
            case "entschlossenheit":
                $AttributezuFert = ["AUS", "WIL"];
                break;
            case "fingerfertigkeit":
                $AttributezuFert = ["AUS", "BEW"];
                break;
            case "geschichteundmythen":
                $AttributezuFert = ["MYS", "VER"];
                break;
            case "handwerk":
                $AttributezuFert = ["KON", "VER"];
                break;
            case "heilkunde":
                $AttributezuFert = ["INT", "VER"];
                break;
            case "heimlichkeit":
                $AttributezuFert = ["BEW", "INT"];
                break;
            case "jagdkunst":
                $AttributezuFert = ["KON", "VER"];
                break;
            case "laenderkunde":
                $AttributezuFert = ["INT", "VER"];
                break;
            case "naturkunde":
                $AttributezuFert = ["INT", "VER"];
                break;
            case "redegewandtheit":
                $AttributezuFert = ["AUS", "WIL"];
                break;
            case "schloesserundfallen":
                $AttributezuFert = ["INT", "BEW"];
                break;
            case "schwimmen":
                $AttributezuFert = ["STA", "KON"];
                break;
            case "seefahrt":
                $AttributezuFert = ["BEW", "KON"];
                break;
            case "strassenkunde":
                $AttributezuFert = ["AUS", "INT"];
                break;
            case "tierfuehrung":
                $AttributezuFert = ["AUS", "BEW"];
                break;
            case "ueberleben":
                $AttributezuFert = ["INT", "KON"];
                break;
            case "wahrnehmung":
                $AttributezuFert = ["INT", "WIL"];
                break;
            case "zaehigkeit":
                $AttributezuFert = ["KON", "WIL"];
                break;
        }return $AttributezuFert;
    }

    public static function getFertigkeitsbogenFromDatabase(int $cid): array  // holt alle vorhandenen Waffen aus der Waffendatenbank
    {
        try {
            //DB abfragen
            $dbh = Db::getConnection();
            $sql = "SELECT *                           
                FROM fertigkeitsbogen
                where fk_cid =:cid ";

            $sth = $dbh->prepare($sql); //$sh für PDOStatement (prepared Statement)
            $sth->bindParam('cid', $cid, PDO::PARAM_INT);
            $sth->execute();
            $aktuellerCharFertigkeiten = $sth->fetchAll(PDO::FETCH_FUNC, "Fertigkeiten::buildFromPDO");



        } catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }

        return $aktuellerCharFertigkeiten;
    }


    public static function insertFertigkeitsbogen(int $cid)
    {



        try {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'INSERT INTO fertigkeitenbogen(fk_cid)
                        VALUES(:cid)';
            $sth = $dbh->prepare($sql);;
            $sth->bindParam('cid', $cid, PDO::PARAM_INT);
            // Überlegung: Bei der Charaktererstellung evtl. Defaultwerte in die fk_s eintragen evtl auch Startgold? Wenn dann hier.
            // Aktuelle Lebenspunkte? reicht denk ich im Formular verwaltet zu werden, denn die sind ohnehin nur für die Kampfsequenz "temporär" vorhanden;
            // Parameterbinding einbauen nach der Entscheidungsfindung.
            $sth->execute();
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }

    public static function getAktuellenFertigkeitsbogen($aktivercharakter) : Fertigkeiten
    {

        try {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM fertigkeitenbogen WHERE fk_cid = :aktivercharakter';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('aktivercharakter', $aktivercharakter, PDO::PARAM_INT);
            $sth->execute();
            $fertigkeiten = $sth->fetchAll(PDO::FETCH_FUNC, 'Fertigkeiten::buildFromPDO');

        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $fertigkeiten[0];
    }

    public static function buildFromPDO( int $fk_cid,
                                         int $akrobatik,
                                         int $alchemie ,
                                         int $anfuehren ,
                                         int $arkanekunde ,
                                         int $athletik ,
                                         int $darbietung ,
                                         int $diplomatie,
                                         int $edelhandwerk,
                                         int $empathie,
                                         int $entschlossenheit,
                                         int $fingerfertigkeit,
                                         int $geschichteundmythen,
                                         int $handwerk,
                                         int $heilkunde,
                                         int $heimlichkeit,
                                         int $jagdkunst,
                                         int $laenderkunde,
                                         int $naturkunde,
                                         int $redegewandtheit,
                                         int $schloesserundfallen,
                                         int $schwimmen,
                                         int $seefahrt,
                                         int $strassenkunde,
                                         int $tierfuehrung,
                                         int $ueberleben,
                                         int $wahrnehmung,
                                         int $zaehigkeit) : Fertigkeiten  // buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt
    {

        $fertigkeiten = new Fertigkeiten(  $fk_cid,
            $akrobatik,
            $alchemie ,
            $anfuehren ,
            $arkanekunde ,
            $athletik ,
            $darbietung ,
            $diplomatie,
            $edelhandwerk,
            $empathie,
            $entschlossenheit,
            $fingerfertigkeit,
            $geschichteundmythen,
            $handwerk,
            $heilkunde,
            $heimlichkeit,
            $jagdkunst,
            $laenderkunde,
            $naturkunde,
            $redegewandtheit,
            $schloesserundfallen,
            $schwimmen,
            $seefahrt,
            $strassenkunde,
            $tierfuehrung,
            $ueberleben,
            $wahrnehmung,
            $zaehigkeit);
        return $fertigkeiten;
    }



    public function jsonSerialize()
    {
        return
            [
                'fk_cid'  =>  $this->getFkCid(),
                'akrobatik'  =>  $this->getAkrobatik(),
                'alchemie'  => $this->getAlchemie(),
                'anfuehren'  => $this->getAnfuehren(),
                'arkanekunde'  => $this->getArkanekunde(),
                'athletik'  => $this->getAthletik(),
                'darbietung'  => $this->getDarbietung(),
                'diplomatie'  => $this->getDiplomatie(),
                'edelhandwerk'  => $this->getEdelhandwerk(),
                'empathie'  => $this->getEmpathie(),
                'entschlossenheit'  => $this->getEntschlossenheit(),
                'fingerfertigkeit'  => $this->getFingerfertigkeit(),
                'geschichteundmythen'  => $this->getGeschichteundmythen(),
                'handwerk'  => $this->getHandwerk(),
                'heilkunde'  => $this->getHeilkunde(),
                'heimlichkeit'  => $this->getHeimlichkeit(),
                'jagdkunst'  => $this->getJagdkunst(),
                'laenderkunde'  => $this->getLaenderkunde(),
                'naturkunde'  => $this->getNaturkunde(),
                'redegewandtheit'  => $this->getRedegewandtheit(),
                'schloesserundfallen'  => $this->getSchloesserundfallen(),
                'schwimmen'  => $this->getSchwimmen(),
                'seefahrt'  => $this->getSeefahrt(),
                'strassenkunde'  => $this->getStrassenkunde(),
                'tierfuehrung'  => $this->getTierfuehrung(),
                'ueberleben'  => $this->getUeberleben(),
                'wahrnehmung'  => $this->getWahrnehmung(),
                'zaehigkeit'  => $this->getZaehigkeit()

            ];
    }
}