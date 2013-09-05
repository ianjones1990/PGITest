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
				$sql = "DELETE FROM operating_systems WHERE userAgentValues = '{$del_name}'"; 
				sqlsrv_query($conn, $sql);
            }   
        }
	
	if(isset($_POST['add_row']) && isset($_POST['userAgentValues']) && isset($_POST['operatingSystems'])){
		$userAgentValues = $_POST['userAgentValues'];
		$operatingSystems = $_POST['operatingSystems'];
		echo "Row Added: ". $operatingSystems;
		$sql = "INSERT INTO operating_systems (userAgentValues, operatingSystems) VALUES ('{$userAgentValues}','{$operatingSystems}')";
		sqlsrv_query($conn, $sql);
	}
	
	
	
	
	
	
	
	
	//create sql statement
	$sql = "SELECT userAgentValues, operatingSystems FROM operating_systems";
	
	//execute sql statement
	$stmt = sqlsrv_query($conn, $sql);
	//$bandwidths;

	?>
		<form method='post' action='edit_os_table.php'>
		<label for="operatingSystems">Operating System</label>
		<input type="text" name="operatingSystems" value="">
		<label for="userAgentValues">UserAgent Values in browsers</label>
		<input type="text" name="userAgentValues" value="" >
		<input name="add_row" type="submit" value="Add Speed Threshold">
		</form>
        <form method='post' action='edit_os_table.php'>
            <div class='admin'>
				<table>       
					<tr>
						<th>DELETE</th>
						<th>Operating Systems</th>
						<th>UserAgent Value for OS</th>
					</tr>

                        <?php
				while($row=sqlsrv_fetch_array($stmt)){ ?>
					<tr align=center> 
						<td align="center" bgcolor="black">
							<input name="checkbox[]" type="checkbox" value="<?php echo $row['userAgentValues'];?>">
						</td>
						<td><?php echo $row['operatingSystems']; ?></td>
						<td><?php echo $row['userAgentValues']; ?></td>
				<?php 
					echo"</tr>"; 
				}?> 

         <td ><input name="delete" type="submit" value="DELETE"></td>
        
            </table>
        </form>
    </div>