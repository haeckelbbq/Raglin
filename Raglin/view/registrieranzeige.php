<?php include 'module/htmlbegin.php';?>



<h2>Wähle Namen und Zugangssicherung für deinen Platz in Raglin!</h2>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="insert">
    <input type="hidden" name="area" value="user">
    <table>
        <tbody>
        <tr>
            <td><label for="name">Username:</label></td>
            <td><input name="name" type="text" id="name"></td>
        </tr>
            <td><label for="password">Passwort: </label></td>
            <td><input name="password" type="password" id="password"></td>
        </tr>
            <td><label for="password">Passwort Wdh.: </label></td>
            <td><input name="password2" type="password" id="password2"></td>
        </tr>
            <td></td>
            <td><input type="submit" name="submitname" value="OK"></td>
        </tr>
        </tbody>
    </table>
</form>

<?php include 'module/htmlend.php';?>