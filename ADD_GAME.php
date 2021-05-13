<?php

    session_start();

    $con = mysqli_connect("localhost",
        "php_student",
        "phppass",
        "phpdb");
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if ($_POST['add']) {
        if (empty($_POST['title'])
            || empty($_POST['platform'])
            || empty($_POST['status']))
        {
            echo('Please fill all of the fields');
        }

        else {
            $username = $_SESSION['username'];
            $title = $_POST['title'];

            $existQuery = "SELECT * FROM RECORD WHERE username = '$username' AND title = '$title'";
            $exists = $con->query($existQuery);
            if($exists){
                if(mysqli_num_rows($exists) > 0){
                    $query = $con->prepare("UPDATE RECORD SET platform = ?, status = ? WHERE username = ? AND title = ?");
                    echo $con->error;
                    $platform = $_POST['platform'];
                    $status = $_POST['status'];
                    $username = $_SESSION['username'];
                    $title = $_POST['title'];

                    $updateQuery = $query->bind_param("ssss",  $platform, $status, $username, $title);
                    $updateQuery = $query->execute();
                }
                else{
                    $query = $con->prepare("INSERT INTO RECORD(username, title, platform, status) 
                                                                value(?,?,?,?)");
                    $username = $_SESSION['username'];
                    $title = $_POST['title'];
                    $platform = $_POST['platform'];
                    $status = $_POST['status'];

                    $insertQuery = $query->bind_param("ssss", $username, $title, $platform, $status);
                    $query->execute();
                }
            }

            header("location:main.php");
            mysqli_close($con);
        }
    }