<?php
    $stock = lookup($_POST["symbol"]);
    if($stock == false)
    {
        print("Could not get the price for " . $_POST["symbol"] . ".");
    }
    
?>

<p>A share of <?= $stock['name'] . " (" . $stock['symbol'] ?>) is $<?= $stock['price']?>.</p>