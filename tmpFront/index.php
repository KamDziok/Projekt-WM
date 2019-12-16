<?php

$ch = curl_init();

$url = 'http://localhost:8080/WM/git/Projekt-WM/loadingPages/user/read.php';

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


//echo $rezult;
//var_dump($rezult);

// if(file_exists('user.json')){
//     //$current_data = file_get_contents('user.json');
//     //$array_data = json_decode($current_data, true);
//     $rezult = curl_exec($ch);
//     curl_close($ch);
//     //$array_rezult = json_decode($rezult);
//     //var_dump($rezult);
//     //var_dump($array_rezult);
//     //$final_data = json_encode($rezult);
//     if(file_put_contents('user.json', $rezult)){
//         echo 'Dane załadowane poprawnie.';
//     }
// }else{
//     echo 'Brak pliku.';
// }

$rezult = curl_exec($ch);
curl_close($ch);
$array_data = json_decode($rezult);
//var_dump($array_data);
print_r($array_data);
echo "<br/>";
echo $array_data[11];
