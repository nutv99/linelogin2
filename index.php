<?php

$access_token = 'N0IzKf3n/tuu23eKxvUEkAY6Afzj8nu+lQYp+FyOAZXSVofsrCArcwRBOJKEbssASNnN5S35vUE5yiQ3dPcvlRqu9G0IVPHVxUHUHW63dUUUdxfcWpbZUj7iu8ImPFKK8LnAdy5wGDxvMhUD1A1fugdB04t89/1O/w1cDnyilFU='; 


$sValue= getInputMessage() ;
$MessageInput = $sValue[0];  
$replyToken =  $sValue[1];  
$userID = $sValue[2] ;



$contact9 = $sValue[0] ;
//$result = getPortImageURL($contact9,$userID) ;
//$str    = getPortDataString($contact9) ;
$resultAr = explode("|",$result); 


if (trim($resultAr[0]) == "Fail") {
  //pushMessage($resultAr[1],$access_token,$replyToken) ; 
  return;
}  else {
  $ImageFileName = $result ; 
  //pushImage($ImageFileName,$access_token,$replyToken);  
  //pushMessage($str,$access_token,$replyToken) ; 
}



return;
 
 
function getInputMessage() { 


$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'] ;  
		
			$sValue[] = $text;
			$sValue[] = $replyToken ;  
			$sValue[] = $event['source']['userId'];  
			return $sValue;
			
		}
	}
}
    
} // end func 
