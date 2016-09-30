<?php
header('Content-Type: application/json');
$rec_data = file_get_contents('php://input');
$message = json_decode($rec_data,true);
$text = $message['text'];

echo "{\"text\": \"";

if(strpos(strtolower($text), strtolower("#weatherKolkata")) !== false) {
    $country="IN";
    $url="http://api.openweathermap.org/data/2.5/weather?q=Kolkata,IN&units=metric&cnt=7&lang=en&APPID=fb1d8dcf4118bab4a3a074089555f761";
    $json=file_get_contents($url);
    $data=json_decode($json,true);
    $city = $data['name'];
    echo $city."\\n";
    echo "Temperature: ".$data['main']['temp']." C\\n";
    echo "Condition: ".$data['weather'][0]['main']." \\n";
    echo "Condition: ".$data['weather'][0]['description']." \\n";
    echo "Humidity: ".$data['main']['humidity']." %\\n";
}
if(strpos(strtolower($text), strtolower("#footfall")) !== false) {
    $str = file_get_contents('http://echeckin.infinnovation.co/footfall/json.php');
    $json = json_decode($str,true);
    echo "Footfall: ".$json['total']."\\n";
}

echo "\"}";
?>
