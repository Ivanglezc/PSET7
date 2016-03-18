<?php

?>

<table class="table table-striped">
    <tr>
        <th style ="color: #0091FF;">Symbol</th>
        <th style ="color: #0091FF;">Name</th>
        <th style ="color: #0091FF;">Price</th>
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
