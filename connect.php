<?php
    $dsn = "mysql:host=localhost;dbname=mylab3var3";
    $user = 'root';
    $pass = '';

    try {
        $dbh = new PDO($dsn, $user, $pass);
    } catch (PDOException $ex) {
        echo $ex->GetMessage();
    }
?>