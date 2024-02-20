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

function createRecipe($conn, $name, $goal){
    $stmt = $conn->prepare("INSERT INTO recipes (name, goal) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $goal);
    $stmt->execute();
}

function updateRecipe($conn, $unit, $cals, $protein, $fats, $carbs, $recipe_id){
    $stmt = $conn->prepare("UPDATE recipes SET unit=?, cals=?, protein=?, fats=?, carbs=? WHERE id=?");
    $stmt->bind_param("sddddd", $unit, $cals, $protein, $fats, $carbs, $recipe_id);
    $stmt->execute();
}

function addIngredient($conn, $recipeID, $name, $unit, $weight, $servings, $cals, $protein, $fats, $carbs){
    $stmt = $conn->prepare("INSERT INTO ingredients (recipe_id, name, unit, total_weight, num_serv, cals, protein, fats, carbs) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("dssdddddd", $recipeID, $name, $unit, $weight, $servings, $cals, $protein, $fats, $carbs);
    $stmt->execute();
}

?>