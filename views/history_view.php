<div>
    <table class="table table-stripped">
    <thead>
        <tr style="font-weight:bold">
            <td>Transaction</td>
            <td>Date and time</td>
            <td>Symbol</td>
            <td>Shares</td>
            <td>Price</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($positionsx as $position): ?>

    <tr>
        <td><?= $position["transaction"] ?></td>
        <td><?= $position["time"] ?></td>
        <td><?= $position["symbol"] ?></td>
        <td><?= $position["shares"] ?></td>
        <td><?= $position["price"] ?></td>
    </tr>
    <?php endforeach ?>

    </tbody>
    </table>

</div>
