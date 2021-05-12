<?php

    $con = mysqli_connect("localhost",
        "php_student",
        "phppass",
        "phpdb");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //USER TABLE
    $sqlUserTblDrop = "DROP TABLE IF EXISTS USER";

    if (!mysqli_query($con, $sqlUserTblDrop)) {
        echo("Error description: " . mysqli_error($con) . "<br/>");
    }
    else{
        echo "USER table dropped<br/>";
    }


    $sqlCreateUserTbl = "CREATE TABLE USER(
            id INT(10) AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(50) NOT NULL)";

    if (!mysqli_query($con, $sqlCreateUserTbl)) {
        echo("Error description: " . mysqli_error($con) . "<br/>");
    } else {
        echo "Table created<br>";
    }


    //RECORD TABLE

    $sqlRecordTblDrop = "DROP TABLE IF EXISTS RECORD";

    if (!mysqli_query($con, $sqlRecordTblDrop)) {
        echo("Error description: " . mysqli_error($con) . "<br/>");
    }
    else{
        echo "RECORD table dropped<br/>";
    }


    $sqlCreateRecordTbl = "CREATE TABLE RECORD(
                id INT(10) AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(50) NOT NULL,
                title VARCHAR(100),
                platform VARCHAR(50),
                status VARCHAR(50))";

    if (!mysqli_query($con, $sqlCreateRecordTbl)) {
        echo("Error description: " . mysqli_error($con) . "<br/>");
    } else {
        echo "Table created";
    }
    mysqli_close($con);
