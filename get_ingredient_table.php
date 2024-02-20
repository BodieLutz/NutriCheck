<?php

include 'database.php';

$conn = getConnection();

$data = $_GET['data'];
$type = $_GET['type'];
?>

<?php $result = getIngredientByName($conn, $data, $type);
?>
        <?php if (!$result){ ?>
            <?php echo "No ingredients can be found" ?>
            <?php }else{ ?>
            <style>
                table{
                    margin-left: 50px;
                    border-collapse: collapse;
                    font-size: 12pt;
                }

                td, th{
                    border: 2px solid white;
                    width: fit-content;
                }

                th, td{
                    padding: 15px;
                    text-align: left;
                }
                tr:hover{
                    background-color: #fe7f2d;
                }
            </style>

            <table id="display-table">
            <tr>
                <th>Ingredient Name</th>
                <th>Cals</th>
                <th>Carbs</th>
                <th>Fats</th>
                <th>Protein</th>
            </tr>

        
            <?php foreach($result as $row): ?>
            <tr>
                <td style><?= $row['name'] ?></td>
                <td style><?= $row['cals'] ?></td>
                <td style><?= $row['carbs'] ?></td>
                <td style><?= $row['fats'] ?></td>     
                <td style><?= $row['protein'] ?></td>        
            </tr>
            <?php endforeach ?>
        </table>
        <?php } ?>
