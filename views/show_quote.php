<?php

?>
<body style="background-color:#bfbfbf">
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
 <?php $stock = lookup($_POST["symbol"]); ?>
<a class="btn btn-default" href="buy.php?symbol=<?= $stock["symbol"] ?>" role="button">
    <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Buy</a>

<div>
    <a href="/index.php">Go Back</a>
</div>
