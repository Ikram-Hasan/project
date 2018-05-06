<?php
 require 'connect.php';
 include 'head.php';
 include 'date.php';
 if(isset($_GET['id'])){
	  $id = $_GET['id'];
	  $delSql = "DELETE FROM info WHERE id='$id'";
      $res = mysqli_query($con,$delSql);
	  if(!$res){
			echo 'Not delete';
		}else{
			header('Location: view.php');
		}
 }
?>



<section class="maincontent">

  
  <?php //echo ($_SERVER['PHP_SELF']);?>
  
  <p STYLE="COLOR:RED"> *REQUIRED FILES</p>
  
 <form action="index.php"  method="POST" > 
<?php                       
 $sql = "SELECT * FROM info";
 $result = mysqli_query($con,$sql);
 $num = mysqli_num_rows($result);
  if($num > 0){

?> 
	 <table border="4">
	  <thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Web</th>
			<th>Comment</th>
			<th>Gender</th>
			<th>Action</th>
		</tr>
	</thead>
		 <tbody>

		<?php
			$i = 1;
			while ($row = mysqli_fetch_assoc($result)) { 

		?>
			 <tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['web']; ?></td>
				<td><?php echo $row['comment']; ?></td>
				<td><?php echo $row['gender']; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
					<a onclick="return confirm('Are you sure to delete?');" href="?id=<?php echo $row['id']; ?>">Delete</a>
				</td>
			</tr>

			<?php
			$i++;
		 }
		?>
	   
	   
		
	</tbody>

	 </table>
	 <?php
       }else{
		   echo 'No data found';
	   }
	 ?>
	 
 </form>
  </section>
 <?php include 'foot.php'; ?>