AddActivity.php

<?php
//getting user values
$activity=$_POST['activity'];
$day=$_POST['day'];
 
//array of responses
$output=array();
//require database
require_once('db.php');
//insert activity
$conn=$dbh-> prepare('INSERT INTO weeklyactivities(activity,day) VALUES (?,?)');
   
//binding parameters	
	$conn-> bindParam(1,$activity);
	$conn->bindParam(2,$day);
 
	$conn->execute();
	if($conn->rowCount() == 0)
	{
	$output['error'] = true;
    $output['message'] = "Sorry, Unable to add activity. Try Again";
	}
	elseif($conn->rowCount() !==0){
	$output['error'] = false;
    $output['message'] = "Activity Successfully Added";
	}
		   echo json_encode($output);
?>