aktivwerdenanzeige.php

<?php
include 'module/htmlbegin.php';
if ($cid !==0)
{
    echo '<a href="index.php?action=anzeige&area=kampf"><button>Kampf eröffnen</button></a>';
    echo '<a href="index.php?action=anzeige&area=quest"><button>Quest starten</button></a>';
}
else
{
    ?>
    <br>
    Du hast keinen aktiven Charakter ausgewählt.<br>
    Erstelle und/oder wähle einen aus um mit ihm aktiv werden zu können.<br>
    Hier geht es zum
    <a href="index.php?action=anzeige&area=charakterbogen"><button>Charakterbogen</button></a>';
<?php
}


include 'module/htmlend.php';

