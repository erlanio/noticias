<?php
$cliente1 = array(
    'primaryEmail'   => 'erlanio.f@urca.br',
    'name' => array(
        'residencial' => 'Erlânio',
        'familyName' => 'Barros'
    )
);
$data_string = json_encode($cliente1);                                                                                   

$ch = curl_init('https://www.googleapis.com/admin/directory/v1/users');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);                                                                                                                   

$result = curl_exec($ch);
var_dump($result);