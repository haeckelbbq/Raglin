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
        return $quest[0];
    }  // erzeugt ein Array mit allen in der DB befindlichen Questfragen

    public static function buildFromPDO(int $qid, string $frage, string $antwort1, string $antwort2, string $antwort3, string $antwort4, int $a1,
                                        int $a2, int $a3, int $a4) : Quest  // buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt// buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt
    {
        $quest = new Quest($qid, $frage, $antwort1, $antwort2, $antwort3, $antwort4, $a1,  $a2,  $a3,  $a4);
        return $quest;
    }


}