<!DOCTYPE html>
<?php
	function load(){                	
		$servername = "localhost";
       	$username = "root";
       	$password = "123";
       	// Create connection
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
	    		die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "SELECT * FROM trainer_test.player";
        $result = $conn->query($sql);
		if ($result->num_rows > 0) {
           		// output data of each row
           		while($row = $result->fetch_assoc()) {
					 $response=$response." - ".$row["player_Name"]." : ".$row["player_Score"];
	     		}
       	} else {
           		return "0 results";
       	}
   		mysqli_close();
		return $response;
	}
	function save($inp){
		$servername = "localhost";
       	$username = "root";
       	$password = "123";
       	// Create connection
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
	    		die("Connection failed: " . $conn->connect_error);
		} 
		if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "UPDATE trainer_test.player SET player_Score=player_Score+5 WHERE player_Name= '" .$inp."'";
		if ($conn->query($sql) === TRUE) {echo "Record updated successfully";}
		else {echo "Error updating record: " . $conn->error;}
        $conn->close();
 	 }
     switch($_POST['functionname']) {
	            case 'save':
				   save($_POST[arguments]);
	               $aResult['result'] = load();
	               break;
	            default:
	               $aResult['result']='Start'.$_POST['functionname'].'!';
	               break;
      }
      json_encode($aResult);
?>
