<?php

    function writeMsg($servername, $hostname, $dbpassword, $dbname) {
        $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        return $conn;
    }
    
?>