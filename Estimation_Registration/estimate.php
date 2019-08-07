<?php 
// Connect to database
	$connection=mysqli_connect('localhost','root','','testdb');
   if (isset($_POST['submit'])) {
	
		global $connection;
		$size=$_POST["size"];
		$from=$_POST["from"];
		$to=$_POST["to"];
		 $date=$_POST["date"];
		 echo("before");
		$query="INSERT INTO estimates( Size, Start, End, Time) VALUES('.$size','.$from','.$to','.$date');";
		echo("insetred");
		if(mysqli_query($connection, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'estimate Added Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'estimate Addition Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}