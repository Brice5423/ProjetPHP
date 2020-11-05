<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" media="screen and (min-width:0px)" href="style/creerCompte.css">
</head>

<body>
    <header>
        <from method="post" action = "creerCompte.php">
            <h2 align="center">Sign In</h2>

            <table align="center">
                <thead>
                <tr class="nom">
                    <td>
                        <p>Nom</p>
                    </td>
                    <td>
                        <input type="text" size="30" name="nom">
                    </td>
                </tr>
                <tr class="prenom">
                    <td>
                        <p>Prénom</p>
                    </td>
                    <td>
                        <input type="text" size="20" name="prenom">
                    </td>
                </tr>
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
                        <input type="button" value="Sign In" name="creerCompte">
                        <input type="button" value="Log In" name="seConnecter">
                    </td>
                </tr>
                </tfoot>
            </table>

        </from>
    </header>
</body>

</html>

<?php
if (isset($_POST["seConnecter"])){
    header("Location:seConnecter.php");
}
?>