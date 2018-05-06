<?php
 require 'connect.php';
 include 'head.php';
 include 'date.php';
?>



<section class="maincontent">
  <?php                       //form validation of php 
  $errname = $erremail = $errwb = $errcomment = $errgender ="";
  $name = $email = $web = $comment = $gender="";
  
  if(isset($_POST['submit'])){
		$name =    mysqli_real_escape_string($con,$_POST['name']);
		$email =   mysqli_real_escape_string($con,$_POST['email']);
		$web =     mysqli_real_escape_string($con,$_POST['web']);
		$comment = mysqli_real_escape_string($con,$_POST['comment']);
		if(isset($_POST['gender'])){
		 $gender =  mysqli_real_escape_string($con,$_POST['gender']);
		}
		

	 if(empty($name)){
		  $errname = "<span style='color: red'> name is requred </span>";
	 } else {
		 $name = validate($name);
	 }
	 
	  if(empty($email)){
		  $erremail = "<span style='color: red'> email is requred </span>";
	  }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		   $erremail = "<span style='color: red'> invalid email format </span>";
	 }else {
		 $email = validate($email);
	 }
	 
	  if(empty($web)){
		 $errwb = "<span style='color: red'> web is requred </span>";
	 } elseif(!filter_var($web,FILTER_VALIDATE_URL)){
		   $errwb = "<span style='color: red'> invalid url format </span>";
	 }else {
		$web  = validate($web);
	 }
   
	  if(isset($gender) && empty($gender)){
		  $errgender = "<span style='color: red'> gender is requred </span>";
	 } 
	 
 	 $comment = validate($comment);
     
	 $sql = "INSERT INTO info (name,email,web,comment,gender) VALUES ('$name','$email','$web','$comment','$gender')";
		
		$result = mysqli_query($con,$sql);
		if(!$result){
			header('Location: saif.php');
		}else{
			header('Location: view.php');
		}
 }
 
 function validate($data){
	 $a = trim($data);
	 $b = stripcslashes($a);
	 $c = htmlspecialchars($b);
 return $c;  
 }

?>
  
  <?php //echo ($_SERVER['PHP_SELF']);?>
  
  <p STYLE="COLOR:RED"> *REQUIRED FILES</p>
  
 <form action="saif.php"  method="POST" >  
	 <table>
	 <tr>
	 <td> name </td>
	 <td style="color:red"> <input type="text" name="name" required>*<?php echo $errname ?> </td>
	 </tr>
	 
	 <tr>
	 <td> E-mail </td>
	 <td style="color:red"> <input type="text" name="email" required>*<?php echo $erremail ?> </td>
	 </tr>
	 
	 <tr>
	 <td> website </td>
	 <td style="color:red"> <input type="text" name="web"required>*<?php echo $errwb ?> </td>
	 </tr>
	 
	 <tr>
	 <td> comment </td>
	 <td> <textarea name="comment"  cols="30" rows="5"> </textarea>*<?php echo $errcomment ?> </td>
	 </tr>
	 
	 <tr>
	 <td> Gender </td>
	 <td> <input type="radio" name="gender" value="female" required>female
		 <input type="radio" name="gender" value="male" required>male 
	 </td> 
	 </tr>
	 
	 <tr>
	 <td> </td>
	 <td> <input type="submit" name="submit" value="submit"> <input type="reset" value="reset"> </td> 
	 </tr>
		 
	 
	 </table>
	 
 </form>
  </section>
 <?php include 'foot.php'; ?>