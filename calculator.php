<!DOCTYPE html>

<html>
    <head>
        <title>Nutri-Check</title>
        <link rel="stylesheet" href="calculator.css">
        <link rel="stylesheet" href="common.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            function nextIngredient(){
                //get user-entered infromation
                var servings = parseInt(document.getElementById("servings").value);
                var weight = parseInt(document.getElementById("total").value);
                var unit = document.querySelector('input[name="unit"]:checked').value;
                var cals = parseInt(document.getElementById("cals").value);
                var fats = parseInt(document.getElementById("fats").value);
                var carbs = parseInt(document.getElementById("carbs").value);
                var protein = parseInt(document.getElementById("protein").value);
                
                //get previous sum from hidden fields
                var prev_weight = parseInt(document.getElementById("total-hidden").value);
                var prev_cals = parseInt(document.getElementById("cals-hidden").value);
                var prev_fats = parseInt(document.getElementById("fats-hidden").value);
                var prev_carbs = parseInt(document.getElementById("carbs-hidden").value);
                var prev_protein = parseInt(document.getElementById("protein-hidden").value);

                //increment the sums
                weight = weight + prev_weight;
                cals = (cals*servings) + prev_cals;
                fats = (fats*servings) + prev_fats;
                carbs = (carbs*servings) + prev_carbs;
                protein = (protein*servings) + prev_protein;

                //update the hidden fields
                document.getElementById("servings-hidden").value = servings;
                document.getElementById("total-hidden").value = weight;
                document.getElementById("carbs-hidden").value = carbs;
                document.getElementById("cals-hidden").value = cals;
                document.getElementById("fats-hidden").value = fats;
                document.getElementById("protein-hidden").value = protein;

                //reset the form
                document.getElementById("input_form").reset();

                //Ensure same unit is selected and cannot be changed
                if(unit == "oz"){
                    document.getElementById("oz_btn").checked = true;
                }else{
                    document.getElementById("g_btn").checked = true;
                }
                document.getElementById("oz_btn").disabled = true;
                document.getElementById("g_btn").disabled = true;
            }

            function addRecipeAndCompute(){
                nextIngredient();
                
                //Get the sum for all variables
                var weight = parseInt(document.getElementById("total-hidden").value);
                var cals = parseInt(document.getElementById("cals-hidden").value);
                var fats = parseInt(document.getElementById("fats-hidden").value);
                var carbs = parseInt(document.getElementById("carbs-hidden").value);
                var protein = parseInt(document.getElementById("protein-hidden").value);
                var unit = document.querySelector('input[name="unit"]:checked').value;
                var recipe_name = document.getElementById("recipe_name-hidden").value;
                var recipe_id = parseInt(document.getElementById("recipe_id-hidden").value);

                //Change label to display selected unit
                document.getElementById("unit_label").innerHTML = unit;

                //round values
                cals = (cals/weight).toFixed(1);
                fats = (fats/weight).toFixed(1);
                carbs = (carbs/weight).toFixed(1);
                protein = (protein/weight).toFixed(1);

                //Set readonly fields to display the output
                document.getElementById("cals-result").value = cals;
                document.getElementById("fats-result").value = fats;
                document.getElementById("carbs-result").value = carbs;
                document.getElementById("protein-result").value = protein;

                //Add recipe to the database

                //make the post data for the AJAX call
                var postData = $('hidden-form').serialize();

                //AJAX call
                $.ajax({
                    type: "POST",
                    url: "add_recipe.php",
                    data: postData,
                    cache: false,
                    success: function(result){
                        document.getElementById("hidden-form").reset();
                        }
                    });
            }
        </script>
    </head>

    <?php 
        $recipe_name = $_POST['name'];
        $recipe_id = $_POST['id'];
    ?>

    <body>
        <?php include "header.php";?>

        <div class="row">
            <div id="input_box" class="col">
                <form id="input_form">
                    <fieldset id="input_fieldset">
                        <legend>Calculator</legend>
                        <label for="name"> Ingrendient Name: </label>
                        <input type="text" class="box_input" id="name" name="name" autocomplete="off"><br>

                        <label for="servings"> Number of Servings: </label>
                        <input type="number" class="box_input" id="servings" name="servings"><br>

                        <div id="weight_box">
                            <label for="total" class="sep"> Total Weight: </label>
                            <input type="number" class="box_input sep" id="total" name="total"><br>

                            <label class="radio-label">
                                <input type="radio" name="unit" id="oz_btn" value="oz"/>
                                oz
                            </label>

                            <label class="radio-label">
                                <input type="radio" name="unit" id="g_btn" value="g"/>
                                g
                            </label>
                            
                        </div><br>

                        <label for="cals"> Cals Per Serving: </label>
                        <input type="number" class="box_input" id="cals" name="cals"><br>

                        <label for="fats"> Fats Per Serving: </label>
                        <input type="number" class="box_input" id="fats" name="fats"><br>

                        <label for="carbs"> Carbs Per Serving: </label>
                        <input type="number" class="box_input" id="carbs" name="carbs"><br>

                        <label for="protein"> Protein Per Serving: </label>
                        <input type="number" class="box_input" id="protein" name="protein"><br>

                        <div id="button_box">
                            <input type="button" class="button" id="next" value="Next" onclick="nextIngredient()">
                            <input type="button" class="button" id="finish" value="Finish" onclick="addRecipeAndCompute()">
                            <a href="calculator.php"><button id="reset_btn">Reset</button></a>
                        </div>
                    </fieldset>
                </form>
            </div>

            <div class="col" id="info_box">
                <form id="hidden-form">
                    <input type="hidden" class="hidden_input" id="name-hidden">
                    <input type="hidden" class="hidden_input" id="total-hidden" value="0">
                    <input type="hidden" class="hidden_input" id="servings-hidden" value="0">
                    <input type="hidden" class="hidden_input" id="cals-hidden" value="0">
                    <input type="hidden" class="hidden_input" id="fats-hidden" value="0">
                    <input type="hidden" class="hidden_input" id="carbs-hidden" value="0">
                    <input type="hidden" class="hidden_input" id="protein-hidden" value="0">
                    <input type="hidden" class="hidden_input" id="unit-hidden">
                    <input type="hidden" class="hidden_input" id="recipe_id-hidden" value=<?php echo $recipe_id?> >
                    <input type="hidden" class="hidden_input" id="recipe_name-hidden" value=<?php echo $recipe_name?> >
                </form>

                <fieldset id="instruction_fieldset">
                    <legend>Instructions</legend>
                    <p> -Enter the name of the ingredient along with the number of servings and total weight of what is used</p><br>
                    <p> -Indicate what unit of weight to use. This will determine what unit the macro breakdown is in.</p><br>
                    <p> -Enter in the grams of macronutrients per serving of the ingredient</p><br>
                    <p> -When finished, press the 'Next' button to insert another ingredient or the 'Finish' button to compute the macro breakdown</p><br>
                </fieldset>


                <fieldset id="macro_fieldset">
                    <legend>Macro Breakdown</legend>
                    <p id="intro"">Macronutrients per <span id="unit_label"></span>:</p>

                    <label for="cals-result"> Cals: </label>
                    <input type="number" class="box_output" id="cals-result" name="cals-result" readonly><br>

                    <label for="fats-result"> fats (g): </label>
                    <input type="number" class="box_output" id="fats-result" name="fats-result" readonly><br>

                    <label for="carbs-result"> carbs (g): </label>
                    <input type="number" class="box_output" id="carbs-result" name="carbs-result" readonly><br>    
                    
                    <label for="protein-result"> Protein (g): </label>
                    <input type="number" class="box_output" id="protein-result" name="protein-result" readonly><br>
                </fieldset>

            </div>
        </div>
    </body>

</html>