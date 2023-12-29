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

function getMaxRecipeID($conn){
    $stmt = $conn->prepare("select MAX(id) as num from Recipes");
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_array();
    $num = intval($result[0]);
    return $num;
}

function addRecipe($conn, $name, $unit, $goal, $cals, $protein, $fats, $carbs){
    $stmt = $conn->prepare("INSERT INTO recipes VALUES ?, ?, ?, ?, ?, ?, ?");
    $stmt->bind_param("sssffff", $name, $unit, $goal, $cals, $protein, $fats, $carbs);
    $stmt->execute();
}

?>