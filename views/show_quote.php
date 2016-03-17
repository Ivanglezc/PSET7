<?php

?>

<table class="table table-striped">
    <tr>
        <th>Symbol</th>
        <th>Name</th>
        <th>Price</th>
    </tr>
    <tr>
        <td><?= $values["symbol"] ?></td>
        <td><?= $values["name"] ?></td>
        <td>$<?= $values["price"] ?></td>
    </tr>
</table>
<div>
    <a href="/index.php">Go Back</a>
</div>
