<?php 
   $socket1 = @fsockopen("193.84.26.213", "443", $errorNo, $errorStr, 30);
  if(!$socket1) {
   echo "offline";
   fclose($socket1);
   }
     else{ 
	 echo "online";
	 fclose($socket1);
	 }
?>