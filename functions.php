<?php 
function connect () {

	$connect = @mysql_connect('localhost','root','');
	mysql_select_db('pointages_software');
}	
	
				
function doQuery ($querystring) {	
		
	connect ();
	
	$query=$querystring ;
				
	$result = mysql_query ($query) or die(mysql_errno()) ;
	
		if(!$result) {
		
			$m = "Erreur Exe. SQL";
		
			return $msg;
		}
	
	return $result ;
					
}

function redirect($url){
?>
	<script language="javascript" type="text/javascript">
			document.location.href = "<?php echo $url ?>";
	</script>
<?php
}
function formuler_where($champs,$valeurs){

	if (($champs != "") and ($valeurs != "")){
	
		$tab_champs = explode(',',$champs);
		$tab_valeurs = explode(',',$valeurs);
		
		$chaine = "";
		
		for($i=0;$i<sizeof($tab_champs);$i++){
			$chaine .= $tab_champs[$i] ."='". $tab_valeurs[$i] ."' and ";
		}
		
		$chaine = substr($chaine,0,strlen($chaine)-1);
	}
	else
	{
		$chaine;
	}
	
	return $chaine;
}

function getValeurChamp($champ1,$table,$champ2,$valeur){
	
	$where = formuler_where($champ2,$valeur);	
	  
	$sql="select ". $champ1."  
			from ". $table."
			where ". $where ." 1=1";
	$res= doQuery($sql); 
	
	if(mysql_num_rows($res) != 0){
		$ligne = mysql_fetch_array($res) or die(mysql_error());
		return $ligne[$champ1];
	}
	else
		return "";
			
}

function begin(){
	doQuery("BEGIN");
}

function commit(){
	doQuery("COMMIT");
}

function rollback(){
	doQuery("ROLLBACK");
}

function addTimeIn($idUser,$dateTime,$timeIn){
		connect();
		echo $sql = "insert into logs(id_personnels,dateOperation,timeIn,timeOut) values(".$idUser.", '".$dateTime."','".$timeIn."','".$timeIn."')";
		doQuery($sql);
		
		$id =  mysql_insert_id();
		commit();
		return $id;
}

function addTimeOut($id,$timeOut){
		connect();
		echo $sql = "update logs set timeOut='".$timeOut."' where id=".$id;
		doQuery($sql);
		commit();
}

function getAllUser(){
		connect();
		$sql = "select * from users";
		$res1 = doQuery($sql);
		$result = [];
		$nb1 = mysql_num_rows($res1);
		$i=0;
		if( $nb1==0){
			echo _VIDE;
		}
		else
		{
			while ($l = mysql_fetch_array($res1))
			{
				$result[$i] = $l;
				$i=$i+1;
			}
		}
		return $result;
}

function getDurationByUser($idPersonnel){
		connect();
		$sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, `timeIn`,`timeOut`))  as totalInMinute FROM `logs`where id_personnels=".$idPersonnel;
		$res1 = doQuery($sql);
		$totalInMinute = 0;
		$nb1 = mysql_num_rows($res1);
		if( $nb1==0){
			echo _VIDE;
		}
		else
		{
			while ($l = mysql_fetch_array($res1))
			{
				$totalInMinute = $l['totalInMinute']; 
			}
		}
		$totalInHour = $totalInMinute/60;
		return $totalInHour;
}

function updateColor($idPersonnel,$color,$idLog){
		connect();
		echo $sql = "update users set classCss='".$color."',idLogs=".$idLog." where id=".$idPersonnel;
		$res1 = doQuery($sql);
		commit();
}
?>