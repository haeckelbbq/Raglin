<?php


class Quest
{
    private int $qid;
    private string $frage;
    private string $antwort1;
    private string $antwort2;
    private string $antwort3;
    private string $antwort4;
    private string $a1bool;
    private string $a2bool;
    private string $a3bool;
    private string $a4bool;

    public function __construct(int $qid, string $frage, string $antwort1, string $antwort2, string $antwort3, string $antwort4, string $a1bool, string $a2bool, string $a3bool, string $a4bool)
    {
        $this->qid = $qid;
        $this->frage = $frage;
        $this->antwort1 = $antwort1;
        $this->antwort2 = $antwort2;
        $this->antwort3 = $antwort3;
        $this->antwort4 = $antwort4;
        $this->a1bool = $a1bool;
        $this->a2bool = $a2bool;
        $this->a3bool = $a3bool;
        $this->a4bool = $a4bool;
    }

    public function getQid(): int
    {
        return $this->qid;
    }

    public function getFrage(): string
    {
        return $this->frage;
    }

    public function getAntwort1(): string
    {
        return $this->antwort1;
    }

    public function getAntwort2(): string
    {
        return $this->antwort2;
    }

    public function getAntwort3(): string
    {
        return $this->antwort3;
    }

    public function getAntwort4(): string
    {
        return $this->antwort4;
    }

    public function getA1bool(): string
    {
        return $this->a1bool;
    }

    public function getA2bool(): string
    {
        return $this->a2bool;
    }

    public function getA3bool(): string
    {
        return $this->a3bool;
    }

    public function getA4bool(): string
    {
        return $this->a4bool;
    }

    public static function getQuestFromDatabase()
    {

        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM quest ';
            $sth = $dbh->prepare($sql);
            $sth->execute();
            $quest = $sth->fetchAll(PDO::FETCH_FUNC, 'quest::buildFromPDO');

        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $quest;
    }  // erzeugt ein Array mit allen in der DB befindlichen Questfragen

    public static function insertQuest(string $frage, string $antwort1, string $antwort2, string $antwort3,string $antwort4, string $a1bool, string $a2bool, string $a3bool, string $a4bool)
    {

    //    INSERT INTO quest VALUES (NULL, 'Magst du Käse?', 'ja', 'hahrthf', 'hgjfgh', 'test', 2,1,1,1);
        if ($a1bool === 'on')
        {
            $a1bool = (int)1;
            $a2bool = (int)0;
            $a3bool = (int)0;
            $a4bool = (int)0;
        }
        elseif ($a2bool === 'on')
        {
            $a1bool = (int)0;
            $a2bool = (int)1;
            $a3bool = (int)0;
            $a4bool = (int)0;
        }
        elseif ($a3bool === 'on')
        {
            $a1bool = (int)0;
            $a2bool = (int)0;
            $a3bool = (int)1;
            $a4bool = (int)0;
        }
        elseif ($a4bool === 'on')
        {
            $a1bool = (int)0;
            $a2bool = (int)0;
            $a3bool = (int)0;
            $a4bool = (int)1;
        }
//INSERT INTO quest VALUES (NULL, 'fgfdsg', 'gdfhfdgh', 'dsfgdfgsh', 'fdgsdfgds', 'dfgsdfhgs', 0,0,1,0);
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'INSERT INTO quest (qid, frage, antwort1, antwort2, antwort3, antwort4, a1bool, a2bool, a3bool, a4bool)
                               VALUES (NULL, :frage, :antwort1, :antwort2, :antwort3, :antwort4, :a1bool, :a2bool, :a3bool, :a4bool)';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('a1bool', $a1bool, PDO::PARAM_INT);
            $sth->bindParam('a2bool', $a2bool, PDO::PARAM_INT);
            $sth->bindParam('a3bool', $a3bool, PDO::PARAM_INT);
            $sth->bindParam('a4bool', $a4bool, PDO::PARAM_INT);
            $sth->bindParam('frage', $frage, PDO::PARAM_STR);
            $sth->bindParam('antwort1', $antwort1, PDO::PARAM_STR);
            $sth->bindParam('antwort2', $antwort2, PDO::PARAM_STR);
            $sth->bindParam('antwort3', $antwort3, PDO::PARAM_STR);
            $sth->bindParam('antwort4', $antwort4, PDO::PARAM_STR);
            $sth->execute();

        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }

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

    public static function buildFromPDO(int $qid, string $frage, string $antwort1, string $antwort2, string $antwort3, string $antwort4, int $a1,
                                        int $a2, int $a3, int $a4) : Quest  // buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt// buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt
    {
        $quest = new Quest($qid, $frage, $antwort1, $antwort2, $antwort3, $antwort4, $a1,  $a2,  $a3,  $a4);
        return $quest;
    }


}