<?php
    //Chamado do cabeçalho Login da pagina 
    include 'setup/setupConfig.php';

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

        $query_1 = "UPDATE comenta SET contComenta='$pComentario',notaComenta='$pNota' WHERE idComenta=$pIdComentario";
        
        //QUERY INFORMAÇÕES COMENTARIO
        $query_2 = "SELECT FK_Livro_idLivro FROM comenta WHERE idComenta='$pIdComentario'";
        $result_2 = mysqli_query($link, $query_2);

        //percorrimento das linhas retornadas pela query
        while (list($FK_Livro_idLivro) = mysqli_fetch_row($result_2))
        {  
            $pIdLivro = $FK_Livro_idLivro;
            if($link ->query($query_1) === TRUE)
            {
                /*echo "Inclusão feita com sucesso";*/
            }
            else
            {
                echo "<br>"."Erro: ".$query_1."<br>".$link->error;
            }
            $link->close();        
            echo "<script>
                window.location.href = 'mostraLivro.php?idLivro=".$pIdLivro."';
            </script>";
        }
    }
?>