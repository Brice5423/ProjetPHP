<?php
include ("database/connection.php");
$objPdo = connect();
session_start();
?>

<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" media="screen and (min-width:0px)" href="style/creerCompte.css">
    <link rel="icon" type="images/x-icon" href="images/Venti_tete.png" />
</head>

<body>
    <title>Créer un Compte</title>
    <form method="post">
        <h2 align="center">Sign Up</h2>

        <table align="center">
            <thead>
            <tr class="nom">
                <td>
                    <p>Nom</p>
                </td>
                <td>
                    <input type="text" size="20" name="nom">
                </td>
            </tr>
            <tr class="prenom">
                <td>
                    <p>Prénom</p>
                </td>
                <td>
                    <input type="text" size="15" name="prenom">
                </td>
            </tr>
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
                <td align="center" colspan="3">
                    <input type="submit" value="Valider" name="creerCompte"/>
                    <input type="submit" value="Sign In" name="seConnecter"/>
                    <input type="submit" value="Retour" name="retour"/>
                </td>
            </tr>
            </tfoot>
        </table>
    </form>
</body>

</html>

<?php
if (isset($_POST['creerCompte'])){
    if ($_POST['nom'] != "" && $_POST['prenom'] != "" && $_POST['mail'] != "" && $_POST['mdp'] != ""){
        $nom = strtoupper($_POST['nom']);
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];

        $result = $objPdo->query("select * from redacteur where adressemail = '$mail'");
        if ($result->rowCount() > 0) {
            echo "<script>alert('Le mail existe déjà ');</script>";
        }else {
            $result = $objPdo->query("insert into redacteur(nom, prenom, adressemail, motdepasse) values ('$nom', '$prenom', '$mail', '$mdp')");
            foreach ($result as $row) {
                $_SESSION['id'] = $row['idredacteur'];
            }
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['mail'] = $mail;
            $_SESSION['mdp'] = $mdp;

            header("Location:accueil.php");
        }
    }
}

if (isset($_POST['seConnecter'])){
    header("Location:seConnecter.php");
}
if (isset($_POST['retour'])){
    header("Location:accueil.php");
}
?>