<?php 
 $font="verdana";
$bcolor= "#444"; 
$fontcolor= "#fcbc41";
$fonts= "i dont love hucking";
?>

<!doctype html>
<html>

<head>
<title> php syntax </title>
</head>
<style>
        body{font-family:<?php echo $font ?>;}
		.phpcoding{width: 960px; background:<?php echo "#ddd"; ?>; margin: 0 auto;}
		.header,.footer{background:<?php echo $bcolor?>; color:<?php echo $fontcolor ?>; text-align: center; padding: 10px;  }
		
		.header h2, .footer h2{margin: 0; padding: 0;}
		.maincontent{min-height:400px; padding: 20px;}
		input[type="text"]{width:200px;}
</style>

<body>
 
 <div class="phpcoding">
 <section class="header">
 
 <h2><?php echo "Hy i'm saif" ?></h2>
 <h3><a href="index.php">Add</a>  | <a href="view.php">View</a> </h3>
 </section>
