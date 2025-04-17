<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial_scale=1.0"/>
        <title>Report on First Last</title>
        <link href="fiche.css" rel="stylesheet"/>
    </head>

    <body>
        
        <header>

        </header>

        <?php 
        error_log("\n\n--------- [REPORT ACCESS START ".date(DATE_RFC2822)."] ---------\n", 3, "fiches_logs.txt");

        $fail = 0; //Failure variable
        try { //Attempts to connect to server database.
            $mysqlClient = new PDO("mysql:host=localhost:3307;dbname=politic_backend;charset=utf8", "root", "root");
            error_log("PDO set up;\n", 3, "fiches_logs.txt");
        } catch(Exception $e) { //If fails, logs it in and goes to the routine at the end of the page.
            error_log("PDO or connection error | ".$e->getMessage().";\n", 3, "fiches_logs.txt");
            $fail = 1;
            goto fail;
        }

        if (!isset($_GET["Person"])) { //If there is no Person parameter in the link, fails automatically
            $fail = 1;
            goto fail;
        }

        $PoliticianQuery = $mysqlClient->prepare("SELECT * FROM politician WHERE Last_Name='".$_GET["Person"]."';"); //Prepares to fetch politician data
        try {
            $PoliticianQuery->execute();
            error_log("Report on ".$_GET["Person"]." accessed on ".date(DATE_RFC2822)." British GMT Hour;\n", 3, "fiches_logs.txt");
        } catch(Exception $e) { //If fails, logs and go to failure routine.
            error_log("Database query failed | ".$e->getMessage().";\n", 3, "fiches_logs.txt");
            $fail = 1;
            goto fail;
        }

        try {
            $Politician = $PoliticianQuery->fetchAll(); //Puts retrieved data in php array.
            error_log("Informations fetched;\n", 3, "fiches_logs.txt");
        } catch(Exception $e) {
            error_log("No information fetched;\n", 3, "fiches_logs.txt");
            $fail = 1;
            goto fail;
        }

        if (empty($Politician)) {
            $fail = 1; //Checks if the SQL query has returned an empty array. If yes, triggers fail routine.
            error_log("Error | Incorrect Politician name or not present in database;\n", 3, "fiches_logs.txt");
        } else {
            error_log("Empty array test passed;\n", 3, "fiches_log.txt");
        }

        fail:
        if ($fail == 0) {
            foreach ($Politician as $pol) {
        ?>

        <aside>
            <img src="patate.png" alt="Totoletoto">
            <br/>
            <span class="field">First Name :</span> <p><?php echo $pol["First_Name"]?></p>
            <span class="field">Last Name :</span> <p><?php echo $pol["Last_Name"]?></p>
            <span class="field">Date of Birth :</span> <p><?php echo $pol["DoB"]?></p>
            <span class="field">Party :</span> <p><?php echo $pol["Party"]?></p>
        </aside>

        <section id="longcontent">
            <h1>Report on <?php echo $pol["First_Name"]?> <?php echo $pol["Last_Name"]?></h1>

            <h2>Mandates held</h2>

            <p><?php echo $pol["Mandates"]?></p>

            <h2>Conflicts of Interests</h2>

            <p><?php echo $pol["CoI"]?></p>

            <h2>Condemnations</h2>

            <p><?php echo $pol["Condemnations"]?></p>

            <h2>Scandals</h2>

            <p><?php echo $pol["Scandals"]?></p>

            <h3>Sources</h3>

            <p>Sample, will be replaced by a php foreach loop</p>


        </section>

        <?php 
            }
        } else { ?>
            <p><?php echo "Error : either the database has failed, the person you're looking for doesn't exist or you have accessed wrongly this page"; ?></p>
        <?php }
        error_log("--------- [REPORT ACCESS END ".date(DATE_RFC2822)."] ---------\n", 3, "fiches_logs.txt");
        ?>

        <footer>

        </footer>

    </body>
</html>