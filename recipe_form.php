<?php
    include 'database.php';
    $conn = getConnection();
    $id = getMaxRecipeID($conn) + 1;
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="form.css"> 
        <link rel="stylesheet" href="common.css"> 
    </head>

<?php include "header.php"; ?>

    <body>
        <div class="form-popup" id="myForm">
                <form action="calculator.php" method="post" class="form-container">
                    <h1>Recipe Information</h1>

                    <div class="child-div">
                        <label for="name"><b>Recipe Name: </b></label>
                        <input type="text" name="name" required>
                    </div>

                    <div class="child-div">
                        <label for="goal"><b>Goal: </b></label>
                        <select name="goal" required>
                            <option value="gain">Gain</option>
                            <option value="lose">Lose</option>
                            <option value="NA">N/A</option>
                        </select>
                    </div>

                    <div class="child-div" id="readonly">
                        <label for="id"><b>ID: </b></label>
                        <input type="number" name="id" value="<?php echo $id; ?>" readonly>
                    </div>

                    <button type="submit" class="btn">Submit</button>
                </form>
        </div>

    </body>
</html>