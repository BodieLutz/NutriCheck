<!DOCTYPE html>

<html>
    <head>
        <title>Nutri-Check</title>
        <link rel="stylesheet" href="search.css">
        <link rel="stylesheet" href="common.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </head>

    <body>
        <?php include "header.php";?>
        <div class="row">
            <div class="col" id="form-div">
                <form id="ing-form">
                    <fieldset class="ingredient">
                        <legend>Ingredient</legend>
                        <label for="ing-name">Name: </label>
                        <input type="text" name="ing-name" id="ing-name" class="box_input ingredient">
                        <br><br><br>

                        <label for="ing-cals">Calories: </label>
                        <input type="number" name="ing-cals" id="ing-cals" class="box_input ingredient">
                        <br>

                    </fieldset>
                </form>

                <form id="recipe-form">
                    <fieldset>
                        <legend>Recipe</legend>
                        <label for="recipe-name">Name: </label>
                        <input type="text" name="recipe-name" id="recipe-name" class="box_input recipe">
                        <br><br><br>

                        <label for="recipe-goal">Goal: </label>
                        <input type="text" name="recipe-goal" id="recipe-goal" class="box_input recipe">
                        <br><br><br>

                        <label for="recipe-cals">Calories: </label>
                        <input type="number" name="recipe-cals" id="recipe-cals" class="box_input recipe">
                        <br><br><br>

                        <label for="recipe-protein">Protein: </label>
                        <input type="number" name="recipe-protein" id="recipe-protein" class="box_input recipe">
                        <br>

                    </fieldset>
                </form>
            </div>

            <div class="col" id="table-div"></div>
        </div>
    </body>

</html>