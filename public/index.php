<?php

    // configuration
    require("../includes/config.php"); 

    // render portfolio
    $rows = CS50::query("SELECT symbol, shares FROM portfolio WHERE user_id = ?", $_SESSION["id"]);
    $cash = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    $positions = [];
    foreach($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        $positions[] = [
            "symbol" => $stock["symbol"],
            "name" => $stock["name"],
            "shares" => $row["shares"],
            "price" => $stock["price"],
            "total" => $stock["price"] * $row["shares"]
        ];
        
    }
    render("portfolio.php", ["title" => "Portfolio", "positionsx" => $positions, "cash" => $cash[0]["cash"]]);

?>
