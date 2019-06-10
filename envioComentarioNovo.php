<?php
    //Chamado do conexão da pagina
    include 'setup/setupConfig.php';

    if((empty($_POST["comentarioNovo"])) || (empty($_POST["notaNova"])))
    {        
        echo "<script>
            alert('Os campos comentario e nota são obrigatorios.');
            window.history.back();
        </script>";
    }
    else
    {
        $pIdUsuario = $_SESSION['idUser'];
        $pIdLivro = $_GET["idLivro"];
        $pComentario = $_POST["comentarioNovo"];
        $pNota = $_POST["notaNova"];
        $pData = date("Y-m-d");
        
        $query = "INSERT INTO comenta (FK_Usuario_idUser, FK_Livro_idLivro, contComenta, notaComenta, dataComenta) VALUES ('$pIdUsuario', '$pIdLivro', '$pComentario', '$pNota','$pData')";
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
            window.history.back();
        </script>";
    }
?>