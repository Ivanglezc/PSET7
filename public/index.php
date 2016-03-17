<?php

    // configuration
    require("../includes/config.php"); 

    $rows = CS50::query("SELECT symbol, shares, id FROM portfolio WHERE user_id = ?", $_SESSION["id"]);
    $cash = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    $cash = $cash[0]["cash"];
    
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"],
                "total" =>  $row["shares"]*$stock["price"]
            ];
        }
    }
    
    render("portfolio.php", ["title" => "Portfolio", "positions" => $positions, "cash" => $cash]);
?>
<form action="change_password.php" method="post">
    <fieldset>
        <div class="form-group">
            <input class="form-control" name="new_password" placeholder="New Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Confirmation" type="password"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Change</button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="index.php">go back</a>
</div>
