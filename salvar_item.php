<?php
        include 'dbh.php';

        $item = "";
        $valor = "";
        $descricao = "";
        $tipo_idtipo = "";
    
        $item = mysqli_real_escape_string($conn, $_POST['item']);
        $valor = mysqli_real_escape_string($conn, $_POST['valor']);
        $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
        $tipo_idtipo = mysqli_real_escape_string($conn, $_POST['tipo_idtipo']);
    
        if ($item == "" || $valor = ""){
            
            $conn->close();
    
        }else{
            $sql = "INSERT INTO produto ( nome, valor, descricao, tipo_idtipo ) VALUES ('$item', '$valor', '$descricao', '$tipo_idtipo')";
            $insert = $conn->query($sql);
    
            if( $insert ){
                echo "O item " . $item . " foi adicionado";
    
            }else{
                die("Erro: {$conn->errno} : {$conn->error}");
            }
            
            mysqli_close($conn);
        }
?>