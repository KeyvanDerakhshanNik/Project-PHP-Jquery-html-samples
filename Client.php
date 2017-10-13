<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>click demo</title>
	    <style>
		body {
			background-color: darkblue;
			text-align: center;
			}
        .button{
			font-size: 50px; 
    		font-weight: bold;
    		font-family: italic;
			background-color: gray;
 		    cursor: pointer;
			}
			.button:hover {
		       background: yellow;
        	}
			h1{
				font-size: 50px;
				font-family: italic; 
			}
        </style>
	    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
 	</head>

	<body>
	<h1 style="color:white;">Keyvan Derakhshan Nik</h1>
	<form action="/Client.php">
          <input class="button"type="submit" name="Tom" value="Tom" onclick="inc(this);">
		  <input type="submit" name="VS" value="VS";">
          <input class="button"type="submit" name="Jerry" value="Jerry"onclick="inc(this);"><br>
	       
    </form>
	<?php
		include ("Server.php");
		$r=load();
		echo '<q style="color:white; font-size:30px;font-family:italic">'.$r.'</q>';
	?>
    <script>
		function inc(objButton){
			$.ajax({
    				type: "POST",
   			    	url: 'Server.php',
    				dataType: 'json',
    				data: {functionname:'save', arguments:objButton.value},
    				success: function (obj) {
                  			if( !('error' in obj) ) {
                      				 alert(obj.result);
                  			}
                  			else {
					             alert("Error");                      			
							     console.log(obj.error);
                  			}
            		}});
		}
       	</script>
	</body>
</html>
