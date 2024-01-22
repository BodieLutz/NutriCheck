<?php
include 'database.php';
$conn = getConnection();

$recipe_name = $_POST['recipe_name-hidden'];
$recipe_id = $_POST['recipe_id-hidden'];
$cals = $_POST['cals-hidden'];
$carbs = $_POST['carbs-hidden'];
$fats = $_POST['fats-hidden'];
$protein = $_POST['protein-hidden'];
$unit = $_POST['unit-hidden'];
$goal = $_POST['goal-hidden'];


addRecipe($conn, $recipe_name, $unit, $goal, $cals, $protein, $fats, $carbs);

