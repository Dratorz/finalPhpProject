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
            width: 280px;
        }
        label{
            width:120px;
            display: inline-block;
            float: left;
            padding-bottom: 5px;
        }
        input{
            display: inline-block;
            float: right;
            margin-bottom: 5px
        }
        .submit{
            margin-top: 20px;
            float: left;
        }

    </style>
</head>

<body>
<br/><br/>

<h1 align="center">MyGamingTracker</h1>
<main>

    <br/>

    <fieldset>
        <legend>Login</legend>

        <form method="post" action="LOGIN&REGISTER.php">
            <label>Enter Username: </label>
            <input type="text" name="username" />
            <br/>
            <label>Enter Password: </label>
            <input type="password" name="password" class="textbox"/>
            <br/>

            <input type="submit" name="login" value="Login" class="submit" />
        </form>
    </fieldset>


    <br/>
    <br/>

    <fieldset>
        <legend>Registration</legend>

        <form method="post" action="LOGIN&REGISTER.php">
            <label>Enter Username: </label>
            <input type="text" name="username" />
            <br/>
            <label>Enter Password: </label>
            <input type="password" name="password" class="textbox"/>
            <br/>

            <input type="submit" name="register" value="Register" class="submit" />

        </form>
    </fieldset>

</main>


</body>

</html>
<?php
