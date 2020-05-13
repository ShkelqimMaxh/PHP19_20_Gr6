<?php

    define("DATABASE_SERVERNAME", "localhost");
    define("DATABASE_USERNAME", "root");
    define("DATABASE_PASSWORD", "");
    define("DATABASE_DATABASENAME", "subscribers");


    // Create connection
    $conn = new mysqli(DATABASE_SERVERNAME, DATABASE_USERNAME, DATABASE_PASSWORD,DATABASE_DATABASENAME);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    $emails = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    $subs = array();

    foreach ($emails as $email){
        $subs[] = $email['email'];
    }

// Get Query String
$q = $_GET['input'];

$suggestion = "";

// Get Suggestions
if($q !== ""){
    $q = strtolower($q);
    $len = strlen($q);
    foreach($subs as $person){
        if(stristr($q, substr($person, 0, $len))){
            if($suggestion === ""){
                $suggestion = $person;
            } else {
                $suggestion .= ",&nbsp $person";
            }
        }
    }
}

echo $suggestion === "" ? "No Suggestion" : $suggestion;

?>