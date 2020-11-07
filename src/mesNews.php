<?php
include ("database/connection.php");
$objPdo = connect();
session_start();
$objPdo->query('SET NAMES utf8');
?>

<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <title>Les Nouvelles du JGolo</title>
    <link rel="stylesheet" type="text/css" media="screen and (min-width:0px)" href="style/accueil.css">
    <link rel="icon" type="images/x-icon" href="images/Venti_tete.png" />
</head>

<body>
    <form method="post" action = "mesNews.php">
        <header>
            <h1 class="titre_site">MES NOUVELLES DU JGOLO</h1>
            <nav class="inscrit">
                <ul>
                    <?php
                    if (isset($_SESSION['mail']) && isset($_SESSION['mdp'])){
                        echo "<img class=\"Venti\" src=\"images/Venti_entier_2.png\" alt=\"\" width=\"120\" height=\"195\"/>
                                <div class=\"menu\">
                                    <a href=\"news.php\">
                                        <article class=\"left\">
                                            CREER NOUVELLES
                                        </article>
                                    </a>
                                </div>
                                <div class=\"menu2\">
                                    <a href=\"accueil.php\">
                                        <article class=\"middle\">
                                             ACCUEIL
                                        </article>
                                    </a>
                                </div>
                                <li class=\"inscrit\">
                                    <a href=\"javascript:void(0);\" onclick='seDeco();'>Sign out</a>
                                    <script type='text/javascript' src='popup.js'></script>
                                </li>";
                        echo "<li class=\"connect\">
                                <a>".$_SESSION['prenom'] . " " . $_SESSION['nom']."</a>
                                </li>";
                    }
                    else {
                        echo "<img class=\"Venti2\" src=\"images/Venti_entier_2.png\" alt=\"\" width=\"90\" height=\"158\"/>
                                  <li class=\"inscrit\">
                                    <a href=\"creerCompte.php\">Sign Up</a>
                                  </li>
                                  <li class=\"connect\">
                                     <a href=\"seConnecter.php\">Sign In</a>
                                  </li>";
                    }
                    ?>
                </ul>
            </nav>
        </header>

        <table align="center">
            <tr>
                <td class="btnTri" align="center" colspan="2">
                    <input type="submit" value="THEME" name="triTheme"/>
                </td>
                <td class="btnTri" align="center" colspan="2">
                    <input type="submit" value="DATE" name="triDate"/>
                </td>
            </tr>
        </table>


            <table class="news" align="center">
                <?php
                function generationLigne($row) {
                    echo "<form method = \"post\" action = \"mesNews.php\">";
                    $_POST['idNews'] = $row['idnews'];
                    echo "<tr>
                            <td  class=\"gauche\">
                                <!--titre / Auteur / Date poste-->
                                <h3>".$row["titrenews"]."</h3> (".$row["description"].") <br/>
                                <h6>".$row["datenews"]."</h6>
                            </td>
                            <td  class=\"contenu\">
                                <!--Contenu-->
                                <p>".$row["textenews"]."</p>
                            </td>
                        </tr>";

                    echo "<table align=\"center\">
                            <tr>
                                <td class=\"btnTri\" align=\"center\" colspan=\"2\">
                                    <input type=\"submit\" value=\"MODIFI\" name=\"modifNews\"/>
                                </td>
                                <td class=\"btnTri\" align=\"center\" colspan=\"2\">
                                    <input type=\"submit\" value=\"SUP\" name=\"supNews\"/>
                                </td>
                            </tr>
                        </table>";
                    echo "</form>";
                }

                $mail = $_SESSION['mail'];
                $mdp = $_SESSION['mdp'];

                if (isset($_POST['triDate'])) {
                    $result = $objPdo->query("select * from news n, redacteur r, theme t where n.idtheme = t.idtheme and n.idredacteur = r.idredacteur and adressemail = '$mail' and motdepasse = '$mdp' order by n.datenews DESC");
                    foreach ($result as $row) {
                        generationLigne($row);
                    }
                }
                else if (isset($_POST['triTheme'])) {
                    $result = $objPdo->query("select * from news n, redacteur r, theme t where n.idtheme = t.idtheme and n.idredacteur = r.idredacteur and adressemail = '$mail' and motdepasse = '$mdp' order by t.description ASC, n.datenews DESC");
                    foreach ($result as $row) {
                        generationLigne($row);
                    }
                }
                else {
                    $result = $objPdo->query("select * from news n, redacteur r, theme t where n.idtheme = t.idtheme and n.idredacteur = r.idredacteur and adressemail = '$mail' and motdepasse = '$mdp' order by n.datenews DESC");
                    foreach ($result as $row) {
                        generationLigne($row);
                    }
                }

                if (isset($_POST['modifNews'])) {

                }
                else if (isset($_POST['supNews'])) {
                    $idNews = $_POST['idNews'];
                    $objPdo->query("delete from news where idnews = '$idNews'");
                }
                ?>
            </table>
    </form>

    <footer class="foot">
        <p>Copyright 2020 COLLIGNON Nicolas / ORLIANGE Brice - Tous droits réservés</p>
    </footer>
</body>

</html>
