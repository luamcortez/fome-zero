<?php

    include 'dbh.php';

    $sql = "SELECT * FROM tipo";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {		//Varre a tabela tipo e carrega as categorias nos botões
        if ($row['idtipo'] == 1) {
            echo '<button class="button-categoria button-categoria-active" id="';
            echo $row['idtipo'];
            echo '">';
            echo $row['categoria'];
            echo '<span class="circulo-menos-extra"><a>-</a></span>';
            echo "</button>";
        }else{
            echo '<button class="button-categoria" id="';
            echo $row['idtipo'];
            echo '">';
            echo $row['categoria'];
            echo '<span class="circulo-menos-extra"><a>-</a></span>';
            echo "</button>";
        }
    }
    mysqli_close($conn);
    
?>