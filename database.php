<?php

function getConnection(){
    include 'database_credentials.php';
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
  
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function getMaxRecipeID(){
    $stmt = $conn->prepare("select MAX(id) as num from Recipes");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

?>