<?php
// 获取访问者的IP地址
function getClientIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// 获取IP地址的运营商信息
function getISP($ip) {
    $url = "http://ip-api.com/json/{$ip}";
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    return $data['isp'] ?? '未知';
}

$ip = getClientIP();
$isp = getISP($ip);

echo "<h2>您的IP地址是：{$ip}</h2>";
echo "<h2>您的运营商是：{$isp}</h2>";
?>
