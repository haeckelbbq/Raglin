<?php
include 'module/htmlbegin.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Hier anmelden</title>
</head>
<br>
<br>
<br>


<form action="index.php" method="post">
    <input type="hidden" name="action" value="checklogin">
    <input type="hidden" name="area" value="">

    <table>
        <tbody>
        <tr>
            <td>Username:</td>
            <td><input name="name" type="text""></td>
        </tr>
        <tr>
            <td>Passwort: </td>
            <td><input name="password" type="password""></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submitname" value="absenden"></td>
        </tr>
        </tbody>
    </table>
</form>


</body>
</html>


<?php
include 'module/htmlend.php';
?>
