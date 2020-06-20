<?php


class Gegner implements JsonSerializable
{
    private int     $gid;
    private string  $gname;
    private int     $lebenspunkte;
    private int     $verteidigung;
    private int     $schadensreduktion;
    private int     $angriffsbonus;
    private int     $gegnerklasse;
    private int     $initiative;
    private int     $tickzuschlag;
    private int     $wuerfelanzahlahl;
    private int     $wuerfelart;
    private int     $schadensbonus;

    /**
     * Gegner constructor.
     * @param int $gid
     * @param string $gname
     * @param int $lebenspunkte
     * @param int $verteidigung
     * @param int $schadensreduktion
     * @param int $angriffsbonus
     * @param int $gegnerklasse
     * @param int $initiative
     * @param int $tickzuschlag
     * @param int $wuerfelanzahl
     * @param int $wuerfelart
     * @param int $schadensbonus
     */
    public function __construct(int $gid, string $gname, int $lebenspunkte, int $verteidigung, int $schadensreduktion, int $angriffsbonus, int $gegnerklasse, int $initiative, int $tickzuschlag, int $wuerfelanzahlahl, int $wuerfelart, int $schadensbonus)
    {
        $this->gid = $gid;
        $this->gname = $gname;
        $this->lebenspunkte = $lebenspunkte;
        $this->verteidigung = $verteidigung;
        $this->schadensreduktion = $schadensreduktion;
        $this->angriffsbonus = $angriffsbonus;
        $this->gegnerklasse = $gegnerklasse;
        $this->initiative = $initiative;
        $this->tickzuschlag = $tickzuschlag;
        $this->wuerfelanzahlahl = $wuerfelanzahlahl;
        $this->wuerfelart = $wuerfelart;
        $this->schadensbonus = $schadensbonus;
    }


    public function getInitiative(): int
    {
        return $this->initiative;
    }

    public function getTickzuschlag(): int
    {
        return $this->tickzuschlag;
    }

    public function getGid(): int
    {
        return $this->gid;
    }

    public function getGname(): string
    {
        return $this->gname;
    }

    public function getLebenspunkte(): int
    {
        return $this->lebenspunkte;
    }

    public function getVerteidigung(): int
    {
        return $this->verteidigung;
    }

    public function getSchadensreduktion(): int
    {
        return $this->schadensreduktion;
    }

    public function getAngriffsbonus(): int
    {
        return $this->angriffsbonus;
    }

    public function getDropgold(): int
    {
        return $this->dropgold;
    }

    public function getDroperfahrung(): int
    {
        return $this->droperfahrung;
    }

    public function getGegnerklasse(): int
    {
        return $this->gegnerklasse;
    }

    public static function loadGegner()
    {
        $rnd = random_int(1, 2);
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM gegner WHERE gid = :rnd';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('rnd', $rnd, PDO::PARAM_INT);
            $sth->execute();
            $gegner = $sth->fetchAll(PDO::FETCH_FUNC, 'Gegner::buildFromPDO');
        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $gegner[0];
    }

    public static function buildFromPDO(int $gid, string  $gname, int $lebenspunkte, int $verteidigung,
                                        int $schadensreduktion, int $angriffsbonus, int $gegnerklasse,
                                        int $initiative, int $tickzuschlag, int $wuerfelanzahl,int $wuerfelart,
                                        int  $schadensbonus) : Gegner // buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt
    {
        $gegner = new Gegner($gid, $gname, $lebenspunkte, $verteidigung,$schadensreduktion, $angriffsbonus,$gegnerklasse, $initiative, $tickzuschlag, $wuerfelanzahl, $wuerfelart, $schadensbonus);
        return $gegner;
    }

    public function getWuerfelanzahl(): int
    {
        return $this->wuerfelanzahlahl;
    }

    public function getWuerfelart(): int
    {
        return $this->wuerfelart;
    }

    public function getSchadensbonus(): int
    {
        return $this->schadensbonus;
    }

    /*public static function loadDunkleSchwinge() : Gegner
    {
        $gegner = new Gegner(1, 'Dunkle Schwinge', 80, 5, 3, 3, 30);
        return $gegner;
    }

    public static function loadZuchtMeister() : Gegner
    {
        $gegner = new Gegner(2, 'Zuchtmeister', 150, 8, 5, 7, 130);
        return $gegner;
    }

    public static function loadWaldNymph() : Gegner
    {
        $gegner = new Gegner(3, 'Waldnymph', 50, 2, 0, 3, 44);
        return $gegner;
    }

    public static function loadTodesRanke() : Gegner
    {
        $gegner = new Gegner(4, 'Todesranke', 80, 5, 3, 2, 99);
        return $gegner;
    }

    public static function loadBandit() : Gegner
    {
        $gegner = new Gegner(5, 'Bandit', 50, 2, 1, 4, 55);
        return $gegner;
    }

    public static function loadHydra() : Gegner
    {
        $gegner = new Gegner(6, 'Hydra', 250, 10, 6, 8, 440);
        return $gegner;
    }

    public static function loadZyklop() : Gegner
    {
        $gegner = new Gegner(7, 'Zyklop', 123, 6, 2, 6, 155);
        return $gegner;
    }

    public static function loadAlteStatue() : Gegner
    {
        $gegner = new Gegner(8, 'Alte Statue', 120, 7, 5, 3, 95);
        return $gegner;
    }

    public static function loadWolkendrache() : Gegner
    {
        $gegner = new Gegner(9, 'Wolkendrache', 450, 30, 10, 30, 1400);
        return $gegner;
    }

    public static function loadKleinerFatzke() : Gegner
    {
        $gegner = new Gegner(10, 'Kleiner Fatzke', 33, 2, 0, 2, 22);
        return $gegner;
    }

    public static function loadBossRaegon() : Gegner
    {
        $gegner = new Gegner(11, 'Raegon', 800, 50, 30, 90, 5602);
        return $gegner;
    }

    public static function loadBossSvaetlin() : Gegner
    {
        $gegner = new Gegner(12, 'Svaetlin', 999, 55, 34, 99, 6632);
        return $gegner;
    }*/

    /*public static function loadRandomGegner() : Gegner
    {
        $rnd = random_int(1, 100);
        Db::echoPre($rnd);
        if ($rnd <= 9)
        {
            $gegner = self::loadAlteStatue();
        }
        elseif ($rnd >9 & $rnd <= 18)
        {
            $gegner = self::loadBandit();
        }
        elseif ($rnd >18 & $rnd <= 27)
        {
            $gegner = self::loadZuchtMeister();
        }
        elseif ($rnd >27 & $rnd <= 36)
        {
            $gegner = self::loadZyklop();

        }
        elseif ($rnd >36 & $rnd <= 45)
        {
            $gegner = self::loadDunkleSchwinge();
        }
        elseif ($rnd >45 &  $rnd <= 54)
        {
            $gegner = self::loadHydra();
        }
        elseif ($rnd >54 & $rnd <= 63)
        {
            $gegner = self::loadKleinerFatzke();
        }
        elseif ($rnd >63 & $rnd <= 72)
        {
            $gegner = self::loadTodesRanke();
        }
        elseif ($rnd >72 & $rnd <= 81)
        {
            $gegner = self::loadWaldNymph();
        }
        elseif ($rnd >81 & $rnd <= 90)
        {
            $gegner = self::loadWolkendrache();
        }
        elseif ($rnd >90 & $rnd <= 95)
        {
            $gegner = self::loadBossRaegon();
        }
        else
        {
            $gegner = self::loadBossSvaetlin();
        }
        return $gegner;
    }*/
    public function jsonSerialize()
    {
        return
            [
                'gname'  =>  $this->getGname(),
                'lebenspunkte'  =>  $this->getLebenspunkte(),
                'verteidung'  => $this->getVerteidigung(),
                'schadensreduktion'  => $this->getSchadensreduktion(),
                'angriffsbonus'  => $this->getAngriffsbonus(),
                'gegnerklasse'  => $this->getGegnerklasse(),
                'initiative'  => $this->getInitiative(),
                'tickzuschlag'  => $this->getTickzuschlag(),
                'wuerfelanzahlahl'  => $this->getWuerfelanzahl(),
                'wuerfelart'  => $this->getWuerfelart(),
                'schadensbonus'  => $this->getSchadensbonus()
            ];
    }
}