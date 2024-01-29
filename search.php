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
                    <fieldset>
                        <legend>Ingredient</legend>
                        <input type="text" name="ing-name" id="ing-name">
                        <label for="ing-name">Name: </label><br>

                        <input type="number" name="ing-cals" id="ing-cals">
                        <label for="ing-cals">Calories: </label><br>

                    </fieldset>
                </form>

                <form id="recipe-form">
                    <fieldset>
                        <legend>Recipe</legend>
                        <input type="text" name="recipe-name" id="recipe-name">
                        <label for="recipe-name">Name: </label><br>

                        <input type="text" name="recipe-goal" id="recipe-goal">
                        <label for="recipe-goal">Goal: </label><br>

                        <input type="number" name="recipe-cals" id="recipe-cals">
                        <label for="recipe-cals">Calories: </label><br>

                        <input type="number" name="recipe-protein" id="recipe-protein">
                        <label for="recipe-protein">Protein: </label><br>

                    </fieldset>
                </form>
            </div>

            <div class="col" id="table-div"></div>
        </div>
    </body>

</html>