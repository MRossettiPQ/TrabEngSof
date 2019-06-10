<?php
    //Chamado do cabeçalho Login da pagina 
    include 'setup/setupConfig.php';

    $pIdComentario = $_GET["idComentario"];
    
    $query = "SELECT FK_Livro_idLivro FROM comenta WHERE idComenta = $pIdComentario";
    $result = mysqli_query($link, $query);

    //percorrimento das linhas retornadas pela query
    while (list($FK_Livro_idLivro) = mysqli_fetch_row($result))
    {  
        $pIdLivro = $FK_Livro_idLivro;
        $query = "DELETE FROM comenta WHERE idComenta = $pIdComentario";
        if($link ->query($query) === TRUE)
        {
        
        }
        else
        {
            echo "<br>"."Erro: ".$query."<br>".$link->error;
        }
        $link->close();            
        echo "<script>
            window.location.href = 'mostraLivro.php?idLivro=".$pIdLivro."';
        </script>";
    }
?>