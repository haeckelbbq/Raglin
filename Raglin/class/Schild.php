<?php


class Schild implements JsonSerializable
{
    private int     $sid;
    private string  $sname;
    private string  $typ;
    private int     $verteidigungsbonus;
    private int     $schadensreduktion;
    private int     $kosten;
    private int     $tickzuschlag;

    /**
     * @return int
     */
    public function getTickzuschlag(): int
    {
        return $this->tickzuschlag;
    }

    /**
     * @return int
     */
    public function getBehinderung(): int
    {
        return $this->behinderung;
    }
    private int     $behinderung;

    /**
     * Schild constructor.
     * @param int $sid
     * @param string $sname
     * @param string $typ
     * @param int $verteidigungsbonus
     * @param int $schadensreduktion
     * @param int $kosten
     * @param int $tickzuschlag
     * @param int $behinderung
     */
    public function __construct(int $sid, string $sname, string $typ, int $verteidigungsbonus, int $schadensreduktion, int $kosten, int $tickzuschlag, int $behinderung)
    {
        $this->sid = $sid;
        $this->sname = $sname;
        $this->typ = $typ;
        $this->verteidigungsbonus = $verteidigungsbonus;
        $this->schadensreduktion = $schadensreduktion;
        $this->kosten = $kosten;
        $this->tickzuschlag = $tickzuschlag;
        $this->behinderung = $behinderung;
    }

    public function gettyp(): string
    {
        return $this->typ;
    }

    public function getSid(): int
    {
        return $this->sid;
    }

    public function getSname(): string
    {
        return $this->sname;
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



    public static function getSchildById($id)
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM schild WHERE sid = :id ';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('id', $id, PDO::PARAM_INT);
            $sth->execute();
            $schild = $sth->fetchAll(PDO::FETCH_FUNC, 'Schild::buildFromPDO');

        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $schild[0];
    }

    public static function getSchildeByCharakterId(int $cid) : array
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen

            $sql = 'SELECT sid, sname, typ, verteidigungsbonus, schadensreduktion, kosten, tickzuschlag, behinderung FROM charakter_gegenstand, schild  WHERE fk_cid = :cid AND gegenstandstyp = schild.typ AND fk_gsid = schild.sid';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('cid', $cid, PDO::PARAM_INT);
            $sth->execute();
            $schilde = $sth->fetchAll(PDO::FETCH_FUNC, 'Schild::buildFromPDO');

        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $schilde;
    }

    public static function buildFromPDO(int $sid, string $sname, string $typ, int $verteidigungsbonus, int $schadensreduktion, int $kosten, int $tickzuschlag,int $behinderung ) : Schild  // buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt
    {
        $schild = new Schild($sid, $sname, $typ,$verteidigungsbonus, $schadensreduktion ,$kosten, $tickzuschlag, $behinderung );
        return $schild;
    }

    public static function getSchildeFromDatabase(): array  // holt alle vorhandenen Schilde aus der Schilde
    {


        try {
            //DB abfragen
            $dbh = Db::getConnection();
            $sql = "SELECT *                           
                FROM schild";

            $sth = $dbh->prepare($sql); //$sh für PDOStatement (prepared Statement)

            $sth->execute();
            $schilde = $sth->fetchAll(PDO::FETCH_FUNC, "Schild::buildFromPDO");



        } catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
//
        return $schilde;
    }
    public function jsonSerialize()
    {
        return
            [
                'sid' => $this->getSid(),
                'sname' => $this->getSname(),
                'typ' => $this->getTyp(),
                'verteidigungsbonus' => $this->getVerteidigungsbonus(),
                'schadensreduktion' => $this->getSchadensreduktion(),
                'kosten' => $this->getKosten(),
                'tickzuschlag' => $this->getTickzuschlag(),
                'behinderung' => $this->getBehinderung(),


            ];
    }
}