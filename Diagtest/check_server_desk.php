<?php 
   $socket2 = @fsockopen("193.84.26.120", "443", $errorNo, $errorStr, 30);
   if(!$socket2) {
   echo "offline";
   fclose($socket2);
   }
     else{ 
	 echo "online";
	 fclose($socket2);
	 }
?>