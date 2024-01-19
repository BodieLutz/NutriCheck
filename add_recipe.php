<?php
include 'database.php';
$conn = getConnection();

$recipe_name = $_POST['recipe_name'];
$recipe_id = $_POST['recipe_id'];
$cals = $_POST['cals'];
$carbs = $_POST['carbs'];
$fats = $_POST['fats'];
$protein = $_POST['protein'];
$unit = $_POST['unit'];
$goal = $_POST['goal'];

echo $cals;
addRecipe($conn, $recipe_name, $unit, $goal, $cals, $protein, $fats, $carbs);

