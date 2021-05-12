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
            $query = $con->prepare("INSERT INTO RECORD(username, title, platform, status) 
                                                                value(?,?,?,?)");
            $username = $_SESSION['username'];
            $title = $_POST['title'];
            $platform = $_POST['platform'];
            $status = $_POST['status'];

            $insertQuery = $query->bind_param("ssss", $username, $title, $platform, $status);



            if ($insertQuery = $query->execute()) {
                echo "Game added";
            } else {
                echo "Game was not able to be added";
                echo $username . $title .$platform . $status;
            }
            mysqli_close($con);
        }
    }