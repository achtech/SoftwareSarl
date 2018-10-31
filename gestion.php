	<?php 
		require_once('functions.php');
		$listUsers = getAllUser();				
		//print_r($listUsers);
		for( $i=0;$i<count($listUsers);$i++){
			//echo $listUsers[$i]['classCss'];
			$user = $listUsers[$i];
			if(isset($_REQUEST['idButton_'.$user['id']]) && !empty(isset($_REQUEST['idButton_'.$user['id']]))){
				 $id = $user['id'];
				 $date = date("Y-m-d");
				 $timeClick = date("H:i:s");
					$idLogs = 0;
				 if($listUsers[$i]['classCss'] === "danger"){
				 	$color = "success";
				 	$idLogs = addTimeIn($id,$date,$timeClick); 
				 }else {
					$color = "danger";
					$idLogs =  getValeurChamp('idLogs','users','id',$id);
					addTimeOut($idLogs,$timeClick);
				 } 
				 updateColor($id,$color,$idLogs);	
			}
		}
		redirect("index2.php");
	?>
