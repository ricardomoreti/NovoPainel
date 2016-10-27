<?php
	//CONEXÃO PDO
	$conn = 'mysql:host=localhost;dbname=painel';

	try {
		$db = new PDO($conn, 'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		if($e->getCode() == 1049){
			echo "Erro no banco de dados Painel ADM";
		}else{
			echo $e->getMessage();
		}
	}
?>
