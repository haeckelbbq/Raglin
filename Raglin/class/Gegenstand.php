<?php


class Gegenstand
{
    private int     $gegid;
    private string  $gegname;
    private string  $typ;


    private int     $kosten;
    private int     $einnehmbar;

    public function __construct(int $gegid, string $gegname, string $typ, int $kosten, bool $einnehmbar)
    {
        $this->gegid = $gegid;
        $this->gegname = $gegname;
        $this->typ = $typ;
        $this->kosten = $kosten;
        $this->einnehmbar = $einnehmbar;
    }

    public function gettyp(): string
    {
        return $this->gtyp;
    }

    public function getGegid(): int
    {
        return $this->gegid;
    }

    public function getGegname(): string
    {
        return $this->gegname;
    }

    public function getKosten(): int
    {
        return $this->kosten;
    }

    public function getEinnehmbar(): int
    {
        return $this->einnehmbar;
    }

    public static function getGegenstandById($gegid)
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM gegenstand WHERE gegid = :gegid ';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('gegid', $gegid, PDO::PARAM_INT);
            $sth->execute();
            $gegenstand = $sth->fetchAll(PDO::FETCH_FUNC, 'Gegenstand::buildFromPDO');

        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $gegenstand[0];
    }  // holt eine Gegenstand anhand ihrer ID aus der Datenbank

    public static function buildFromPDO(int $gegid, string $gname, $typ, int $kosten, int $einnehmbar) : Gegenstand  // buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt
    {
        $gegenstand = new Gegenstand($gegid, $gname, $typ, $kosten,$einnehmbar);
        return $gegenstand;
    }

    public static function getGegenstaendeFromDatabase(): array  // holt alle vorhandenen Gegenstaende aus der DB
    {


        try {
            //DB abfragen
            $dbh = Db::getConnection();
            $sql = "SELECT *                           
                FROM gegenstand";

            $sth = $dbh->prepare($sql); //$sh für PDOStatement (prepared Statement)

            $sth->execute();
            $gegenstaende = $sth->fetchAll(PDO::FETCH_FUNC, "Gegenstand::buildFromPDO");



        } catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
//
        return $gegenstaende;
    }

    public static function getGegenstandeByCharakterId(int $cid) : array
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT gegid, gname, typ, kosten, einnehmbar FROM charakter_gegenstand, gegenstand  WHERE fk_cid = :cid AND gegenstandstyp = gegenstand.typ AND  fk_gsid = gegenstand.gegid';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('cid', $cid, PDO::PARAM_INT);
            $sth->execute();
            $gegenstand = $sth->fetchAll(PDO::FETCH_FUNC, 'Gegenstand::buildFromPDO');
        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $gegenstand;
    }

    public static function insertGegenstand(int $cid, string $gegenstandstyp, int $fk_gsid)
    {

        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'INSERT INTO charakter_gegenstand (cgid, fk_cid, gegenstandstyp, fk_gsid)
                        VALUES(NULL, :cid, :gegenstandstyp, :fk_gsid)';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('cid', $cid, PDO::PARAM_INT);
            $sth->bindParam('gegenstandstyp', $gegenstandstyp, PDO::PARAM_STR);
            $sth->bindParam('fk_gsid', $fk_gsid, PDO::PARAM_INT);
            $sth->execute();

        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}