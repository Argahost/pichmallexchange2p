
<?php
function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/" . get_client_ip());
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$exe = curl_exec($ch);
curl_close($ch);

$trwb = json_decode($exe, true);
$resultFlags = $trwb['flag'];
$codephone = $trwb['code'];
$negara = $trwb['country'];
$region = $trwb['regionName'];
$city = $trwb['city'];
$latitude = $trwb['lat'];
$longtitude = $trwb['lon'];
$timezone = $trwb['timezone'];
$perdana = $trwb['isp'];
$ipaddress = $trwb['ip_address'];
?>