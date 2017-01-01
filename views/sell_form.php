<form action="sell.php" method="post">
    <select class="form-control" name="symbol">
        <?php foreach($options as $option): ?>
            <option value=<?= $option?> ><?= $option?></option>
        <?php endforeach?>
    </select>
    <button type="submit">SELL</button>
</form>
