<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("location: Login.php");
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
            margin-left: 10%;
        }
        fieldset{
            width: 590px;
            height: 40px;
        }
        label{

        }
        input{

        }


    </style>
</head>

<body>
<br/><br/>

<h1 align="center">MyGamingTracker</h1>
<main>

    <fieldset>
        <legend>Add a new game</legend>
        <form method="post" action="ADD_GAME.php">
            <label>Title: </label>
            <input type="text" name="title" />

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

    <br/><br/>

    <fieldset>
        <legend>Current Games</legend>

        <table>
            <tr><th>Game Title</th> <th>Platform</th> <th>Status</th></tr>
            <?php include 'GET_GAMES.php'?>
        </table>

    </fieldset>
</main>


</body>

</html>

