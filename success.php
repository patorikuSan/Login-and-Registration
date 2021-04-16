<?php

    session_start();
    echo "Hello " .  $_SESSION['first_name'];
    
?>
<html>
    <head>
        <style>
            	a{
                    width: 150px;
                    min-height: 40px;
                    text-decoration: none;
                    background-color: aquamarine;
                    margin-top: 50px;
                    margin-left: 30px;
                    border: 1px solid black;
                    font-family: helvetica;
                    font-size: 30px;
                    padding: 10px;
                    color: black;
                    display: block;
                }
        </style>
    </head>
    <body>
        <?php echo "<a href='process.php'>LOG OUT!</a>"; ?>
    </body>
</html>