<?php


class Waffe implements JsonSerializable
{
    private int     $wid;
    private string  $wname;
    private string  $typ;
    private string  $attri1;
    private string  $atrri2;
    private int     $wuerfelanzahl;
    private int     $wuerfelart;
    private int     $schadensbonus;
    private string  $waffenart;
    private int     $kosten;
    private int     $waffengeschwindigkeit;

    public function __construct(  int $waffenid
                                , string $wname
                                , string $typ
                                , string $attri1
                                , string $atrri2
                                , int $wuerfelanzahl
                                , int $wuerfelart
                                , int $schadensbonus
                                , string $waffenart
                                , int $kosten
                                , int $waffengeschwindigkeit)
    {
        $this->wid = $waffenid;
        $this->wname = $wname;
        $this->typ = $typ;
        $this->attri1 = $attri1;
        $this->atrri2 = $atrri2;
        $this->wuerfelanzahl = $wuerfelanzahl;
        $this->wuerfelart = $wuerfelart;
        $this->schadensbonus = $schadensbonus;
        $this->waffenart = $waffenart;
        $this->kosten = $kosten;
        $this->waffengeschwindigkeit=$waffengeschwindigkeit;
    }


    public function getWaffengeschwindigkeit(): int
    {
        return $this->waffengeschwindigkeit;
    }

    public function getWid(): int
    {
        return $this->wid;
    }

    public function getWname(): string
    {
        return $this->wname;
    }

    public function getAttri1(): string
    {
        return $this->attri1;
    }

    public function getAttri2(): string
    {
        return $this->atrri2;
    }

    public function getWuerfelanzahl(): int
    {
        return $this->wuerfelanzahl;
    }

    public function getWuerfelart(): int
    {
        return $this->wuerfelart;
    }

    public function getSchadensbonus(): int
    {
        return $this->schadensbonus;
    }

    public function getKosten(): int
    {
        return $this->kosten;
    }

    public function getTyp(): string
    {
        return $this->typ;
    }

    public function getWaffenart(): string
    {
        return $this->waffenart;
    }

    public static function getWaffenByCharakterId(int $cid) : array
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen

            $sql = 'SELECT wid, wname, typ, attri1, attri2, wuerfelanzahl, wuerfelart, schadensbonus, waffenart, kosten, waffengeschwindigkeit FROM charakter_gegenstand, waffe WHERE fk_cid = :cid AND gegenstandstyp = waffe.typ AND  fk_gsid = waffe.wid';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('cid', $cid, PDO::PARAM_INT);
            $sth->execute();
            $waffen = $sth->fetchAll(PDO::FETCH_FUNC, 'Waffe::buildFromPDO');

        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $waffen;
    }

    public static function getWaffeById($id)
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM waffe WHERE wid = :id ';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('id', $id, PDO::PARAM_INT);
            $sth->execute();
            $waffe = $sth->fetchAll(PDO::FETCH_FUNC, 'Waffe::buildFromPDO');

        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $waffe[0];
    }  // holt eine Waffe anhand ihrer ID aus der Datenbank

    public static function buildFromPDO(int $wid, string $wname, $typ, string $attri1, string $attri2, int $wuerfelanzahl,
                                        int $wuerfelart, int $schadensbonus, string $waffenart, int $kosten, int $waffengeschwindigkeit) : Waffe  // buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt
    {

        $waffe = new Waffe($wid, $wname, $typ,$attri1, $attri2, $wuerfelanzahl, $wuerfelart, $schadensbonus, $waffenart, $kosten,$waffengeschwindigkeit);
        return $waffe;
    }

    public static function getWaffenFromDatabase(): array  // holt alle vorhandenen Waffen aus der Waffendatenbank
    {
        try {
            //DB abfragen
            $dbh = Db::getConnection();
          $sql = "SELECT *                           
                FROM waffe";
            $sth = $dbh->prepare($sql); //$sh für PDOStatement (prepared Statement)
            $sth->execute();
            $waffen = $sth->fetchAll(PDO::FETCH_FUNC, "Waffe::buildFromPDO");



        } catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }

        return $waffen;
    }
    public function jsonSerialize()
    {
          return
            [
                'wid' => $this->getWid(),
                'wname' => $this->getWname(),
                'typ' => $this->getTyp(),
                'attri1' => $this->getAttri1(),
                'attri2' => $this->getAttri2(),
                'wuerfelanzahl' => $this->getWuerfelanzahl(),
                'wuerfelart' => $this->getWuerfelart(),
                'schadensbonus' => $this->getSchadensbonus(),
                'waffenart' => $this->getWaffenart(),
                'kosten' => $this->getKosten(),
                'waffengeschwindigkeit' => $this->getWaffengeschwindigkeit(),

            ];
    }


}