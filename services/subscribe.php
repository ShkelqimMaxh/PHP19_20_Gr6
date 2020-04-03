<?php

    //Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "subsemails";
    $message = "Thank you for subscription, we will email you for the future versions";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userEmail = strval($_POST['subscribed_user_email']);
    //RegEX email conditions here


    //Handling email after submiting the right Form

    $sql = "INSERT INTO emails (userEmail)VALUES ('$userEmail')";
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
