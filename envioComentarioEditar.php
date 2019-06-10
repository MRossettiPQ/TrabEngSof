<?php
    //Chamado do conexão da pagina
    include 'setupSESSION.php';
    include 'setupConectaBanco.php';
    $pIdComentario = $_GET["idComentario"];
    
    if((empty($_POST["comentarioNovo"])) || (empty($_POST["notaNova"])))
    {        
        echo "<script>
            alert('Os campos comentario e nota são obrigatorios.');
            window.history.back();
        </script>";
    }
    else
    { 
        $pComentario = $_POST["comentarioNovo"];
        $pNota = $_POST["notaNova"];

        $query = "UPDATE comentarios SET comentario='$pComentario',nota='$pNota' WHERE id_Comentario=$pIdComentario";
        //QUERY INFORMAÇÕES COMENTARIOS

        $query_1 = "SELECT FK_Jogos_id_Jogo FROM comentarios WHERE id_Comentario='$pIdComentario'";
        $result_1 = mysqli_query($link, $query_1);

        //percorrimento das linhas retornadas pela query
        while (list($FK_Jogos_id_Jogo) = mysqli_fetch_row($result_1))
        {  
            $pIdJogo = $FK_Jogos_id_Jogo;
            if($link ->query($query) === TRUE)
            {
                /*echo "Inclusão feita com sucesso";*/
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
    }
?>