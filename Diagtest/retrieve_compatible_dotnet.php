<?php
	//database information
	include 'dbconnection/databaseinfo.php';
	
	$connectionInfo = array( "Database"=>$myDB, "UID"=>$myUser, "PWD"=>$myPass);
	
	//open connection and return error in that case
	$conn = sqlsrv_connect($myServer, $connectionInfo)
	or die("Couldn't connect to SQL Server on $myServer");
	
	//create sql statement
	$sql = "SELECT * FROM compatible_dotnet_versions";
	
	//execute sql statement
	$stmt = sqlsrv_query($conn, $sql);
	//$bandwidths;
	while($row = sqlsrv_fetch_array($stmt)){
		echo $row[0] . "#";
	}
	
	if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
	}
	
	sqlsrv_close($conn);
?>