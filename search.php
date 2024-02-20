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
                        <input type="text" name="ing-name" id="ing-name" class="box_input ingredient" onkeyup = "checkName(this.value, 'ing')">
                        <br><br><br>

                        <label for="ing-cals">Calories: </label>
                        <input type="number" name="ing-cals" id="ing-cals" class="box_input ingredient" onkeyup = "checkCalories(this.value, 'ing')">
                        <br>

                    </fieldset>
                </form>

                <form id="recipe-form">
                    <fieldset>
                        <legend>Recipe</legend>
                        <label for="recipe-name">Name: </label>
                        <input type="text" name="recipe-name" id="recipe-name" class="box_input recipe" onkeyup = "checkName(this.value, 'recipe')">
                        <br><br><br>

                        <label for="recipe-goal">Goal: </label>
                        <input type="text" name="recipe-goal" id="recipe-goal" class="box_input recipe">
                        <br><br><br>

                        <label for="recipe-cals">Calories: </label>
                        <input type="number" name="recipe-cals" id="recipe-cals" class="box_input recipe" onkeyup = "checkCalories(this.value, 'recipe')">
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

    <script>

        function checkName(value, type){
            if(type == 'ing'){
                var choice = document.getElementById('ing-name').value;
                var file = "get_ingredient_table.php";
            }else{
                var choice = document.getElementById('recipe-name').value;
                var file = "get_recipe_table.php";
            }

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                info = this.responseText;
                document.getElementById("table-div").innerHTML = info;
                if(value == ""){
                    document.getElementById("table-div").innerHTML = '';
                }
                //highlight_row();
            }
            };
            xmlhttp.open("GET", file+"?data="+choice+"&type=name", true);
            xmlhttp.send();
        }

        function checkCalories(value, type){
            if(type == 'ing'){
                var choice = document.getElementById('ing-cals').value;
                var file = "get_ingredient_table.php";
            }else{
                var choice = document.getElementById('recipe-cals').value;
                var file = "get_recipe_table.php";
            }

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                info = this.responseText;
                document.getElementById("table-div").innerHTML = info;
                if(value == ""){
                    document.getElementById("table-div").innerHTML = '';
                }
                //highlight_row();
            }
            };
            xmlhttp.open("GET", file+"?data="+choice+"&type=cals", true);
            xmlhttp.send();
        }

        /*
        function highlight_row() {
                var table = document.getElementById('display-table');
                var cells = table.getElementsByTagName('td');

                for (var i = 0; i < cells.length; i++) {
                    // Take each cell
                    var cell = cells[i];
                    // do something on onclick event for cell
                    cell.onclick = function () {
                        // Get the row id where the cell exists
                        var rowId = this.parentNode.rowIndex;

                        var rowsNotSelected = table.getElementsByTagName('tr');
                        for (var row = 0; row < rowsNotSelected.length; row++) {
                            rowsNotSelected[row].style.backgroundColor = "";
                            rowsNotSelected[row].classList.remove('selected');
                        }
                        var rowSelected = table.getElementsByTagName('tr')[rowId];
                        rowSelected.style.backgroundColor = "#fe7f2d";
                        rowSelected.className += " selected";

                        //document.getElementById('fname').value = rowSelected.cells[1].innerHTML;
                        //document.getElementById('lname').value = rowSelected.cells[2].innerHTML;
                        //document.getElementById('email').value = rowSelected.cells[3].innerHTML;
                    }
                }
        }*/

    </script>

</html>