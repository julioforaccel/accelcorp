<?php

include_once 'debugmode.php';
$arrCompetitors = array('Allard Software','Artesia Digital Media Group','Aspera Software','Attachmore','Aurora Enterprise','AxWay','Beehive','B-Hub','Biscom Inc.','Bittorrent','Box Inc.','Catalyst','Cemaphore','CertifiedMail','Certified Mail','Cleo','ClipStream','Core Technology Corporation','Coviant Software','Cyber-Ark','DigiDelivery','Document 1Box','DropLoad','Entrust','eRoom.net','Fileflow','FileMarshal','Files2U','Foldermail','Fujitsu SEKYUAPAKKEJI competitor','Fujitsu Software - Japan','GDX Japan','Gigabyte Express','GlobalScape','Group Logic Inc.','Harbor HFT','HeavyMail','Hitek Software','Hypersend','I(2) Drive','Ignite Tech','InfiMail','Inovis','Intellidyne','Interdubs','Intralinks','Ipswitch','iSoft','iway','Jscape','Just Attach','LeapFile','Lexias','Lotus Notes','M-Box','Megaupload','Messageway','Mimecast','Mimosa Systems','North Plains','Novell','NRI Secure Technologies','NTT Communications - Gtrax','Pipeline Software Inc','PKWare','Planet eStream','PostX','Prado','Primeur','Proginet','Proself','PTAI','Qiata','Radiance Technologies','Rapidshare','Rumpus','Saison Information Systems Co. Ltd','Secure Computing','Seeburger AG - USA','Sendthisfile','sendyourfiles','ShareFile','SharePoint & OCS','signiant','SmartJog','SoftLink','Softlinx','Standard Networks MOVEit dmz','Sterling Commerce','Sterling Commerce - Japan','Thru','Tibco','Trinity Security','Tripod Works','Tumbleweed','Unlimi-Tech Software','Veepee','Wam!Net','Webcargo','WebNative','Workshare','Xiotech','Xythos','YouSendItInc.','Youve Got Files','ZipLip','Zix');

if (empty($_POST["Email"]))	{	//exit from a bogus post i.e. a scanner
	header( 'Location: http://www.accellion.com/trial-demo' ) ;
}
else {	

	$params["email"] = $_POST["Email"];
	$params["firstname"] = $_POST["FirstName"];
	$params["company"] = $_POST["Company"];
	$params["evaltype"] =$_POST["evaltype"];

	$producttype = $_POST["evaltype"];
	switch($producttype){
		case "SCH-E":		// 14-day hosted trial
			$referer="http://www.accellion.com/14-day-free-trial";
			break;
		case "SCV-E":		// 14 day VM trial
			//$referer="http://www.accellion.com/trial-free-45-day-collaboration-vm.html";
			break;
	}
     
	$company = $_POST["Company"];
	if (in_array(strtolower(trim($company)), array_map('strtolower', $arrCompetitors)))
		{}//return 0;
	else {
		echo "Call post function<br>";
		curl_request_async($url,$_POST);	//Create license and hosted appid
	}
	//Register with Marketo
    if (!On_Stage_server()){
		register_mkto($_POST, $referer);
    }
}

function register_mkto ($info, $referer) {
	$ch = curl_init();	
	curl_setopt($ch, CURLOPT_URL, 'http://www.info.accellion.com/index.php/leadCapture/save');
	curl_setopt($ch, CURLOPT_HEADER, 1);	
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $info);
	//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_REFERER, $referer);
	ob_start();
	$response = curl_exec($ch);
	curl_close($ch);
	$contents = ob_get_contents();
	ob_end_clean();
	$filtered = preg_replace("/.*<html>/s", "<html>", $contents );
	if ($response) {
		echo $filtered;
	} else {
		echo $contents.'\r\nError in marketo response: '.$response;
		error_log($contents.'\r\nError in marketo response: '.$response);
	}

}

function curl_request_async($url, $params) {
    if (!On_Stage_server()){
		$out="";
		foreach ($params as $key => &$val) {
			if (is_array($val)) $val = implode(',', $val);
			$post_params[] = $key.'='.urlencode($val);
      	}
      	$post_string = implode('&', $post_params);

      	$parts=parse_url($url);
		$fp = fsockopen ($url,443, $errno, $errstr, 15);
		$out ="POST /pdns/eval/trial_ng.php HTTP/1.1\r\n";
      	$out.= "Host: ".$parts['host']."\r\n";
      	$out.= "Content-Type: application/x-www-form-urlencoded\r\n";
      	$out.= "Content-Length: ".strlen($post_string)."\r\n";
      	$out.= "Connection: Close\r\n\r\n";
      	$out .= $post_string;
      	fwrite($fp, $out);
      	fclose($fp);
	}
	else {

		$out="";
		foreach ($params as $key => &$val) {
			if (is_array($val)) $val = implode(',', $val);
			$post_params[] = $key.'='.urlencode($val);
      	}
      	$post_string = implode('&', $post_params);

      	$parts=parse_url($url);
		$fp = fsockopen ($url,443, $errno, $errstr, 15);
		$out ="POST /pdns/eval/trial_ng.php HTTP/1.1\r\n";
      	$out.= "Host: ".$parts['host']."\r\n";
      	$out.= "Content-Type: application/x-www-form-urlencoded\r\n";
      	$out.= "Content-Length: ".strlen($post_string)."\r\n";
      	$out.= "Connection: Close\r\n\r\n";
      	$out .= $post_string;
      	fwrite($fp, $out);
      	fclose($fp);





		/*
		// On Stage - do syncronous request
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://10.41.1.113/pdns/eval/trial_ng.php');
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
		echo $response
		*/
	}
}

?>
