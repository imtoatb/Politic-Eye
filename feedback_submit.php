<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial_scale=1.0"/>
        <title>Sending your information...</title>
        <link href="feedback.css" rel="stylesheet"/>
    </head>

    <body>

        <section id="status">
        <h2>Retour d'information sur l'état</h2>

        <?php 

        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            http_response_code(403); //Detects illegal access by seeing if accessed via POST method, else yields 403
            echo "<h1>403 Forbidden</h1><p>You have performed unauthorized access to this page. If this is unexpected, contact dev team.<p>";
            echo "<script>setTimeout(\"location.href = 'feedback.php';\",5500);</script>";
            exit;
        }

        error_log("\n\n-------- [FEEDBACK SUBMISSION START ".date(DATE_RFC2822)."] --------\n", 3, "feedback_submit_logs.txt"); 
        $fail = 0; //Failure variable
        if (!isset($_POST) or empty($_POST)) { //Checks if the post variable is empty, due to not null requirements in the database
            $fail = 1;
            goto fail;
        }

        $name = $_POST["Name"]; //Tests each variable sent by form to be sure there's no missing data
        if (!isset($name)) {
            error_log("Variable Name not assigned;\n", 3, "feedback_submit_logs.txt");
            $fail = 1;
            goto fail;
        }
        $email = $_POST["Email"];
        if (!isset($email)) {
            error_log("Variable Email not assigned;\n", 3, "feedback_submit_logs.txt");
            $fail = 1;
            goto fail;
        }
        $dob = date("Y-m-d", strtotime($_POST["DateOfBirth"]));
        if (!isset($dob)) {
            error_log("Variable DateOfBirth not assigned;\n", 3, "feedback_submit_logs.txt");
            $fail = 1;
            goto fail;
        }
        $region = $_POST["Region"];
        if (!isset($region)) {
            error_log("Variable Region not assigned;\n", 3, "feedback_submit_logs.txt");
            $fail = 1;
            goto fail;
        }
        $type = $_POST["Type"];
        if (!isset($type)) {
            error_log("Variable Type not assigned;\n", 3, "feedback_submit_logs.txt");
            $fail = 1;
            goto fail;
        }
        $commentary = $_POST["Commentary"];
        if (!isset($commentary)) {
            error_log("Variable Commentary not assigned;\n", 3, "feedback_submit_logs.txt");
            $fail = 1;
            goto fail;
        }
        $sources = $_POST["Sources"];
        if (!isset($sources)) {
            error_log("Variable Sources not assigned;\n", 3, "feedback_submit_logs.txt");
            $fail = 1;
            goto fail;
        }
        $contact = $_POST["Contact"];
        if (!isset($name)) {
            error_log("Variable Contact not assigned;\n", 3, "feedback_submit_logs.txt");
            $fail = 1;
            goto fail;
        }
        
        try { //Attempts to connect to server database.
            $mysqlClient = new PDO("mysql:host=localhost:3307;dbname=politic_backend;charset=utf8", "root", "root");
            error_log("PDO set up;\n", 3, "fiches_logs.txt");
        } catch(Exception $e) { //If fails, logs it in and goes to the routine at the end of the page.
            error_log("PDO or connection error | ".$e->getMessage().";\n", 3, "feedback_submit_logs.txt");
            $fail = 1;
            goto fail;
        }

        //Here in this query the :word tags indicates placeholders to replace by php during runtime
        $NewFeedbackQuery = $mysqlClient->prepare("INSERT INTO feedback(Name_Pseudo, Email, DoB, Region, Feedback_type, Commentary, Sources, Contact) VALUES (:alias, :email, :dob, :reg, :fedtype, :com, :sources, :contact)");
        try {
            $NewFeedbackQuery->execute([
                'alias' => $name,
                'email' => $email,
                'dob' => $dob,
                'reg' => $region,
                'fedtype' => $type,
                'com' => $commentary,
                'sources' => $sources,
                'contact' => $contact
            ]); // Array of placeholder replacements as function parameters
        } catch(Exception $e) {
            error_log("Insertion error in database | ".$e->getMessage()."\n;", 3, "feedback_submit_logs.txt");
            $fail = 1;
            goto fail;
        }
        ?>

        <?php fail:
        if ($fail == 0) { 
            echo "<script>setTimeout(\"location.href = 'mainpage.php';\",5500);</script>"; //Sends back to main page with a small delay?>
        <p>Données envoyées !</p>
        <?php } else {
            echo "<script>setTimeout(\"location.href = 'feedback.php';\",5500);</script>";?>
        <p>Erreur : la base de données n'a pas pu être mise à jour. Il est possible que vous n'ayez pas rempli tous les champs requis. Si ce n'est pas le cas, veuillez contacter un administrateur.</p>
        <?php } // Displays different messages based on completion of the request 
        error_log("-------- [FEEDBACK SUBMISSION END ".date(DATE_RFC2822)."] --------\n", 3, "feedback_submit_logs.txt"); 
        ?> 
        </section>

    </body>
</html>