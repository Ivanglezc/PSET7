<?php

    // configuration
    require("../includes/config.php");
    
    // if user not logged in apologize
    if (empty($_SESSION["id"]))
    {
        apologize("You must log in.");
    }
    // if form was submitted
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if stock is empty
        if (empty($_POST["symbol"]))
        {
            apologize("Please enter stock symbol");
        }
        else
        {
            // lookup stock symbol
            $stock = lookup($_POST["symbol"]);
            
            // apologize
            if ($stock === false)
            {
                apologize("That stock was not found. Enter valid stock symbol");
            }
            // if stock was valid render show_quote with needed information
            else
            {
                //Render to show quote
                render("show_quote.php", ["title" => "Stock Quote", 
                                             "symbol" => $stock["symbol"],
                                             "name" => $stock["name"],
                                             "price" => number_format($stock["price"], 2)]);
            }
        }
    }
    // if form was not submitted then render quote_form
    else
    {
        render("quote_form.php", ["title" => "Look Up Stock"]);
    }
    
?>