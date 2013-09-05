<?php
	//echo"<!DOCTYPE html>";
	//input = $_POST['test'];
	error_reporting(E_ALL | E_STRICT);
	ini_set('display_errors', true);
	//input data
	$operatingSystem = $_POST['operating_system'];
	$browser = $_POST['browser'];
	$popUpsEnabled = $_POST['pop_ups_enabled'];
	$flashVersion = $_POST['flash_version'];
	$dlbandwidthKbits = $_POST['dlBandwidth_kbits'];
	$ulbandwidthKbits = $_POST['ulBandwidth_kbits'];
	$cookiesEnabled = $_POST['cookies_enabled'];
	$dotNetVersion = $_POST['dotnet_version'];
	//$portsDomains = $_POST['ports_domains'];
	//echo "reached the post.php file"; for debug just in case
	/*echo $operatingSystem . "<br>";
	echo $browser . "<br>";
	echo $popUpsEnabled . "<br>";
	echo $flashVersion . "<br>";
	echo $dlbandwidthKbits . "<br>";
	echo $ulbandwidthKbits . "<br>";
	echo $cookiesEnabled . "<br>";
	echo $dotNetVersion . "<br>"; */
	
	//get database information
	include 'dbconnection/databaseinfo.php';
	
	//collect connection info
	$connectionInfo = array( "Database"=>$myDB, "UID"=>$myUser, "PWD"=>$myPass);
	
	
	//create connection to database
	$conn = sqlsrv_connect($myServer, $connectionInfo)
	or die("Couldn't connect to SQL Server on $myServer"); 
	
	//run sql insert of values
	$sql = "INSERT INTO dbo.diagnosticresults(operating_system, browser, pop_ups_enabled, flash_version, dlbandwidth_kbits, ulbandwidth_kbits, cookies_enabled, dotnet_version) VALUES('{$operatingSystem}', '{$browser}', '{$popUpsEnabled}', '{$flashVersion}', '{$dlbandwidthKbits}', '{$ulbandwidthKbits}', '{$cookiesEnabled}', '{$dotNetVersion}' )";
	
	$stmt = sqlsrv_query($conn, $sql);
	if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
	}
	echo "Successful upload of data";
	//echo "after dbhandle"; 
	//select a Db to work with
	//sqlsrv_query($conn)
	//or die("Couldn't open database $myDB");
	
	sqlsrv_close($conn);
	//echo"</html>";
?>