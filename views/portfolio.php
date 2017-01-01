<div>
    <table class="table table-stripped">
    <thead>
        <tr style="font-weight:bold">
            <td>Symbol</td>
            <td>Name</td>
            <td>Shares</td>
            <td>Price per share</td>
            <td>Total ($)</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($positionsx as $position): ?>

    <tr>
        <td><?= $position["symbol"] ?></td>
        <td><?= $position["name"] ?></td>
        <td><?= $position["shares"] ?></td>
        <td><?= $position["price"] ?></td>
        <td><?= $position["total"] ?></td>
    </tr>
    <?php endforeach ?>

    <tr>
        <td>CASH</td>
        <td></td>
        <td></td>
        <td></td>
        <td><?= $cash ?></td>
    </tr>
    </tbody>
    </table>

</div>
