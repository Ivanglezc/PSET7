<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $symbols = CS50::query("SELECT symbol FROM portfolio WHERE user_id = ?", $_SESSION["id"]);
        render("sell_form.php", ["title" => "Sell","symbols"=>$symbols]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if($_POST["symbol"] =="Symbol")
        {
            apologize("You have nothing to sell :(");
        }
        $shares = CS50::query("SELECT shares FROM portfolio WHERE user_id = ? AND symbol = ?", $_SESSION["id"],$_POST["symbol"]);
        $stock = lookup($_POST["symbol"]);
        $profit = $shares[0]["shares"] * $stock["price"];
    
        CS50::query("UPDATE users SET cash = (cash + ".$profit.") WHERE id = ?", $_SESSION["id"]);
        $rows = CS50::query("DELETE FROM portfolio WHERE user_id = ? AND symbol = ?", $_SESSION["id"],$stock["symbol"]);
        $type = 'Sell';
        CS50::query("INSERT INTO history (user_id, transaction, symbol, shares, price) VALUES (?, ?, ?, ?, ?)", $_SESSION["id"], $type, $_POST["symbol"], $_POST["shares"], $stock["price"]);

        redirect("/");
    }
?>