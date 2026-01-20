<?phpinfo();?>

<?php
// 最短・素手 cURL 版（Pi Server に投げて 200 が返れば OK とみなす）

$apiKey = 'x1mwcyc2r0du3ripbckdmstr11l6fb36bx6bdgpryerirgi0indnzjpdummnrpog';

$ch = curl_init('https://api.minepi.com/v2/me');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER     => ['Authorization: Key ' . $apiKey],
]);
$res  = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo $code === 200 ? 'API key OK' : 'API key NG (HTTP ' . $code . ')';
