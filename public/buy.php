<?php
    require("../includes/config.php");
    
    $message = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $stock = lookup($_POST["symbol"]);
        $rows = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        $cash = $stock["price"] * $_POST["noshares"];
        if(!preg_match("/^\d+$/", $_POST["noshares"]))
        {
            $message = "Please input a valid number of shares!";
        }
        else if ($stock == false)
        {
            $message = "Invalid symbol.";
        }
        else if($rows[0]["cash"] < $cash)
        {
            $message = "You do not have enough money to buy.";
        }
        else 
        {
            CS50::query("INSERT INTO portfolio (user_id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], $stock["symbol"], $_POST["noshares"]);
            CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $cash, $_SESSION["id"]);
            CS50::query("INSERT INTO history (user_id, transaction, symbol, shares, price) VALUES(?, 'BUY', ?, ?, ?)", $_SESSION["id"], $stock["symbol"], $_POST["noshares"], $stock["price"]);
            $message = "You bought the shares! :)";
        }
       
    }

    render("buy_form.php", ["message" => $message]);
?>