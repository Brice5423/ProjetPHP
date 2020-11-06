<?php
include ("database/connection.php");
$objPdo = connect();
session_start();
?>

<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" media="screen and (min-width:0px)" href="style/seConnecter.css">
    <link rel="icon" type="images/x-icon" href="images/Venti_tete.png" />
</head>

<body>
    <title>Se Connecter</title>
    <form method="post">
        <h2 align="center">Sign In</h2>

        <table align="center">
            <thead>
            <tr class="mail">
                <td>
                    <p>Mail</p>
                </td>
                <td>
                    <input type="text" size="30" name="mail">
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
                    <input type="submit" value="Sign In" name="creerCompte"/>
                </td>
            </tr>
            </tfoot>
        </table>
    </form>
</body>

</html>

<?php
if (isset($_POST['creerCompte'])){
    header("Location:creerCompte.php");
}
else if (isset($_POST['seConnecter'])){
    if ($_POST['mail'] != "" && $_POST['mdp'] != "") {
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];

        $select = $objPdo->query("select * from redacteur where adressemail = '$mail' and motdepasse = '$mdp'");
        if ($select->rowCount() > 0) {
            foreach ($select as $row) {
                $_SESSION['id'] = $row['idredacteur'];
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['prenom'] = $row['prenom'];
            }
            $_SESSION['mail'] = $mail;
            $_SESSION['mdp'] = $mdp;

            header("Location:accueil.php");
        } else {
            echo "<script>alert('Le mail n\'existe pas ');</script>";
        }
    }
}
?>