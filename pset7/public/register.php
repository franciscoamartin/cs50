<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        if (empty($_POST["username"]))
        {
            apologize("username is empty!");
        }
        if (empty($_POST["email"]))
        {
            apologize("email is empty!");
        }
        elseif (empty($_POST["password"]) || empty($_POST["confirmation"])) 
        {
            apologize("Password or confirmation is empty!");
        }
        elseif($_POST["password"] !== $_POST["confirmation"]) 
        {
            apologize("Passwords do not match!");
        }
        $result = CS50::query("INSERT IGNORE INTO users (username, hash, cash, email) VALUES(?, ?, 10000.0000, ?)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["email"]);
        if ($result == false)
        {
            apologize("The INSERT failed, presumably because username already existed");
        }
        else
        {
            $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            $_SESSION["id"];
            redirect('index.php');
        }
    }

?>