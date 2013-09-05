<?php        

	include '../dbconnection/databaseinfo.php';
	include 'includes_admin_navigation.php';
	$connectionInfo = array( "Database"=>$myDB, "UID"=>$myUser, "PWD"=>$myPass);
	
	//open connection and return error in that case
	$conn = sqlsrv_connect($myServer, $connectionInfo)
	or die("Couldn't connect to SQL Server on $myServer");
	
	
	//put delete first so page uploads on next try
	//check delete button is pressed
	if (isset($_POST['delete']) && isset($_POST['checkbox'])) {
			foreach($_POST['checkbox'] as $del_name){ 
				echo "Row Deleted: ". $del_name;
				$sql = "DELETE FROM bandwidth_threshold_files WHERE speedThreshold = '{$del_name}'"; 
				sqlsrv_query($conn, $sql);
            }   
        }
	
	if(isset($_POST['add_row']) && isset($_POST['speedThreshold']) && isset($_POST['fileToDownload']) && isset($_POST['fileSize']) ){
		echo "entered the add if";
		$speedThreshold = $_POST['speedThreshold'];
		$fileToDownload = $_POST['fileToDownload'];
		$fileSize = $_POST['fileSize'];
		$sql = "INSERT INTO bandwidth_threshold_files (speedThreshold, fileToDownload, fileSize) VALUES ('{$speedThreshold}','{$fileToDownload}','{$fileSize}')";
		sqlsrv_query($conn, $sql);
	}
	
	
	
	
	
	
	
	
	//create sql statement
	$sql = "SELECT speedThreshold, fileToDownload, fileSize FROM bandwidth_threshold_files ORDER BY speedThreshold";
	
	//execute sql statement
	$stmt = sqlsrv_query($conn, $sql);
	//$bandwidths;

	?>
		<form method='post' action='edit_bandwidth_thresholds_files_table.php'>
		<label for="speedThreshold">Speed of Kbits of Threshold</label>
		<input type="text" name="speedThreshold" value="" >
		<label for="fileToDownload">FileName of Download</label>
		<input type="text" name="fileToDownload" value="">
		<label for="fileSize">Size in bytes</label>
		<input type="textarea" name="fileSize" value="" >
		<input name="add_row" type="submit" value="Add Speed Threshold File">
		</form>
        <form method='post' action='edit_bandwidth_thresholds_files_table.php'>
            <div class='admin'>
				<table>       
					<tr>
						<th>DELETE</th>
						<th>Name of Activity</th>
						<th>Speed Threshold (Kbits)</th>
						<th>Sample Scenario</th>
					</tr>

                        <?php
				while($row=sqlsrv_fetch_array($stmt)){ ?>
					<tr align=center> 
						<td align="center" bgcolor="black">
							<input name="checkbox[]" type="checkbox" value="<?php echo $row['speedThreshold'];?>">
						</td>
						<td><?php echo $row['speedThreshold']; ?></td>
						<td><?php echo $row['fileToDownload']; ?></td>
						<td><?php echo $row['fileSize']; ?></td>
				<?php 
					echo"</tr>"; 
				}?> 

         <td ><input name="delete" type="submit" value="DELETE"></td>
        
            </table>
        </form>
    </div>