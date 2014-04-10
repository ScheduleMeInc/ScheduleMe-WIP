<?php

include("inc/caldav-client.php");

echo "connect to caldav server: ";

$cal = new CalDAVClient("https://p26-caldav.icloud.com/schedulemeinc@gmail.com/calendars", "schedulemeinc@gmail.com", "password");
$options = $cal->DoOptionsRequest();
print_r($options);

// Fetch all events for February
$events = $cal->GetEvents("20140401T000000Z","20140430T000000Z");
foreach ( $events AS $k => $event ) {
  echo( $event['data'] );
}



$acc = array();
$acc["google"] = array(
"user"=>"schedulemeinc@gmail.com",
"pass"=>"password",
"server"=>"ssl://www.google.com",
"port"=>"443",
"uri"=>"https://apidata.googleusercontent.com/caldav/v2/schedulemeinc@gmail.com/events/",
);

$account = $acc["google"];
$cal = new CalDAVClient( $account["uri"], $account["user"], $account["pass"], "", $account["server"], $account["port"] );
$options = $cal->DoOptionsRequest();
print_r($options);


?>