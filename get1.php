<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ЛР 3_1</title>
    <style>
        body{
            background-color: #0333;
        }
        *{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 22px;
        }
        .main{
        width: 400px;
        margin: 0 auto;
        }
        button{
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="main">
        <h1>Лабораторну роботу виконав<br>
        <span style="color: rgb(77, 11, 143);">Латковський Роман Віталійович </span><br>
        КІУКІ-19-7<br> <span style="color: rgb(77, 11, 143);">Варіант 3</span><br> 
        </h1>
        <?php
            include('connect.php');


            $nurseName = $_GET['nurseName'];

            try {
                $sqlSelect = "SELECT nurse.name, ward.name, department, shift FROM nurse, ward, nurse_ward WHERE 
                nurse.name=? AND id_nurse=fid_nurse AND fid_ward=id_ward";

                $stmt = $dbh->prepare($sqlSelect);

                $stmt->bindValue(1,$nurseName);
                $stmt->execute();
                $res = $stmt->fetchAll();

                echo "<table border='1'";
                echo "<thead><tr><th>nurse.name</th><th>ward.name</th><th>department</th><th>shift</th></tr></thead>";
                echo "<tbody>";

                foreach($res as $row)
                {
                    echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
                }
                
                echo "</tbody>";
                echo "</table>";
            }
            catch(PDOException $ex) {
                echo $ex->GetMessage();
            }
            $dbh = null;
        ?>
        <button><a href="./index.php">Back</a></button>
    </div>
</body>
</html>