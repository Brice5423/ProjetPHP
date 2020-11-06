<?php
include ("database/connection.php");
$objPdo = connect();
session_start();
?>

<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" media="screen and (min-width:0px)" href="style/news.css">
    <link rel="icon" type="images/x-icon" href="images/Venti_tete.png" />
</head>

<body>
    <title>Créer sa News</title>
    <form method="post">
        <h2 align="center">Création d'une News</h2>

        <table align="center">
            <thead>
            <tr class="nom">
                <td>
                    <p>Nom</p>
                </td>
                <td>
                    <input type="text" size="30" name="nomNews">
                </td>
            </tr>
            <tr class="theme">
                <td>
                    <p>Thème</p>
                </td>
                <td>
                    <select name="theme"><option>fjf</option></select>
                </td>
            </tr>
            <tr class="contenu">
                <td>
                    <p>Contenu</p>
                </td>
                <td>
                    <textarea name="contenu"></textarea>
                </td>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td id="1" align="center" colspan="2">
                    <input type="submit" value="Valider" name="valider"/>
                    <input type="submit" value="Annuler" name="annuler"/>
                </td>
            </tr>
            </tfoot>
        </table>
    </form>
</body>

<?php
if (isset($_POST['valider'])){
    if ($_POST['nomNews'] != "" && $_POST['theme'] != "" && $_POST['contenu'] != ""){
        $nomNews = strtoupper($_POST['nomNews']);
        $theme = $_POST['theme'];
        $contenu = $_POST['contenu'];


        $result = $objPdo->query("insert into theme(idtheme, description) values ('$nomNews', '$theme', '$contenu')");
        $result = $objPdo->query("select * from theme");
        foreach ($result as $row ) {
            $_SESSION['idtheme'] = $row['description'];
        }
        $_SESSION['nomNews'] = $nomNews;
        $_SESSION['prenom'] = $theme;
        $_SESSION['mail'] = $contenu;

        header("Location:accueil.php");
    }
}

if (isset($_POST['annuler'])){
    header("Location:accueil.php");
}
?>

</html>
