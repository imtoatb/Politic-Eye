<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial_scale=1.0"/>
        <title>Politic'Eye</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
        <style><?php include("mainpage.css") ?></style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>

    <body>
        
        <?php include("header.html"); ?>

        <section id="main_content">
            <div class="container">
                <h1 id="welcome">Welcome to Politic'Eye</h1>
                <p class="slogan">Analyze and explore politics in a few clics</p>
                <div class="search-box">
                    <input type="text" id="searchbox" placeholder="Look for something...">
                    <button id="trigger">Search</button>
                </div>
            </div>

            <!-- Rewrite in english + add onclick event on search button to realize ajax search request, getting from a backend script the name in a link of the concerned politican if successful -->

            <div class="white-section">
                <h2>À propos</h2>
                <p class="p1">Politic'eye is a platform dedicated to the analysis and understanding of modern politic's stakes. Thanks to our data, we can provide insights into the hallways of power, and help your future decision making for your country.</p>
                <p class="p2">Our goal is to make political information accessible and digestible for all. Whether you are a student, a professionnal, or someone uninterested in the domain, this project is a lighthouse to shine light on current actions and the past's archives.</p>
                <p class="p3">We believe in the power of political education, and the importance of transparency in public debates. We therefore uphold qualitative standards to provide impartial analysis, reliable data and comprehensive aggregates with tracable sources.</p>
                <p class="p4">Help us promoting an informed citizenship and make transparency go forth.</p>
            </div>

            <!-- Add featured section where there are some reports pinned here following recent news, manual admin choice -->

            <div id="selection">
                <h2>Admin's selection</h2>

                <figure>
                    <a href="fiche.php?Person=Hazebrouck"><img src="./images/Hazebrouck.jfif" alt="Photo de Laurent Hazebrouck"></a>
                    <figcaption>Laurent Hazebrouck</figcaption>
                </figure>

                <figure>
                    <a href="fiche.php?Person=De%20Langlade%20Béchu"><img src="./images/De_Langlade.jfif" alt="Photo de Laurent Hazebrouck"></a>
                    <figcaption>Estrée de Langlade Béchu</figcaption>
                </figure>
            </div>

        </section>

        <?php include("footer.html"); ?>
        <script><?php include("search.js"); ?></script>

    </body>
</html>