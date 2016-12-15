<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("settings_form.php", ["title" => "Settings"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (!empty($_POST["cash"]))
        {
            $result3 = CS50::query("UPDATE users set cash = cash + ? WHERE id = ?", $_POST["cash"], $_SESSION["id"]);
            redirect('index.php');
        }
        if (empty($_POST["new_password"]) || empty($_POST["confirmation"])) 
        {
            apologize("Password or confirmation is empty!");
        }
        elseif($_POST["new_password"] !== $_POST["confirmation"]) 
        {
            apologize("Passwords do not match!");
        }
        $id = $_SESSION["id"];
        $pass = password_hash($_POST["new_password"], PASSWORD_DEFAULT);
        $result = CS50::query("update users set hash = '$pass' where id = $id");
        if ($result == false)
        {
            apologize("The update failed");
        }
        else
        {
            
            $_SESSION["id"];
              redirect('index.php');
        }
    }

?>