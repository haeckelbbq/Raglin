
DROP DATABASE IF EXISTS raglin;
CREATE DATABASE raglin;
USE raglin;


CREATE TABLE `charakter` (
                             `cid`                  int PRIMARY KEY AUTO_INCREMENT NOT NULL,
                             `fk_user`              int(11) NOT NULL,
                             `fk_aktivewaffe`       int(11) NOT NULL,
                             `fk_aktiveruestung`    int(11) NOT NULL,
                             `fk_aktivesschild`     int(11) NOT NULL,
                             `cname`                varchar(20) NOT NULL,
                             `gold`                 int(11) NOT NULL,
                             `erfahrung`            int(11) NOT NULL,
                             `aktlebenspunkte`      int(11) NOT NULL,
                             `lebenspunktemax`      int(11) NOT NULL,
                             `ausstrahlung`         int(11) NOT NULL,
                             `beweglichkeit`        int(11) NOT NULL,
                             `intuition`            int(11) NOT NULL,
                             `konstitution`         int(11) NOT NULL,
                             `mystik`               int(11) NOT NULL,
                             `staerke`              int(11) NOT NULL,
                             `verstand`             int(11) NOT NULL,
                             `willenskraft`         int(11) NOT NULL,
                             `handgemengeskill`     int(11) NOT NULL,
                             `hiebwaffenskill`      int(11) NOT NULL,
                             `kettenwaffenskill`    int(11) NOT NULL,
                             `klingenwaffenskill`   int(11) NOT NULL,
                             `stangenwaffenskill`   int(11) NOT NULL,
                             `tick`                 int(11) NOT NULL,
                             `rasse`                varchar(20) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
CREATE TABLE `fertigkeitenbogen`(

                            `fk_cid`                    int(11) NOT NULL,
                            `akrobatik`                 int(11) NOT NULL,
                            `alchemie`                  int(11) NOT NULL,
                            `anfuehren`                 int(11) NOT NULL,
                            `arkanekunde`               int(11) NOT NULL,
                            `athletik`                  int(11) NOT NULL,
                            `darbietung`                int(11) NOT NULL,
                            `diplomatie`                int(11) NOT NULL,
                            `edelhandwerk`              int(11) NOT NULL,
                            `empathie`                  int(11) NOT NULL,
                            `entschlossenheit`          int(11) NOT NULL,
                            `fingerfertigkeit`          int(11) NOT NULL,
                            `geschichteundmythen`       int(11) NOT NULL,
                            `handwerk`                  int(11) NOT NULL,
                            `heilkunde`                 int(11) NOT NULL,
                            `heimlichkeit`              int(11) NOT NULL,
                            `jagdkunst`                 int(11) NOT NULL,
                            `laenderkunde`              int(11) NOT NULL,
                            `naturkunde`                int(11) NOT NULL,
                            `redegewandtheit`           int(11) NOT NULL,
                            `schloesserundfallen`       int(11) NOT NULL,
                            `schwimmen`                 int(11) NOT NULL,
                            `seefahrt`                  int(11) NOT NULL,
                            `strassenkunde`             int(11) NOT NULL,
                            `tierfuehrung`              int(11) NOT NULL,
                            `ueberleben`                int(11) NOT NULL,
                            `wahrnehmung`               int(11) NOT NULL,
                            `zaehigkeit`                int(11) NOT NULL


)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Tabellenstruktur für Tabelle `ruestung`
--

CREATE TABLE `ruestung` (
                            `rid`                   int PRIMARY KEY AUTO_INCREMENT NOT NULL,
                            `rname`                 varchar(15) NOT NULL,
                            `typ`                   varchar(50) NOT NULL,
                            `verteidigungsbonus`    int(11) NOT NULL,
                            `schadensreduktion`     int(11) NOT NULL,
                            `kosten`                int(11) NOT NULL,
                            `tickzuschlag`          int(11) NOT NULL,
                            `behinderung`           int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `gegner`
--

CREATE TABLE `gegner` (
                            `gid`                   int PRIMARY KEY AUTO_INCREMENT NOT NULL,
                            `gname`                 varchar(15) NOT NULL,
                            `lebenspunkte`          int(11) NOT NULL,
                            `verteidigung`          int(11) NOT NULL,
                            `schadensreduktion`     int(11) NOT NULL,
                            `angriffsbonus`         int(11) NOT NULL,
                            `gegnerklasse`          int(11) NOT NULL,
                            `tickzuschlag`          int(11) NOT NULL,
                            `initative`             int(11) NOT NULL,
                            `wuerfelanzahl`         int(11) NOT NULL,
                            `wuerfelart`            int(11) NOT NULL,
                            `schadensbonus`         int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Tabellenstruktur für Tabelle `schild`
--

CREATE TABLE `schild` (
                          `sid`                 int PRIMARY KEY AUTO_INCREMENT NOT NULL,
                          `sname`               varchar(15) NOT NULL,
                          `typ`                 varchar(50) NOT NULL,
                          `verteidigungsbonus`  int(11) NOT NULL,
                          `schadensreduktion`   int(11) NOT NULL,
                          `kosten`              int(11) NOT NULL,
                          `tickzuschlag`        int(11) NOT NULL,
                          `behinderung`         int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
                        `uid`                   int PRIMARY KEY AUTO_INCREMENT NOT NULL,
                        `name`                  varchar(15) NOT NULL,
                        `password`              varchar(25) NOT NULL,
                        `rolle`                 varchar(15) NOT NULL,
                        `fk_aktivercharakter`   INT(11) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `waffenliste`
--

CREATE TABLE `waffe` (
                               `wid`                    int PRIMARY KEY AUTO_INCREMENT NOT NULL,
                               `wname`                  varchar(25) NOT NULL,
                               `typ`                    varchar(50) NOT NULL,
                               `attri1`                 varchar(4) NOT NULL,
                               `attri2`                 varchar(4) NOT NULL,
                               `wuerfelanzahl`          int(11) NOT NULL,
                               `wuerfelart`             int(11) NOT NULL,
                               `schadensbonus`          int(11) NOT NULL,
                               `waffenart`              varchar(25) NOT NULL,
                               `kosten`                 int(11) NOT NULL,
                               `waffengeschwindigkeit`  int(11) NOT NULL


) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `charakter_gegenstand` (

                                `cgid`              int PRIMARY KEY AUTO_INCREMENT NOT NULL,
                                `fk_cid`            INT NOT NULL,
                                `Gegenstandstyp`    VARCHAR(45) NOT NULL,
                                `fk_gsid`           int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `gegenstand` (
                         `gegid`        int PRIMARY KEY AUTO_INCREMENT NOT NULL,
                         `gname`        varchar(25) NOT NULL,
                         `typ`          varchar(50) NOT NULL,
                         `kosten`       int(11) NOT NULL,
                         `einnehmbar`   int NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `quest` (
                         `qid`                   int PRIMARY KEY AUTO_INCREMENT NOT NULL,
                         `Frage`                 varchar(300) NOT NULL,
                         `Antwort1`              varchar(300) NOT NULL,
                         `Antwort2`              varchar(300) NOT NULL,
                         `Antwort3`              varchar(300) NOT NULL,
                         `Antwort4`              varchar(300) NOT NULL,
                         `A1bool`                int NOT NULL,
                         `A2bool`                int NOT NULL,
                         `A3bool`                int NOT NULL,
                         `A4bool`                int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `charakter`
--

COMMIT;

INSERT INTO gegner(gid,gname,lebenspunkte,verteidigung, schadensreduktion,angriffsbonus,gegnerklasse,initative,tickzuschlag,wuerfelanzahl,wuerfelart,schadensbonus)
VALUES (NULL, 'Wolf', 18 , 20, 0,12,1,5,8,1, 6,4);

INSERT INTO gegner(gid,gname,lebenspunkte,verteidigung, schadensreduktion,angriffsbonus,gegnerklasse,initative,tickzuschlag,wuerfelanzahl,wuerfelart,schadensbonus)
VALUES (NULL, 'Wildschwein', 21 , 18, 0,12,1,7,8,1, 6, 4);


INSERT INTO charakter(cid, fk_user, fk_aktivewaffe, fk_aktiveruestung, fk_aktivesschild,
                      cname, gold, erfahrung, aktlebenspunkte,lebenspunktemax, ausstrahlung, beweglichkeit,
                      intuition, konstitution,mystik, staerke, verstand ,willenskraft,
                      handgemengeskill,hiebwaffenskill,kettenwaffenskill,klingenwaffenskill,stangenwaffenskill,tick, rasse)
VALUES (NULL , 1 , 1 , 1, 1,  'testchar' ,0 ,30 , 32 , 32 , 2 , 1 , 1, 2,0,0,0,0,0,0,0,0,0,0,'Mensch');
INSERT INTO charakter(cid, fk_user, fk_aktivewaffe, fk_aktiveruestung, fk_aktivesschild,
                      cname, gold, erfahrung, aktlebenspunkte,lebenspunktemax, ausstrahlung, beweglichkeit,
                      intuition, konstitution,mystik, staerke, verstand ,willenskraft,
                      handgemengeskill,hiebwaffenskill,kettenwaffenskill,klingenwaffenskill,stangenwaffenskill,tick, rasse)
VALUES (NULL , 6 , 2 , 2, 2,  'Masterius' ,5000 ,30 , 32 , 32 , 2 , 1 , 1, 2,0,3,0,0,0,10,0,0,0,0,'Mensch');




INSERT INTO ruestung(rid,rname, typ, verteidigungsbonus,schadensreduktion, kosten,tickzuschlag,behinderung)
VALUES (NULL, 'keine Rüstung', 'Ruestung' ,0 , 0, 0,0,0);

INSERT INTO ruestung(rid,rname, typ, verteidigungsbonus,schadensreduktion, kosten,tickzuschlag,behinderung)
VALUES (NULL, 'Tuchruestung','Ruestung' , 1 , 0, 6,0,0);

INSERT INTO ruestung(rid,rname, typ, verteidigungsbonus,schadensreduktion, kosten,tickzuschlag,behinderung)
VALUES (NULL, 'Leder,leicht','Ruestung' , 1 , 1,9, 0,1);

INSERT INTO ruestung(rid,rname, typ, verteidigungsbonus,schadensreduktion, kosten,tickzuschlag,behinderung)
VALUES (NULL, 'Leder,mittel','Ruestung' , 2 , 1,10, 0,2);

INSERT INTO ruestung(rid,rname, typ, verteidigungsbonus,schadensreduktion, kosten,tickzuschlag,behinderung)
VALUES (NULL, 'Leder,schwer','Ruestung' , 3 , 0, 11 , 1,0);


INSERT INTO ruestung(rid,rname, typ, verteidigungsbonus,schadensreduktion, kosten,tickzuschlag,behinderung)
VALUES (NULL, 'Kette, schwer','Ruestung' , 3 , 2, 15,2,3);

INSERT INTO schild(sid, sname, typ,verteidigungsbonus,schadensreduktion, kosten,tickzuschlag,behinderung)
VALUES (NULL, 'kein Schild','Schild' , 0, 0, 0,0,0);

INSERT INTO schild(sid, sname,typ,verteidigungsbonus,schadensreduktion, kosten,tickzuschlag,behinderung)
VALUES (NULL, 'Großschild','Schild' , 2, 0, 7,1,2);

INSERT INTO waffe(wid, wname, typ, attri1,attri2,wuerfelanzahl,wuerfelart,schadensbonus, waffenart, kosten,waffengeschwindigkeit)
VALUES (NULL, 'Waffenlos' ,'Waffe' , 'BEW' , 'STA' , 1 , 6 , 0,'Handgemenge',0,5);

INSERT INTO waffe(wid, wname, typ, attri1,attri2,wuerfelanzahl,wuerfelart,schadensbonus, waffenart, kosten,waffengeschwindigkeit)
VALUES (NULL, 'Langschwert' ,'Waffe' , 'BEW' , 'STA' , 1 , 6 , 4,'Klingenwaffen',10,8);

INSERT INTO waffe(wid, wname, typ, attri1,attri2,wuerfelanzahl,wuerfelart,schadensbonus, waffenart, kosten,waffengeschwindigkeit)
VALUES (NULL, 'Streitaxt', 'Waffe' , 'KON' , 'STA' , 2 , 6 , 3, 'Hiebwaffen',16,11);

INSERT INTO waffe(wid, wname, typ, attri1,attri2,wuerfelanzahl,wuerfelart,schadensbonus, waffenart, kosten,waffengeschwindigkeit)
VALUES (NULL, 'Peitsche' ,'Waffe' , 'BEW' , 'INT' , 1 , 10 , -2, 'Klingenwaffen',1,15);

INSERT INTO gegenstand(gegid, gname, typ, kosten, einnehmbar)
VALUES (NULL, 'Heiltrank','Gegenstand' , 8, 1);


INSERT INTO fertigkeitenbogen(fk_cid,akrobatik,alchemie , anfuehren ,arkanekunde ,  athletik , darbietung ,  diplomatie,
                            edelhandwerk, empathie, entschlossenheit,fingerfertigkeit, geschichteundmythen, handwerk,
                            heilkunde,heimlichkeit, jagdkunst,laenderkunde,naturkunde,redegewandtheit, schloesserundfallen,
                            schwimmen,seefahrt, strassenkunde,tierfuehrung,ueberleben,wahrnehmung,zaehigkeit)
                            VALUES (1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

INSERT INTO fertigkeitenbogen(fk_cid,akrobatik,alchemie , anfuehren ,arkanekunde ,  athletik , darbietung ,  diplomatie,
                              edelhandwerk, empathie, entschlossenheit,fingerfertigkeit, geschichteundmythen, handwerk,
                              heilkunde,heimlichkeit, jagdkunst,laenderkunde,naturkunde,redegewandtheit, schloesserundfallen,
                              schwimmen,seefahrt, strassenkunde,tierfuehrung,ueberleben,wahrnehmung,zaehigkeit)
                                VALUES (2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);


INSERT INTO charakter_gegenstand(cgid, fk_cid, Gegenstandstyp, fk_gsid)
VALUES (NULL, 2, "Waffe", 2);
INSERT INTO charakter_gegenstand(cgid, fk_cid, Gegenstandstyp, fk_gsid)
VALUES (NULL, 2, "Gegenstand", 1);
INSERT INTO charakter_gegenstand(cgid, fk_cid, Gegenstandstyp, fk_gsid)
VALUES (NULL, 2, "Gegenstand", 1);
INSERT INTO charakter_gegenstand(cgid, fk_cid, Gegenstandstyp, fk_gsid)
VALUES (NULL, 2, "Schild", 2);
INSERT INTO charakter_gegenstand(cgid, fk_cid, Gegenstandstyp, fk_gsid)
VALUES (NULL, 2, "Waffe", 3);

INSERT INTO charakter_gegenstand(cgid, fk_cid, Gegenstandstyp, fk_gsid)
VALUES (NULL, 2, "Waffe", 2);
INSERT INTO charakter_gegenstand(cgid, fk_cid, Gegenstandstyp, fk_gsid)
VALUES (NULL, 2, "Gegenstand", 1);
INSERT INTO charakter_gegenstand(cgid, fk_cid, Gegenstandstyp, fk_gsid)
VALUES (NULL, 2, "Gegenstand", 1);
INSERT INTO charakter_gegenstand(cgid, fk_cid, Gegenstandstyp, fk_gsid)
VALUES (NULL, 2, "Schild", 2);
INSERT INTO charakter_gegenstand(cgid, fk_cid, Gegenstandstyp, fk_gsid)
VALUES (NULL, 2, "Ruestung", 2);
INSERT INTO charakter_gegenstand(cgid, fk_cid, Gegenstandstyp, fk_gsid)
VALUES (NULL, 2, "Waffe", 3);

INSERT INTO user
    (uid, name, password, rolle, fk_aktivercharakter) VALUES (NULL, 'teilnehmer', 'teilnehmer', 'regUser',0);
INSERT INTO user
    (uid, name, password, rolle, fk_aktivercharakter) VALUES (NULL, 'teilnehmer2', 'teilnehmer2', 'regUser',0);
INSERT INTO user
    (uid, name, password, rolle, fk_aktivercharakter) VALUES (NULL, 'ragnar', 'ragnar', 'regUser',0);
INSERT INTO user
    (uid, name, password, rolle, fk_aktivercharakter) VALUES (NULL, 'cisco', 'cisco', 'admin',0);
INSERT INTO user
    (uid, name, password, rolle, fk_aktivercharakter) VALUES (NULL, 'merlin', 'merlin', 'admin',0);
INSERT INTO user
    (uid, name, password, rolle, fk_aktivercharakter) VALUES (NULL, 'a', 'a', 'regUser',2);


INSERT INTO quest (qid, Frage, Antwort1, Antwort2, Antwort3, Antwort4, A1bool, A2bool, A3bool, A4bool)
VALUES (NULL, 'Bist du ein angenehmer Zeitgeselle?', 'Aber ja!', 'Eher nicht so', 'Auf keinen Fall!', 'Rede mit meiner Hand!', 0, 0, 0, 1);
FLUSH PRIVILEGES;
