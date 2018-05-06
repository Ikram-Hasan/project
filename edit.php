<?php
 require 'connect.php';
 include 'head.php';
 include 'date.php';
 
 $id = $_GET['id'];
 
 $sql = "SELECT * FROM info WHERE id = '$id'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
?>



<section class="maincontent">
  <?php                       

  //form validation of php 
  $errname = $erremail = $errwb = $errcomment = $errgender ="";
  $name = $email = $web = $comment = $gender="";
  
  if(isset($_POST['update'])){
		$infoid =    mysqli_real_escape_string($con,$_POST['id']);
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
     
	 $updateSql = "UPDATE info SET name = '$name',email = '$email',web = '$web',comment = '$comment' ,gender= '$gender' WHERE id = '$infoid'";
		
		$result = mysqli_query($con,$updateSql);
		if(!$result){
			header('Location: edit.php');
			$msg = "Problem";
			echo $msg;
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
  <p STYLE="COLOR:RED"> 
  
  </p>
  <p STYLE="COLOR:RED"> *REQUIRED FILES</p>
  
 <form action=""  method="POST" >  
	 <table>
	 <tr>
	 <td> name </td>
	 <td style="color:red"> 
	  <input type="text" name="name" value="<?php echo $row['name'];?>" required>*<?php echo $errname ?> 
	  <input type="hidden" name="id" value="<?php echo $row['id'];?>" required>
	  
	  </td>
	 </tr>
	 
	 <tr>
	 <td> E-mail </td>
	 <td style="color:red"> <input type="text" name="email" value="<?php echo $row['email'];?>" required>*<?php echo $erremail ?> </td>
	 </tr>
	 
	 <tr>
	 <td> website </td>
	 <td style="color:red"> <input type="text" name="web" value="<?php echo $row['web'];?>" required>*<?php echo $errwb ?> </td>
	 </tr>
	 
	 <tr>
	 <td> comment </td>
	 <td> <textarea name="comment"  cols="30" rows="5"><?php echo $row['comment'];?></textarea>*<?php echo $errcomment ?> </td>
	 </tr>
	 
	 <tr>
	 <td> Gender - <?php echo $row['gender'];?></td>
	 <td> <input type="radio" name="gender" value="female" required>female
		 <input type="radio" name="gender" value="male" required>male 
	 </td> 
	 </tr>
	 
	 <tr>
	 <td> </td>
	 <td> <input type="submit" name="update" value="Update"> <input type="reset" value="reset"> </td> 
	 </tr>
		 
	 
	 </table>
	 
 </form>
  </section>
 <?php include 'foot.php'; ?>