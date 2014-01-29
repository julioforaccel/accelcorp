<?php

global $provision_server;
global $url;
global $email_prefix;

if (On_Stage_server()){
	//	echo "on www-stage<br>";
	$provision_server = "https://10.41.1.113/pdns/step2.php";	//opal test provisioning server
	$url = 'ssl://10.41.1.113';
	$email_prefix = "";
} else {
	//	echo "On production";
	$provision_server = "https://proserv.accellion.net/pdns/step2.php";
	$url = "ssl://proserv.accellion.net";
	$email_prefix = "";
}
//echo "<pre>".file_get_contents("/home/httpd/.htaccess")."</pre>";

function On_Stage_Server(){
	$hostname=gethostname();
	if (preg_match("|^www1$|",$hostname) || preg_match("|^www2$|",$hostname) || preg_match("|^amethyst$|",$hostname)) {
		return false;
    }
	else {
		//return false;
		return true;
    }
}

?>
