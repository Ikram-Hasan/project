<?php

 
  if($_SERVER['REQUEST_METHOD'] == "POST")
    {
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$web = $_REQUEST['web'];
		$comment = $_REQUEST['comment'];
		$gender = $_REQUEST['gender'];
		
		$sql = "INSERT INTO info (name,email,web,comment,gender) VALUES ('$name','$email','$web','$comment','$gender')";
		
		$result = mysqli_query($con,$sql);
		if(!$result){
			header('Location: saif.php');
		}else{
			echo 'Done';
		}
	}
?>

