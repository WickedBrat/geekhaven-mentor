<?php
require_once 'lib/src/Google_Client.php';
require 'lib/src/contrib/Google_Oauth2Service.php';
require_once 'lib/src/contrib/Google_PlusService.php';
session_start();
 $api = new Google_Client();
 $api->setApplicationName("InfoTuts"); // Set Application name
 $api->setClientId('901718618399-3fda2k6do4hnfgc99jl6ga97ho3mbiid.apps.googleusercontent.com'); // Set Client ID
 $api->setClientSecret('dPQwxQxx7xf92EeN38IfyAI9'); //Set client Secret
 $api->setAccessType('online'); // Access method
 $api->setScopes(array('https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/plus.me', 'https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/userinfo.profile'));
 $api->setRedirectUri('http://localhost:4567'); // Enter your file path (Redirect Uri) that you have set to get client ID in API console
 $service = new Google_PlusService($api);
 $URI = $api->createAuthUrl();
?>
<p style="text-align: justify;"></p>