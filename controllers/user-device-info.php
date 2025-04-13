<?php
require '../vendor/autoload.php';

use Jenssegers\Agent\Agent;

$agent = new Agent();

$browser = $agent->browser();
$browserVersion = $agent->version($browser);
$platform = $agent->platform();
$platformVersion = $agent->version($platform);
$deviceType = $agent->isMobile() ? 'Mobile' : ($agent->isTablet() ? 'Tablet' : 'Desktop');

echo "Browser: $browser $browserVersion". '<br>';
echo "OS: $platform $platformVersion". '<br>';
echo "Device Type: $deviceType". '<br>';
echo "User Agent: " . $_SERVER['HTTP_USER_AGENT']. '<br>';
echo "IP Address: " . $_SERVER['REMOTE_ADDR']. '<br>';
