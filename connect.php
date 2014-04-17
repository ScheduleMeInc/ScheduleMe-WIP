<?php

include("inc/caldav-client.php");

echo "connect to caldav server: ";

$urlPath =  "https://caldav.icloud.com/"; //"https://p26-caldav.icloud.com/";
$email = "schedulemeinc@gmail.com";
$pwd = "Testitn0w";

$cal = new CalDAVClient($urlPath, $email, $pwd);
$options = $cal->DoOptionsRequest();
print_r($options);


if ( isset($options["PROPFIND"]) ) {
  // Fetch some information about the events in that calendar
  $cal->SetDepth(1);
  $folder_xml = $cal->DoXMLRequest("PROPFIND", '<?xml version="1.0" encoding="utf-8" ?><propfind xmlns="DAV:"><prop><getcontentlength/><getcontenttype/><resourcetype/><getetag/></prop></propfind>' );
  
  echo("<br /><br />() ".$folder_xml."<br /><br />");
}



// Fetch all events for February
echo("<p>Get Events</p>");
$events = $cal->GetEvents("20140401T000000Z","20140430T000000Z");
print_r($events);
/*
foreach ( $events AS $k => $event ) {
  echo( $event['data'] ."<br />" );
}
*/





$acc = array();
$acc["google"] = array(
"user"=>"schedulemeinc@gmail.com",
"pass"=>"password",
"server"=>"ssl://www.google.com",
"port"=>"443",
"uri"=>"https://apidata.googleusercontent.com/caldav/v2/schedulemeinc@gmail.com/events/",
);

$account = $acc["google"];
//$cal = new CalDAVClient( $account["uri"], $account["user"], $account["pass"], "", $account["server"], $account["port"] );
//$options = $cal->DoOptionsRequest();
//print_r($options);


?>