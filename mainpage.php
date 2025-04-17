<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial_scale=1.0"/>
        <title></title>
        <link href="" rel="stylesheet"/>
    </head>

    <body>
        
        <header>

        </header>

        <?php 
            //Détruit les sessions php ouvertes depuis longtemps.
            /*if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 18000)) {
                session_unset();
                session_destroy();
                error_log("Session expirée (connexion + de 30 minutes); \n", 3, "main_log.txt");
            } elseif !isset($_SESSION['start']) {
                session_start(['cookie_lifetime' => 86400]);
            }*/
        ?>

        <h1>
            "Hello"
        </h1>

        <a href="fiche.php?Person=Hazebrouck">Fiche de Laurent Hazebrouck</a>

        <footer>

        </footer>

    </body>
</html>