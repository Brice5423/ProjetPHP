<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" media="screen and (min-width:0px)" href="style/seConnecter.css">
</head>

<body>
    <header>
        <title>Se Connecter</title>
        <from method="post" action = "seConnecter.php">
            <h2 align="center">Log In</h2>

            <table align="center">
                <thead>
                <tr class="mail">
                    <td>
                        <p>Mail</p>
                    </td>
                    <td>
                        <input type="text" size="40" name="mail">
                    </td>
                </tr>
                <tr class="mdp">
                    <td>
                        <p>Mot de passe</p>
                    </td>
                    <td>
                        <input type="password" size="25" name="mdp">
                    </td>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td id="1" align="center" colspan="2">
                        <input type="submit" value="Log In" name="seConnecter">
                        <a href="creerCompte.php">Sign In</a>
                    </td>
                </tr>
                </tfoot>
            </table>

        </from>
    </header>
</body>

</html>