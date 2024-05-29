<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://youtube138.p.rapidapi.com/channel/videos/?id=UCv--CI9ZNufqFTUAFc4bO0Q&hl=en&gl=US",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: youtube138.p.rapidapi.com",
		"X-RapidAPI-Key: 276e0cd2e8mshd0841965bb759adp1acf9djsn65b9dffb7b83"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}