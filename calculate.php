<?php 
if(isset($_POST['saif'])){
	$firstNum = $_POST['firstNum'];
	$second_number = $_POST['second_number'];
	$operator = $_POST['operator'];
	$result = 0;
	
	if($operator == "+"){
		$result = $firstNum + $second_number; 
	}else if($operator == "-"){
		$result = $firstNum - $second_number; 
	}else if($operator == "*"){
		$result = $firstNum * $second_number; 
	}else{
		if($second_number != '0'){
			$result = $firstNum / $second_number; 
		}else{
			$result = "Math Error";
		}
		
	}
	
}
?>

	<div align="center">
	<form method = "POST" action="">
		<table border="1px solid" style="margin-top : 25px;background-color : #EDEDED;padding : 20px">
			<tr>
              <td>First Number : </td>
              <td><input type="number" name="firstNum" placeholder="Enter The First Number"></td>
			</tr>
			<tr>
              <td>Second Number : </td>
              <td><input type="number" name="second_number" placeholder="Enter The Second Number"></td>
			</tr>
			<tr>
              <td>Operator</td>
              <td>
                <select name="operator" style="width: 100%;">
                  <option value='+'>+</option>
                  <option value='-'>-</option>
                  <option value='*'>*</option>
                  <option value='/'>/</option>
                </select>
              </td>
			</tr>
			<tr>
				<td></td>
              <td><input type="submit" name="saif" value="Submit"></td>
			</tr>
			<tr>
              <td>Result : </td>
              <td><input type="text" name="result" value="<?php if(isset($result)){echo $result;}?>"></td>
			</tr>
		</table>
	</form>
	</div>
 