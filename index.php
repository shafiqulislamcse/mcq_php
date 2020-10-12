<?php 
	include('connection.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>MCQ</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		
		.yes{
			font-family: sans-serif;
			font-weight: 500;
			color: green;
		}
.no{
	font-family: sans-serif;
	font-weight: 500;
	color: red;
}
.opt{
	cursor: pointer;
}
.para{
	cursor: pointer;
}
	</style>
</head>
<body>

	<p class="para">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites<a href="www.nccitbd.com"> of the word in classical</a> literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>

<button type="button">click me</button>

	<form method="post">
		<label>options - A</label>
		<input type="text" name="optons[]" required>

		<label>correct or not</label>
		<select name="cornot[]">
			<option value="0">False</option>
			<option value="1">True</option>
		</select>
		<br><br>
		<label>options - A</label>
		<input type="text" name="optons[]" required>

		<label>correct or not</label>
		<select name="cornot[]">
			<option value="0">False</option>
			<option value="1">True</option>
		</select>
		<br><br>
		<label>options - A</label>
		<input type="text" name="optons[]" required>

		<label>correct or not</label>
		<select name="cornot[]">
			<option value="0">False</option>
			<option value="1">True</option>
		</select>
		<br><br>
		<label>options - A</label>
		<input type="text" name="optons[]" required>

		<label>correct or not</label>
		<select name="cornot[]">
			<option value="0">False</option>
			<option value="1">True</option>
		</select>
		<br><br>
		<input type="submit" name="submit" value="submit">
	</form><br><br><br><br>
	<button id="rbtn">Reading mode</button>
	<br><br>
	<?php 
		$query = "select * from questions";
		$result = mysqli_query($conn, $query);

		while($row = mysqli_fetch_assoc($result)){

			$id = $row['q_id'];
			echo "<b>".$row["question"]."</b>";
			echo "<br>";

			if ($result) {
				$query2 = "select * from options where q_id = '$id'";
				$result2 = mysqli_query($conn,$query2);
				while($row2 = mysqli_fetch_assoc($result2)){
					$opt = $row2['options'];
					$c_opt = $row2['correct_ans'];

					?>
					<p class="opt <?php if($c_opt == 0){echo'wrong';}else{echo'right';}?>">@@ <?php echo $opt;?></p>	

					<?php
				}
			}
		}
	 ?>


	 <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

	 <script type="text/javascript">
	 	
	 		 $('document').ready(function(){
	 		 	$('.opt').click(function(){

	 		 		if($(this).hasClass('right')){
	 		 			$(this).addClass('yes');
	 		 		}else{
	 		 			$(this).addClass('no');

	 		 		}	
	 		 	});

	 		 	$('.para').click(function(){
	 		 		$(this).css('pointer-events','none');
	 		 	});


	 		 });
		        
		      
	 </script>
</body>
</html>

<?php 
	if (isset($_POST['submit'])) {
		 $opt = $_POST['optons'];
		 $cornot = $_POST['cornot'];

		 $count = 4;

		 for($i=0;$i<$count;$i++){
		 	$q = "insert into test (options,cornot) values ('{$_POST["optons"][$i]}','{$_POST["cornot"][$i]}')";

			$run_q = mysqli_query($conn, $q);
		 }

		
	}
 ?>