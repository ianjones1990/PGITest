<?php 
   $socket = @fsockopen("xoxoxoxoxoxoxxoxo", "443", $errorNo, $errorStr, 30);
   if(!$socket) {
   echo "offline";
   fclose($socket);
   }
     else{ 
	 echo "online";
	 fclose($socket);
	 }
?>