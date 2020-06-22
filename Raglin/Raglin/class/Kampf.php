<?php


class Kampf
{
    public static function getSchaden( $wurfelanzahl, $wuerfelart, $schadensbonus):int
    {
        $wuerfelsumme=0;
        for($i=0;$i<$wurfelanzahl;$i++){

            $wuerfelsumme +=  $rnd = random_int(1, $wuerfelart);
        }
        return $wuerfelsumme+$schadensbonus;
    }

    public static function getWuerfelwurf():array
    {
        $wuerfelergebnis1=random_int(1, 10);
        $wuerfelergebnis2=random_int(1, 10);

     return $wuerfelergebnis=[($wuerfelergebnis1+$wuerfelergebnis2),$wuerfelergebnis1,$wuerfelergebnis2];
    }
}