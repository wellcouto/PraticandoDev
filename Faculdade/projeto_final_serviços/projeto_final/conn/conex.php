<?php 



try {
	$pdo = new PDO('mysql:host=localhost:3307;dbname=loja', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec("SET CHARACTER SET utf8");
}catch(PDOException $erro){
	echo "error: " . getMessage();
}




	
?>
