<?php
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must enter a symbol.");
        }
        else if (empty($_POST["shares"]))
        {
            apologize("You must enter a number of shares to buy.");
        }
        else if (preg_match("/^\d+$/", $_POST["shares"]) == false)
        {
            apologize("You must enter a valid number of shares to buy.");
        }
        
        // retrieve stock from symbol
        $stock = lookup($_POST["symbol"]);
        if(count($stock) == 3)
        {
            // retrieve the user's available credit from the db
            $rows = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
            $cash = $rows[0]["cash"];
            
            // calculate the cost of the transaction
            $price = $stock["price"];
            $cost = $price * $_POST["shares"];
            
            // ensure the user has enough cash
            if($cost <= $cash)
            {
                // debit the user's cash
                CS50::query("UPDATE users set cash = cash - ? WHERE id = ?", $cost, $_SESSION["id"]);
                
                // create/update the position
                CS50::query("INSERT INTO portfolios (id, user_id, symbol, shares) VALUES(?, ?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], $_SESSION["id"], $stock["symbol"], $_POST["shares"]);
                $to = CS50::query("select email from users where id = ?", $_SESSION["id"]);
                mail("$to", "buy", "test");
                //logBuy($stock["symbol"], $_POST["shares"], $price);
                
                $history = CS50::query("INSERT INTO history (id, transaction, date_time, symbol, shares, price) VALUES (?, ?, Now(), ?, ?, ?)", $_SESSION["id"], "buy", strtoupper($stock["symbol"]), $_POST["shares"], $stock["price"]);
                //$history = CS50::query("INSERT INTO history (id, transaction, date_time, symbol, shares, price) VALUES (?, ?, Now(), ?, ?, ?)", $_SESSION["id"], "sold", strtoupper($stock["symbol"]), $shares, $stock["price"]);
                // redirect to the portfolios
                redirect("index.php");
            }
            else
            {
                apologize("You do not have enough cash for this transaction.");
            }
        }
        else
        {
            apologize("Stock not found.");
        }
    }
    else
    {
        // else render form
        render("buy_form.php", ["title" => "Buy"]);
    }
?>