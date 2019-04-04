<?php

    include 'dbh.php';

    $id = $_POST["tipo_idtipo"];

    $sql = "SELECT * FROM produto WHERE tipo_idtipo = $id";
    $result = mysqli_query($conn, $sql);
    $dados = array();

	while($row = mysqli_fetch_assoc($result)){
		$dados[] = $row;
	}

    echo json_encode($dados);

    $conn->close();
?>