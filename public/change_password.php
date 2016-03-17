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
        // check that new_password and confirmation are not empty
        if (empty($_POST["new_password"]) || empty($_POST["confirmation"]))
        {
            apologize("You must enter new password and confirmation.");
        }
        // check that new_password and confirmation are the same
        else if ($_POST["new_password"] != $_POST["confirmation"])
        {
            apologize("Password and confirmation do not match");
        }
        // update password
        else
        {
            // update hash for user to crypt of new_password
            $result = CS50::query("UPDATE users SET hash = ? WHERE id = ?", 
                              crypt($_POST["new_password"]), $_SESSION["id"]);
            
            // if the query failed apologize
            if ($result === false)
            {
                apologize("Password could not be changed, please try again");
            }
            // if successful redirect to index
            else
            {
                redirect("/index.php");
            }
        }
    }
    // if form was not submitted
    else
    {
        // render form
        render("change_password_form.php", ["title" => "Register"]);
    }
?>