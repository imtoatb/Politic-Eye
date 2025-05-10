<?php 

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(403); //Detects illegal access by seeing if accessed via POST method, else yields 403
    echo "<h1>403 Forbidden</h1><p>You have performed unauthorized access to this page. If this is unexpected, contact dev team.<p>";
    echo "<script>setTimeout(\"location.href = 'mainpage.php';\",5500);</script>";
    exit;
}

error_log("\n\n-------- [SEARCH START ".date(DATE_RFC2822)."] --------\n", 3, "search_logs.txt"); 
$fail = 0; //Failure variable
if (!isset($_POST) or empty($_POST)) { //Checks if the post variable is empty, due to not null requirements in the database
    $fail = 1;
    goto fail;
}
if (empty($_POST["Keywords"])) { //Check if field is empty
    $fail = 1;
    goto fail;
}
error_log("Logged string | ".$_POST["Keywords"].";\n", 3, "search_logs.txt");
try { //Attempts to connect to server database.
    $mysqlClient = new PDO("mysql:host=localhost:3307;dbname=politic_backend;charset=utf8", "root", "root");
    error_log("PDO set up;\n", 3, "search_logs.txt");
} catch(Exception $e) { //If fails, logs it in and goes to the routine at the end of the page.
    error_log("PDO or connection error | ".$e->getMessage().";\n", 3, "search_logs.txt");
    $fail = 1;
    goto fail;
}

$Records = [];
$StrArray = explode(" ", $_POST["Keywords"]); //Splits keyword string into array of strings.
foreach ($StrArray as $str) { //For each keyword
    $SearchQuery = $mysqlClient->prepare("SELECT First_Name, Last_Name FROM politician WHERE First_Name LIKE '%".$str."%' OR Last_Name LIKE '%".$str."%' OR Party LIKE '%".$str."%' OR Mandates LIKE '%".$str."%' OR Condemnations LIKE '%".$str."%' OR Scandals LIKE '%".$str."%' OR CoI LIKE '%".$str."%';");
    //Query that will look for similarity in each textual column with the keyword
    try {
        $SearchQuery->execute();
        error_log("Information retrieved for keyword : ".$str.";\n", 3, "search_logs.txt");
    } catch(Exception $e) {
        error_log("Query error for keyword : ".$str.";\n", 3, "search_logs.txt");
        $fail = 1;
        goto fail;
    }
    if (!empty($SearchQuery)) { //Check if the query returned results
        $Records[] = $SearchQuery->fetchAll(); //Add received records to the Records array
    }
}
$Records = array_unique($Records); //Trims double records from array

fail:
if ($fail == 0) {
    echo json_encode($Records, JSON_UNESCAPED_UNICODE); //Gives back to search.js file a JSON array, under utf-8 formatting
    error_log("-------- [SEARCH (WITH RESULTS) END ".date(DATE_RFC2822)."] --------\n", 3, "search_logs.txt");
} else {
    echo [];
    error_log("-------- [SEARCH (EMPTY) END ".date(DATE_RFC2822)."] --------\n", 3, "search_logs.txt");
}


?>