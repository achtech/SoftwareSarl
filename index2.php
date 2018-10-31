<html>
<head>
	<?php 
		require_once('functions.php');
		if(!isset($listUsers) ){
			$listUsers = getAllUser();				
		}
		//print_r($listUsers);
	?>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>gestion de pointage du personnel </title>
	<style>
		.design-buttons{
		    width: 250px;
		    height: 150px;
		}
	</style>
</head>
<body>
	<div class="jumbotron text-center">
	  <h1>gestion de pointage du personnel</h1>
	</div>

	<div class="col-sm-3">
	  <form method="POST" action="gestion.php">
	  <?php 
		for( $i=0;$i<count($listUsers);$i++){
			$user = $listUsers[$i];	
			if(($i%2) ==0 && $i>1 ) { echo "</div><div class='col-sm-3'>";}
		?>
		<input type="submit" name="<?php echo 'idButton_'.$user['id'];?>"  class="btn btn-<?php echo $user['classCss'];?> design-buttons" value="<?php echo $user['nom'];?>"
		></input><br/><br/>
		<?php } ?>
		</form>
	   </div>
	
</body>
</html>