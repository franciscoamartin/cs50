<?php

    // configuration
    require("../includes/config.php"); 
    
    $id = $_SESSION["id"];
    // Retrieve all the shares this users owns
	// query database for user's info
    $rows0 = CS50::query("SELECT username FROM users WHERE id = ?", $_SESSION["id"]);
    $rows1 = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    // store user data to pass to template
    $username = $rows0[0]["username"];
    $cash = $rows1[0]["cash"];
	
	$rows = CS50::query("SELECT id, symbol, shares FROM portfolios WHERE id = $id");
    $positions = [];
    foreach ($rows as $row)
    {
    $stock = lookup($row["symbol"]);
    if ($stock !== false)
    {
        $positions[] = [
            "name" => $stock["name"],
            "price" => $stock["price"],
            "shares" => $row["shares"],
            "symbol" => $row["symbol"]
            ];
        }
    }
    
    // render portfolio
    render("portfolio.php", ["positions" => $positions, "title" => "Portfolio", "username" => $username, "cash" => $cash]);
    

?>
