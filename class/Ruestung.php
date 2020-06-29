<?php


class Ruestung implements JsonSerializable
{
    private int     $rid;
    private string  $rname;
    private string  $typ;
    private int     $verteidigungsbonus;
    private int     $schadensreduktion;
    private int     $kosten;
    private int     $tickzuschlag;
    private int     $behinderung;

    public function getRid(): int
    {
        return $this->rid;
    }

    public function getRname(): string
    {
        return $this->rname;
    }

    public function getVerteidigungsbonus(): int
    {
        return $this->verteidigungsbonus;
    }

    public function getSchadensreduktion(): int
    {
        return $this->schadensreduktion;
    }

    public function getKosten(): int
    {
        return $this->kosten;
    }

    public function __construct(int $rid, string $rname, string $typ, int $verteidigungsbonus, int $schadensreduktion, int $kosten,int $tickzuschlag,int $behinderung)
    {
        $this->rid = $rid;
        $this->rname = $rname;
        $this->typ = $typ;
        $this->verteidigungsbonus = $verteidigungsbonus;
        $this->schadensreduktion = $schadensreduktion;
        $this->kosten = $kosten;
        $this->tickzuschlag = $tickzuschlag;
        $this->behinderung = $behinderung;
    }

    public static function getRuestungById($id)  // Holt ein Rüstungsobjekt anhand seiner ID aus der Datenbank
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM ruestung WHERE rid = :id ';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('id', $id, PDO::PARAM_INT);
            $sth->execute();
            $ruestung = $sth->fetchAll(PDO::FETCH_FUNC, 'Ruestung::buildFromPDO');

        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $ruestung[0];
    }

    public static function buildFromPDO(int $rid, string $rname, string $typ, int$verteidigungsbonus, int $schadensreduktion, int $kosten,int $tickzuschlag,int $behinderung) : Ruestung  // buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt
    {


        $ruestung = new Ruestung($rid, $rname, $typ,$verteidigungsbonus, $schadensreduktion,$kosten, $tickzuschlag, $behinderung);
        return $ruestung;
    }

    public static function getRuestungenFromDatabase(): array  // holt alle vorhandenen Rüstungen aus der Rüstungsdatenbank
    {


        try {
            //DB abfragen
            $dbh = Db::getConnection();
            $sql = "SELECT *                           
                FROM ruestung";
            $sth = $dbh->prepare($sql); //$sh für PDOStatement (prepared Statement)
            $sth->execute();
            $ruestungen = $sth->fetchAll(PDO::FETCH_FUNC, "Ruestung::buildFromPDO");

        } catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
//
        return $ruestungen;
    }

    public function getTyp(): string
    {
        return $this->typ;
    }

    public static function getRuestungByCharakterId(int $cid) : array
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT rid, rname, typ, verteidigungsbonus, schadensreduktion, kosten , tickzuschlag, behinderung FROM charakter_gegenstand, ruestung  WHERE fk_cid = :cid AND gegenstandstyp = ruestung.typ AND  fk_gsid = ruestung.rid';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('cid', $cid, PDO::PARAM_INT);
            $sth->execute();
            $ruestung = $sth->fetchAll(PDO::FETCH_FUNC, 'Ruestung::buildFromPDO');
        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $ruestung;
    }

    public function getTickzuschlag(): int
    {
        return $this->tickzuschlag;
    }

    public function getBehinderung(): int
    {
        return $this->behinderung;
    }

    public function jsonSerialize()
    {
        return
            [
                'Rid' => $this->getRid(),
                'Rname' => $this->getRname(),
                'typ' => $this->getTyp(),
                'verteidigungsbonus' => $this->getVerteidigungsbonus(),
                'schadensreduktion' => $this->getSchadensreduktion(),
                'kosten' => $this->getKosten(),
                'tickzuschlag' => $this->getTickzuschlag(),
                'behinderung' => $this->getBehinderung(),


            ];
    }
}