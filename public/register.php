<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }
        // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if first name is empty
		if(empty($_POST["firstname"]))
		{
			apologize("Please insert your first name");
	    }
        
        // check if last name is empty
		else if(empty($_POST["lastname"]))
		{
			apologize("Please insert your last name");
	    }
	    
        // check if username is empty
		else if(empty($_POST["username"]))
		{
			apologize("Please insert a username");
	    }
	    
	    // check if password is empty
	    else if(empty($_POST["password"]))
		{
		    apologize("Please insert a password");
	    }
	    
	    // check if confirmation matches password
		else if($_POST["password"] != $_POST["confirmation"])
		{
		    apologize("Please confirm password correctly");
		}

    // else if user reached page via POST (as by submitting a form via POST)
    else if (!CS50::query("INSERT IGNORE INTO users (username, hash, cash, firstname, lastname) VALUES(?, ?, 10000.0000, ?, ?)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["firstname"], $_POST["lastname"]))
        {
            apologize("Username already exists");
        }       
        else
        {
            $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            $_SESSION["id"] = $id;
            redirect("index.php");
        }
    }
?>