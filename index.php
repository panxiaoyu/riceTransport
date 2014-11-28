<?php

// Start the session
//require_once('./php/startsession.php');
// load the language
require_once('./php/LANGUAGES.php');
$langue = 'en';
//inlclude the head
require_once('./php/head.php');
//include the main body
require_once('./php/main.php');
//include the restaurant login
require_once __DIR__ .'/php/restaurantLogin.php';
//include the foot
require_once('./php/foot.php');	
?>