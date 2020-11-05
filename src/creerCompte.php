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
                        <input type="submit" value="Sign In" name="creerCompte"/>
                        <input type="submit" value="Log In" name="seConnecter"/>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
</body>

<?php

if (isset($_POST['creerCompte'])){
   if ($_POST['nom'] != "" && $_POST['prenom'] != "" && $_POST['mail'] != "" && $_POST['mdp'] != ""){
       $nom = strtoupper($_POST['nom']);
       $prenom = $_POST['prenom'];
       $mail = $_POST['mail'];
       $mdp = $_POST['mdp'];

       $result = $objPdo->query("insert into redacteur(nom, prenom, adressemail, motdepasse) values ('$nom', '$prenom', '$mail', '$mdp')");
       $result = $objPdo->query("select * from redacteur where adressemail = '$mail' and motdepasse = '$mdp'");
       foreach ($result as $row ) {
           $_SESSION['id'] = $row['idredacteur'];
       }
       $_SESSION['nom'] = $nom;
       $_SESSION['prenom'] = $prenom;
       $_SESSION['mail'] = $mail;
       $_SESSION['mdp'] = $mdp;

       header("Location:accueil.php");
   }
}

if (isset($_POST['seConnecter'])){
    header("Location:seConnecter.php");
}
?>

</html>