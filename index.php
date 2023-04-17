<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ЛР 3</title>
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
    </style>
</head>
<body>
    <div class="main">
        <h1>Лабораторну роботу виконав<br>
        <span style="color: rgb(77, 11, 143);">Латковський Роман Віталійович </span><br>
        КІУКІ-19-7<br> <span style="color: rgb(77, 11, 143);">Варіант 3</span><br> 
        </h1>
        <div class="forms">
        <form action="get1.php" method="get">
            <select name="nurseName" id="nurseName">
                <?php

                include('connect.php');

                $sqlSelect = "SELECT name FROM nurse";
                $dbh = new PDO($dsn, $user, $pass);

                foreach($dbh->query($sqlSelect) as $row)
                {
                    echo "<option value='$row[0]'>$row[0]</option>";
                }

                $dbh = null;
                ?>
            </select>
            <input type="submit" value="Get !">
        </form>
        <form action="get2.php" method="get">
            <label for="wardName">Select ward:</label>
            <select name="wardName" id="wardName">
                <?php
                include('connect.php');
                $sqlSelect = "SELECT name FROM ward";
                foreach($dbh->query($sqlSelect) as $row)
                {
                    echo "<option value='$row[0]'>$row[0]</option>";
                }
                $dbh = null;
                ?>
            </select>
            <input type="submit" value="Get !">
        </form>
        <form action="get3.php" method="get">
            <label for="shift">Select shift:</label>
            <select name="shift" id="shift">
                <option value="First">First</option>
                <option value="Second">Second</option>
                <option value="Third">Third</option>
            </select>
            <input type="submit" value="Get !">
        </form>
        </div>
    </div>
</body>
</html>