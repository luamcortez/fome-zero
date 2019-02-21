<?php 

	// inclui o arquivo de inicialização
	require 'init.php';
	 
	// resgata variáveis do formulário
	$email = isset($_POST['nome']) ? $_POST['nome'] : '';
	$password = isset($_POST['senha']) ? $_POST['senha'] : '';
	 
	if (empty($email) || empty($password))
	{
	    echo "Informe email e senha";
	    exit;
	}

	$PDO = db_connect();
	 
	$sql = "SELECT * FROM login WHERE usuario = :nome AND senha = :senha";
	$stmt = $PDO->prepare($sql);
	 
	$stmt->bindParam(':nome', $email);
	$stmt->bindParam(':senha', $password);
	 
	$stmt->execute();
	 
	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
	 
	if (count($users) <= 0)
	{
	    echo "Email ou senha incorretos";
	    exit;
	}
	 
	// pega o primeiro usuário
	$user = $users[0];
	 
	session_start();
	$_SESSION['logged_in'] = true;
	$_SESSION['id'] = $user['id'];
	$_SESSION['user_name'] = $user['name'];
	
	switch ($email) {
	 	case 'cliente':
	 		header('Location: cardapio.php');
	 		break;
	 	case 'restaurante':
	 		header('Location: fila_pedidos.php');
	 		break;
	 	default:
	 		header('Location: index.php');
	 		break;
	 }
?>