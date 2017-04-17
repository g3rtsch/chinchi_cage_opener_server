<?php
 /*
  * Daten:
  * - Username: Der Benutzername
  * - Email: Die Emailadresse
  */
?><form action="index.php?section=profile" method="post">
    <fieldset>
        <legend>Profil bearbeiten</legend>
        <label>Benutzername: <input type="text" name="Username" value="<?php echo htmlspecialchars($data['Username']); ?>" /></label>
        <label>Email: <input type="text" name="Email" value="<?php echo htmlspecialchars($data['Email']); ?>" /></label>
        <input type="submit" name="formaction" value="Profil speichern" />
    </fieldset>
</form>
<form action="index.php?section=profile" method="post">
    <fieldset>
        <legend>Password ändern</legend>
        <label>Altes Password: <input type="password" name="Old" /></label>
        <label>Neues Password: <input type="password" name="Password[]" /></label>
        <label>Bestätigen: <input type="password" name="Password[]" /></label>
        <input type="submit" name="formaction" value="Password ändern" />
    </fieldset>
</form>