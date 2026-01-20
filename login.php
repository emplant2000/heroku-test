<?php
// ---- 設定 ----
$apiKey = "48fwbbjmbownz67ayuuvoenr6lmpjfl4ddjesuc5da7whwiuttdch5pdjaymbefi";   // Pi Developer Portal の API Key
$jwt    = $_POST["pi_signed_jwt"] ?? "";  // フロントから送られる JWT

if (!$jwt) {
    http_response_code(400);
    exit("missing jwt");
}

// ---- Pi に JWT を検証してもらう ----
$ch = curl_init("https://api.minepi.com/v2/me");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Key $apiKey",
        "X-Pi-Signed-JWT: $jwt"
    ]
]);

$res  = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// ---- 結果 ----
if ($code === 200) {
    // Pi が JWT を正しいと認めた → ログイン成功
    echo "login ok";
} else {
    echo "login failed ($code)";
}
