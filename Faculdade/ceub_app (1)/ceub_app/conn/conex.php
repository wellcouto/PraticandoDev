<?php 



try {
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=ceub_aplicacao2', 'root', 'ceub123456');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec("SET CHARACTER SET utf8");
}catch(PDOException $erro){
	echo "error: " . getMessage();
}




	
?>
