<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("location: Login.php");
    }

    error_reporting(E_ERROR | E_PARSE);

    $con = mysqli_connect("localhost",
        "php_student",
        "phppass",
        "phpdb");
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
<html>
<head>
    <title>MyGamingTracker</title>
    <style type="text/css">

        body{
            background-color: darkslateblue;
            color: white;
        }
        main{
            margin-left: 9%;
            margin-right: 9%;
        }
        table, th, td{
            border: thin solid white;
            border-collapse: collapse;
        }
        .top{
            width: 50%;
            height: 40px;
            display: inline-block;
        }

    </style>
</head>

<body>
<br/><br/>

<h1 align="center">MyGamingTracker</h1>
<main>

    <fieldset class="top" style="float: left">
        <legend>Add/Update a game</legend>

        <form method="post" action="ADD_GAME.php">
            <label>Title: </label>
            <input type="text" name="title" style="width: 20%"/>

            <label>Platform: </label>
                <select name="platform">
                    <option value="PC">PC</option>
                    <option value="Switch">Switch</option>
                    <option value="PS4">PS4</option>
                    <option value="PS5">PS5</option>
                    <option value="Xbox One">Xbox One</option>
                    <option value="Xbox Series X">Xbox Series X</option>
                </select>

            <label>Status</label>
                <select name="status">
                    <option value="Completed">Completed</option>
                    <option value="Not Started">Not Started</option>
                    <option value="Currently Playing">Currently Playing</option>
                    <option value="Not Playing">Not Playing</option>
                </select>

            <input type="submit" value="Add" name="add" />
        </form>

    </fieldset>



    </fieldset>
    <br/><br/><br/><br/>


    <fieldset style="display: inline; width: 100%" >
        <legend>Current Games</legend>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <input type="text" name="user" style="width: 20%"/>
            <input type="submit" value="Search" name="search" />

        </form>
        <table>
            <tr><th>Game Title</th> <th>Platform</th> <th>Status</th></tr>
            <?php //include 'GET_GAMES.php'
            if($_POST['search']){
                $query = $con->prepare("SELECT title, platform, status FROM RECORD WHERE username=?");
                $username = $_POST['user'];
                $selectQuery = $query->bind_param("s", $username);

            }
            else{
                $query = $con->prepare("SELECT title, platform, status FROM RECORD WHERE username=?");
                $username = $_SESSION['username'];
                $selectQuery = $query->bind_param("s", $username);
            }


            if ($query->execute()){
                $result = $query->get_result();

                while($record = $result->fetch_assoc()){
                    echo "<tr> <td>" . $record['title'] . "</td> <td>" . $record['platform'] . "</td> <td>" . $record['status'] . "</td></tr>";
                }

            }
            $con->close();
            ?>
        </table>

    </fieldset>
</main>


</body>

</html>

