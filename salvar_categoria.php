<?php
    include 'dbh.php';

    $categoria = "";

    $categoria = htmlspecialchars($_POST["categoria"]);

    if ($categoria == ""){
        
        $conn->close();

    }else{
        $sql = "INSERT INTO tipo ( categoria ) VALUES ('$categoria')";
        $insert = $conn->query($sql);

        if( $insert ){
            echo "A categoria " . $categoria . " foi adicionada";

        }else{
            die("Erro: {$conn->errno} : {$conn->error}");
        }
        
        mysqli_close($conn);
    }
    
?>