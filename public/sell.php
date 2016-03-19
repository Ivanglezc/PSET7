<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $symbol = CS50::query("SELECT symbol FROM portfolio WHERE user_id = ?", $_SESSION["id"]);
        render("sell_form.php", ["title" => "Sell","symbols"=>$symbol]);
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
        $shareamount = $_POST["shareamount"];// $shares[0]["shares"] * $stock["price"];
        
        if ($_POST["shareamount"] == NULL)
        {
            apologize("Enter a number of shares");
        }
        
        else if ($_POST["shareamount"] < 0)
        {
            apologize("Enter a possible amount");
        }
        
        else if ($_POST["shareamount"] > $shares[0]["shares"])
        {
            apologize("Not enough shares to sell");
        }
        $value = $stock["price"] * $shareamount;
        $cost = $stock["price"] * $_POST["shares"];
       
        if ($_POST["shareamount"] < $shares[0]["shares"])
        {
            $rows = CS50::query("UPDATE portfolio SET shares = (shares - ".$shareamount.") WHERE user_id = ? AND symbols = ?", $_SESSION["id"], $stock["symbol"]);
        }
        
        else if ($_POST["shareamount"] == $shares[0]["shares"])
        {
            $rows = CS50::query("DELETE FROM portfolio WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $stock["symbol"]);
        }
        CS50::query("UPDATE users SET cash = (cash + ".$value.") WHERE id = ?", $_SESSION["id"]);
        $type = 'Sell';
        CS50::query("INSERT INTO history (user_id, transaction, symbol, shares, price) VALUES(?, ?, ?, ?, ?)", $_SESSION["id"], $type, $_POST["symbol"], $_POST["shareamount"], $value);
        
        redirect("/");    
    }    
?>     
