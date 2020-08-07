<?php
// Step 1
$cSession = curl_init(); 
// Step 2
curl_setopt($cSession,CURLOPT_URL,"http://open.mapquestapi.com/directions/v2/optimizedroute?key=8xGh2RLW6ZtzPegw9gVbv4MFasaSZ6nk");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false); 
// Step 3
$result=curl_exec($cSession);
// Step 4
curl_close($cSession);
// Step 5
echo $result;
?> 

