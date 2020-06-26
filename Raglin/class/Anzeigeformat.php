<?php


class Anzeigeformat
{
    private int     $wuerfelanz;
    private int     $wuerfelart;
    private int     $schadensbonus;


public static  function formatSchaden(int $wuerfelanz,int $wuerfelart,int $schadensbonus):string
{

    if($schadensbonus<0){
    $schadenanzeige= $wuerfelanz."W".$wuerfelart.$schadensbonus;
    }elseif ($schadensbonus==0){
        $schadenanzeige= $wuerfelanz."W".$wuerfelart;}else
    {
        $schadenanzeige= $wuerfelanz."W".$wuerfelart."+".$schadensbonus;

    }

    return $schadenanzeige;
}

    public static  function formatAttributAbkuerzung(string $abk,int $ausstrahlung, int $beweglichkeit, int $intuition, int $konstitution, int $mystik, int $staerke, int $verstand, int $willenskraft):int
    {switch ($abk) {
        case "AUS":
            $wert=$ausstrahlung;
            break;
        case "BEW":
            $wert=$beweglichkeit;
            break;
        case "INT":
            $wert=$intuition;
            break;
        case "KON":
            $wert=$konstitution;
            break;
        case "MYS":
            $wert=$mystik;
            break;
        case "STA":
            $wert=$staerke;
            break;
        case "VER":
            $wert=$verstand;
            break;
        case "WIL":
            $wert=$willenskraft;
            break;



                    }
    return $wert;
    }



}