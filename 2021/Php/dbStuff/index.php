<html>
	  <head>
		<title>PHP Test</title>
	  </head>
	  <body>
		<?php 
		$db_host = 'dzone.mfac.edu.au';
		$db_name = '22-011112';
		$db_user = '22-011112';
		$db_password = 'McMahon';

		try{
			$db = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_password);
			return $db;
			echo 'conn made';
		}
		catch (PDOException $e){
			echo "rip" . $e->getmessage();
			die();
		}
	
		echo "asdasd";
		
		$sql = 'SELECT * FROM tblusers';
		$result=$db->query($sql);
		
		echo '<br> result - ' . $result;
		
		?>
	  </body>
	</html>