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
			foreach($_POST['checkbox'] as $del_version){ 
				echo "Row Deleted: ". $del_version;
				$sql = "DELETE FROM compatible_os WHERE operatingSystem = '{$del_version}'"; 
				sqlsrv_query($conn, $sql);
            }   
        }
	
	if(isset($_POST['add_row']) && isset($_POST['osadd'])){
		$operatingSystem = $_POST['osadd'];
		$sql = "INSERT INTO compatible_os (operatingSystem) VALUES ('{$operatingSystem}')";
		sqlsrv_query($conn, $sql);
	}
	
	
	
	
	
	
	
	
	//create sql statement
	$sql = "SELECT operatingSystem FROM compatible_os";
	
	//execute sql statement
	$stmt = sqlsrv_query($conn, $sql);
	//$bandwidths;

	?>
		<form method='post' action='edit_compatible_os_table.php'>
		<label for="osadd">Please type Operating System to be added below</label>
		<input type="text" name="osadd" value="" >
		
		<input name="add_row" type="submit" value="Add Compatible OS">
		</form>
        <form method='post' action='edit_compatible_os_table.php'>
            <div class='admin'>
				<table>       
					<tr>
						<th>DELETE</th>
						<th>Compatible OS</th>
					</tr>

                        <?php
				while($row=sqlsrv_fetch_array($stmt)){ ?>
					<tr align=center> 
						<td align="center" bgcolor="black">
							<input name="checkbox[]" type="checkbox" value="<?php echo $row['operatingSystem'];?>">
						</td>
						<td><?php echo $row['operatingSystem']; ?></td>
				<?php 
					echo"</tr>"; 
				}?> 

         <td ><input name="delete" type="submit" value="DELETE"></td>
        
            </table>
        </form>
    </div>