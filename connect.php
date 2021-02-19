<?php

$username = "freedbtech_bassemowo";
$password = "012166Root7980";



try {
    $con = new PDO("mysql:host=freedb.tech;dbname=freedbtech_bassemowo", $username, $password);
    
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
