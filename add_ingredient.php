<?php
include 'database.php';
$conn = getConnection();

$recipeID = $_POST['recipeID'];
$servings = $_POST['servings'];
$total_weight = $_POST['weight'];
$cals = $_POST['cals'];
$carbs = $_POST['carbs'];
$fats = $_POST['fats'];
$protein = $_POST['protein'];
$unit = $_POST['unit'];
$name = $_POST['name'];


addIngredient($conn, $recipeID, $name, $unit, $total_weight, $servings, $cals, $protein, $fats, $carbs);