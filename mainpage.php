<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial_scale=1.0"/>
        <title>Politic'Eye</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
        <style><?php include("mainpage.css") ?></style>
    </head>

    <body>
        
        <?php include("header.html"); ?>

        <section id="main_content">
            <div class="container">
                <h1 id="welcome">Bienvenue sur Politic'Eye</h1>
                <p class="slogan">Analysez et explorez la politique en un clic</p>
                <div class="search-box">
                    <input type="text" placeholder="Rechercher un sujet politique...">
                    <button>Rechercher</button>
                </div>
            </div>

            <!-- Rewrite in english + replace search by list access button -->

            <div class="white-section">
                <h2>À propos de Politic'Eye</h2>
                <p class="p1">Politic'Eye est une plateforme dédiée à l'analyse et à la compréhension des enjeux politiques contemporains. Grâce à notre technologie avancée, nous vous offrons des analyses approfondies et des perspectives uniques sur les sujets qui façonnent notre monde.</p>
                <p class="p2">Notre mission est de rendre l'information politique accessible et compréhensible pour tous. Que vous soyez un étudiant, un professionnel ou simplement curieux de la politique, Politic'Eye est là pour vous aider à naviguer dans le paysage complexe de l'actualité politique.</p>
                <p class="p3">Nous croyons en l'importance de l'éducation politique et de la transparence. C'est pourquoi nous nous engageons à fournir des analyses impartiales et basées sur des données fiables.</p>
                <p class="p4">Rejoignez-nous dans notre mission d'éclairer le débat public et de promouvoir une citoyenneté informée.</p>
            </div>

            <!-- Add featured section where there are some reports pinned here following recent news, manual admin choice -->

            <a href="fiche.php?Person=Hazebrouck">Fiche de Laurent Hazebrouck</a>
        </section>

        <?php include("footer.html"); ?>

    </body>
</html>