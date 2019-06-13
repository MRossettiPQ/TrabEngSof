<?php
    //Chamado do cabeçalho da pagina
    include 'setup/setupConfig.php';

    $idLivro = $_GET["idLivro"];
    
    $query = "DELETE FROM livro WHERE id_Jogo = $idLivro";
    $query_1 = "DELETE FROM comenta WHERE FK_Livro_idLivro = $idLivro";

    if($link ->query($query) === TRUE)
    {
        if($link ->query($query_1) === TRUE)
        {
            
        }
        else
        {
            echo "<br>"."Erro: ".$query_1."<br>".$link->error;
        }
    }
    else
    {
        echo "<br>"."Erro: ".$query."<br>".$link->error;
    }
    $link->close();            
    echo "<script>
        window.history.back();
    </script>";
?>