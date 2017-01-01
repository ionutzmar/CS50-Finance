<form action="buy.php" method="post">
    <div>
        <input class="form-control" name="symbol" type="text" placeholder="Symbol"/>
    </div>
    <div>
        <input class="form-control" name="noshares" type="text" placeholder="Number of shares"/>    
    </div>
    <div>
        <button type="submit">BUY</button>
    </div>
    <div>
        <?php
            if(isset($message))
            {
                echo htmlspecialchars($message);
            }
        ?>
    </div>
    
</form>