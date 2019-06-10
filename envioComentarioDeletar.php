<?php
    //Chamado do conexão da pagina
    include 'setupSESSION.php';
    include 'setupConectaBanco.php';
    $pIdComentario = $_GET["idComentario"];
    
    $query_1 = "SELECT FK_Jogos_id_Jogo FROM comentarios WHERE id_Comentario='$pIdComentario'";
    $result_1 = mysqli_query($link, $query_1);

    //percorrimento das linhas retornadas pela query
    while (list($FK_Jogos_id_Jogo) = mysqli_fetch_row($result_1))
    {  
        $pIdJogo = $FK_Jogos_id_Jogo;
        $query = "DELETE FROM comentarios WHERE id_Comentario = $pIdComentario";
        if($link ->query($query) === TRUE)
        {
        
        }
        else
        {
            echo "<br>"."Erro: ".$query."<br>".$link->error;
        }
        $link->close();            
        echo "<script>
            window.location.href = 'mostraJogo.php?id=".$pIdJogo."';
        </script>";
    }
?>