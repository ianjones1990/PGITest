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
				$sql = "DELETE FROM bandwidth_speed WHERE speedThresholdName = '{$del_name}'"; 
				sqlsrv_query($conn, $sql);
            }   
        }
	
	if(isset($_POST['add_row']) && isset($_POST['speedThresholdName']) && isset($_POST['speedThresholds']) && isset($_POST['sampleScenario']) ){
		echo "entered the add if";
		$speedThresholdName = $_POST['speedThresholdName'];
		$speedThresholds = $_POST['speedThresholds'];
		$sampleScenario = $_POST['sampleScenario'];
		echo $speedThresholdName;
		echo $speedThresholds;
		echo $sampleScenario;
		$sql = "INSERT INTO bandwidth_speed (speedThresholdName, speedThresholds, sampleScenario) VALUES ('{$speedThresholdName}','{$speedThresholds}','{$sampleScenario}')";
		sqlsrv_query($conn, $sql);
	}
	
	
	
	
	
	
	
	
	//create sql statement
	$sql = "SELECT speedThresholdName, speedThresholds, sampleScenario FROM bandwidth_speed";
	
	//execute sql statement
	$stmt = sqlsrv_query($conn, $sql);
	//$bandwidths;

	?>
		<form method='post' action='edit_bandwidth_speed_table.php'>
		<label for="speedThresholdName">Name of activity</label>
		<input type="text" name="speedThresholdName" value="" >
		<label for="speedThresholds">Speed in kbits that activity requires</label>
		<input type="text" name="speedThresholds" value="">
		<label for="sampleScenario">A sample scenario of given activity</label>
		<input type="textarea" name="sampleScenario" value="" >
		<input name="add_row" type="submit" value="Add Speed Threshold">
		</form>
        <form method='post' action='edit_bandwidth_speed_table.php'>
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
							<input name="checkbox[]" type="checkbox" value="<?php echo $row['speedThresholdName'];?>">
						</td>
						<td><?php echo $row['speedThresholdName']; ?></td>
						<td><?php echo $row['speedThresholds']; ?></td>
						<td><?php echo $row['sampleScenario']; ?></td>
				<?php 
					echo"</tr>"; 
				}?> 

         <td ><input name="delete" type="submit" value="DELETE"></td>
        
            </table>
        </form>
    </div>