<?php

class User
{
    private int $uid;
    private string $name;
    private string $password;
    private string $rolle;
    private int $fk_aktivercharakter;


    public function __construct(int $uid, string $name, string $password, string $rolle, int $fk_aktivercharakter)
    {
        $this->uid = $uid;
        $this->name = $name;
        $this->password = $password;
        $this->rolle = $rolle;
        $this->fk_aktivercharakter=$fk_aktivercharakter;
    }

    public function getFkAktivercharakter(): int
    {
        return $this->fk_aktivercharakter;
    }

    public function getRolle(): string
    {
        return $this->rolle;
    }

    public function getUid(): int
    {
        return $this->uid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public static function getDataFromDatabase(): array  // gibt ein Array mit allen Userobjekten der Datenbank zurück
    {
        try
        {

            $dbh = Db::getConnection();
            $sql = 'SELECT * FROM user';
            $sth = $dbh->prepare($sql);
            $sth->execute();
            $benutzers = $sth->fetchAll(PDO::FETCH_FUNC, 'User::buildFromPDO');
        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $benutzers;
    }

    public static function getById(int $uid) : User  // liest den User anhand der ID aus
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM user WHERE uid = :uid ';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('uid', $uid, PDO::PARAM_INT);
            $sth->execute();
            $benutzer = $sth->fetchAll(PDO::FETCH_FUNC, 'User::buildFromPDO');

        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $benutzer[0];
    }

    public static function loginUser(string $name, string $password) : bool  // gibt true zurück wenn es User mit entsprechenden Passwort in der Datenbank gibt
    {

        try
        {
            $dbh = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE name = :name AND password = :password ';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('name', $name, PDO::PARAM_STR);
            $sth->bindParam('password', $password, PDO::PARAM_STR);
            $sth->execute();
            $benutzers = $sth->fetchAll(PDO::FETCH_FUNC, 'User::buildFromPDO');

        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        if( count($benutzers)==1)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public static function getFkAktuellerCharakterFromUser($uid) :int  // Fragt nach der ID des aktuell ausgewählen Charakters beim User
    {

        try
        {
            $dbh = Db::getConnection();
            $sql = 'SELECT fk_aktivercharakter FROM user WHERE uid = :uid';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('uid', $uid, PDO::PARAM_INT);
            $sth->execute();
            $fk_aktivercharakter = $sth->fetchAll(PDO::FETCH_COLUMN);
        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }

        return $fk_aktivercharakter[0];

    }

    private static function insertNewUser( string $name, string $password)  // Trägt User in die Datenbank ein
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'INSERT INTO user(uid, name, password, rolle, fk_aktivercharakter)
                        VALUES(NULL, :name, :password, "regUser", 0)';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('name', $name, PDO::PARAM_STR);
            $sth->bindParam('password', $password, PDO::PARAM_STR);

            $sth->execute();

        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }

    public static function updateAktiverCharakter(int $uid, int $charakterid)  // setzt den aktiven Charakter des Users
    {
        try
        {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'UPDATE user 
                    SET fk_aktivercharakter= :charakterid
                    WHERE uid = :uid';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('uid', $uid, PDO::PARAM_INT);
            $sth->bindParam('charakterid', $charakterid, PDO::PARAM_INT);

            $sth->execute();

        }
        catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }

    public static function buildNewUser( string $name, string $password)
    {
        User::insertNewUser($name, $password);
     }

    public static function deleteUser(int $uid) : void  // löscht User anhand seiner ID
    {
        try {
            $dbh = Db::getConnection();

            $sql = 'DELETE FROM user WHERE uid = :uid ';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('uid', $uid, PDO::PARAM_INT);
            $sth->execute();


        } catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        //return $benutzers;
    }

    public static function doesNameExist($name) : bool  //überprüft on schon ein User dieses Namens angelegt wurde
    {
        try {
            $dbh = Db::getConnection();
            //DB abfragen
            $sql = 'SELECT * FROM user WHERE name = :name ';
            $sth = $dbh->prepare($sql);
            $sth->bindParam('name', $name, PDO::PARAM_STR);
            $sth->execute();
            $namen = $sth->fetchAll(PDO::FETCH_COLUMN);
        } catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        if( count($namen)==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function getIdByNamePassword(string $name, string $password) : int // Holt sich die ID des Users nach Eingabe von Namen und Passwort ab
    {
        try {

            $dbh = Db::getConnection();


            $sql = 'SELECT uid FROM user WHERE name =:name AND password = :password';
            $sth = $dbh->prepare($sql); //$sh für PDOStatement (prepared Statement)
            $sth->bindParam('name', $name, PDO::PARAM_STR);
            $sth->bindParam('password', $password, PDO::PARAM_STR);
            $sth->execute();
            $uids = $sth->fetchAll(PDO::FETCH_COLUMN);

        } catch (PDOException $e)
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
        //if(count($ids)==1) {print_r($ids);}
        return $uids[0];
    }

    public static function buildFromPDO(int $uid, string $name, string $password, string $rolle, int $fk_aktivercharakter) : User  // buildFromPDO ruft den Klassenkonstuktor bei der Datenbankabfrage auf und erzeugt pro Tupel ein eigenes Objekt
    {
        $user = new User($uid, $name,$password, $rolle, $fk_aktivercharakter);
        return $user;
    }


}