<?php
    $con = mysqli_connect("localhost",
        "php_student",
        "phppass",
        "phpdb");
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //LOGIN
    if($_POST['login']){
        if (empty($_POST['username']) || empty($_POST['password'])) {
            echo('Please fill both the username and password fields');
        }
        else{

            $query = $con->prepare("SELECT username, password FROM USER WHERE username = ?  AND password = ?");
            $selectQuery= $query->bind_param("ss",$user,$pass);

            $user = $_POST['username'];
            $pass = $_POST['password'];
            $pass = md5($pass);
            if($selectQuery = $query->execute()){
                $query->bind_result($username, $password);
                if($query->fetch()){
                    if($user == $username && $pass == $password){
                        session_start();
                        $_SESSION["username"] = $user;

                        header("location:main.php");
                    }
                    else{
                        echo "Wrong login information";
                    }
                }

            }

            mysqli_close($con);
        }
    }

    //REGISTER
    elseif ($_POST['register']){
        if(empty($_POST['username'])
            || empty($_POST['password'])){

            echo('Please fill all of the fields');
        }
        else{
            $query = $con->prepare("INSERT INTO user(username, password) 
                                                            value(?,?)");
            $insertQuery = $query->bind_param("ss",$user, $pass);

            $user = $_POST['username'];
            $pass = $_POST['password'];
            $pass = md5($pass);

            if($insertQuery = $query->execute()){
                echo "Registration successful";
            }
            else{
                echo "Registration unsuccessful";
            }
            mysqli_close($con);
        }
    }