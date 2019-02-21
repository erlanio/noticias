<?php
    $ch = curl_init();

    $data = array('primaryEmail'         => 'erlanio.freire@urca.br', 
                 );

    curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/admin/directory/v1/users');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $res    = curl_exec ($ch);
    $err    = curl_errno($ch);
    $errmsg = curl_error($ch);
    $header = curl_getinfo($ch);

    curl_close($ch);

    print_r($res); 
?>  