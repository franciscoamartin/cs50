<?php
    // configuration
    require("../includes/config.php");
    
        $rows = CS50::query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);
        
        if(count($rows) > 0)
        {
            $history = [];
            foreach($rows as $row)
            {
                $history[] = [
                    "id" => $row["id"],
                    "transaction" => $row["transaction"],
                    "datetime" => $row["date_time"],
                    "symbol" => $row["symbol"],
                    "shares" => $row["shares"],
                    "price" => money_format("$%i", $row["price"])
                ];
            }
            render("history_form.php", ["title" => "History", "history" => $history]);
        }
        else
        {
            render("history_form.php", ["title" => "History"]);
        }
?>