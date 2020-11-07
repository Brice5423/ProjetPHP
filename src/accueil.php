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
    <form method="post" action = "accueil.php">
        <header>
            <h1 class="titre_site">LES NOUVELLES DU JGOLO</h1>
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
                                <a href=\"mesNews.php\">
                                    <article class=\"middle\">
                                         MES NOUVELLES
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
        <section id="slideshow">
            <div class="container">
                <div class="c_slider"></div>
                <div class="slider">
                    <figure>
                        <img src="images/shingeki-no-kyojin-temporada-4-min.jpg" alt="" width="640" height="310" />
                        <figcaption>La nouvelle Saison de Shingeki No Kiojin arrive le 4 Décembre</figcaption>
                    </figure><!--
                --><figure>
                        <img src="images/geforce-rtx-3080-design-exploded-001.jpg" alt="" width="640" height="310" />
                        <figcaption>La nouvelle RTX 3080 est sortie le 17 Septembre</figcaption>
                    </figure><!--
                --><figure>
                        <img src="images/raw-accept.jpg" alt="" width="640" height="310" />
                        <figcaption>Call Of Duty: Cold War sortira le 13 Novembre 2020</figcaption>
                    </figure><!--
                --><figure>
                        <img src="images/Genshin_SOP_-Cover_EN-1280.jpg" alt="" width="640" height="310" />
                        <figcaption>Genshin Impact est sorti sur PC et les Consoles</figcaption>
                    </figure>
                </div>
            </div>
            <span id="timeline"></span>
        </section>
        <ul class="dots_commands">
            <li><a title="Afficher la slide 1" href="#sl_i1">Slide 1</a></li>
            <li><a title="Afficher la slide 2" href="#sl_i2">Slide 2</a></li>
            <li><a title="Afficher la slide 3" href="#sl_i3">Slide 3</a></li>
            <li><a title="Afficher la slide 4" href="#sl_i4">Slide 4</a></li>
        </ul>

        <table align="center">
            <tr>
                <td class="btnTri" align="center" colspan="2">
                    <input type="submit" value="THEME" name="triTheme"/>
                </td>
                <td class="btnTri" align="center" colspan="2">
                    <input type="submit" value="THEME ET DATE" name="triThemeEtDate"/>
                </td>
                <td class="btnTri" align="center" colspan="2">
                    <input type="submit" value="DATE" name="triDate"/>
                </td>
            </tr>
        </table>


        <table class="news" align="center">
            <?php
            function generationLigne($row) {
                echo "<tr>
                        <td class=\"gauche\">
                            <!--titre / Auteur / Date poste-->
                            <h3>".$row["titrenews"]."</h3> (".$row["description"].") <br/>
                            <p>".$row["nom"]. " " .$row["prenom"]."</p>
                            <p>".$row["datenews"]."</p>
                        </td>
                        <td class=\"contenu\">
                            <!--Contenu-->
                            <p>".$row["textenews"]."</p>
                        </td>
                    </tr>";
            }

            if (isset($_POST['triDate'])) {
                $result = $objPdo->query("select * from news n, redacteur r, theme t where n.idtheme = t.idtheme and n.idredacteur = r.idredacteur order by n.datenews DESC");
                foreach ($result as $row) {
                    generationLigne($row);
                }
            }
            else if (isset($_POST['triThemeEtDate'])) {
                $result = $objPdo->query("select * from news n, redacteur r, theme t where n.idtheme = t.idtheme and n.idredacteur = r.idredacteur order by t.description ASC, n.datenews DESC");
                foreach ($result as $row) {
                    generationLigne($row);
                }
            }
            else if (isset($_POST['triTheme'])) {
                $result = $objPdo->query("select * from news n, redacteur r, theme t where n.idtheme = t.idtheme and n.idredacteur = r.idredacteur order by t.description ASC");
                foreach ($result as $row) {
                    generationLigne($row);
                }
            }
            else {
                $result = $objPdo->query("select * from news n, redacteur r, theme t where n.idtheme = t.idtheme and n.idredacteur = r.idredacteur order by n.datenews DESC");
                foreach ($result as $row) {
                    generationLigne($row);
                }
            }
            ?>
        </table>
    </form>

    <footer>
        <p>Copyright 2020 COLLIGNON Nicolas / ORLIANGE Brice - Tous droits réservés</p>
    </footer>
</body>

</html>
