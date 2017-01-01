<?php
    require("../includes/config.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["symbol"]))
    {
        $rows = CS50::query("SELECT shares FROM portfolio WHERE user_id = ? AND symbol = ?",  $_SESSION["id"], $_POST["symbol"]);
        $stock = lookup($_POST["symbol"]);
        $cash = $rows[0]["shares"] * $stock["price"];
        CS50::query("DELETE FROM portfolio WHERE user_id = ? AND symbol = ?",  $_SESSION["id"], $_POST["symbol"]);
        CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $cash, $_SESSION["id"]);
        CS50::query("INSERT INTO history (user_id, transaction, symbol, shares, price) VALUES(?, 'SELL', ?, ?, ?)", $_SESSION["id"], $stock["symbol"], $rows[0]["shares"], $stock["price"]);

    }
    
    $rows = CS50::query("SELECT symbol FROM portfolio WHERE user_id = ?", $_SESSION["id"]);
    $options = [];
    foreach($rows as $row)
    {
        $options[] = $row["symbol"];
    }
    render("sell_form.php", ["title" => "SELL", "options" => $options]);
?>