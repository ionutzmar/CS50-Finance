<?php
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("quote_form.php");
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        render("quote_showinfo.php");
    }
?>