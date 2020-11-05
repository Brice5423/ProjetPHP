<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <title>Happy News</title>
    <link rel="stylesheet" type="text/css" media="screen and (min-width:0px)" href="style/accueil.css">
</head>
<body>
<from method="post" action = "accueil.php">
    <header>
        <title>Happy News</title>
        <h1 class="titre_site">HAPPY NEWS</h1>
        <div class="menu">
            <a href="">
                <article class="left">
                    NEWS
                </article>
            </a>
        </div>
        <div class="menu">
            <a href="">
                <article class="middle">
                    NEWS
                </article>
            </a>
        </div>
        <div class="menu">
            <a href="">
                <article class="right">
                    NEWS
                </article>
            </a>
        </div>
        <nav class="inscrit">
            <ul>
                <li class="inscrit">
                    <a href="creerCompte.php">Sign In</a>
                </li>
                <li class="connect">
                    <a href="seConnecter.php">Log In</a>
                </li>
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
</from>

</body>
</html>