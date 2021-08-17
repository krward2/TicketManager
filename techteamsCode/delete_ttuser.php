<!--
/**
 * CS 4342 Database Management
 * @author Catalina Chinolla
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB.
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file deletes a record  from the table Student of your DB.
 */
-->


<?php

session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_GET['Username'])){

    $Username = $_GET['Username'];
    $query = "DELETE from techteam where Username = $Username";

    if ($conn->query($query) === TRUE) {
        echo "Username deleted successfuly";
        header("Location: view_ttusers.php");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
} else{
    echo "No Username received";
    header("Location: view_ttusers.php");
}

?>