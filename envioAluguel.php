<?php
    //Chamado do cabeçalho Login da pagina 
    include 'setup/setupConfig.php';

    $pIdLivro = $_GET["idLivro"];
    
    if(empty($_POST["diasAluguel"]))
    {        
        echo "<script>
            alert('O com a quantidade de dias é obrigatorio para proceder.');
            window.history.back();
        </script>";
    }
    else
    { 
        $pIdUsuario = $_SESSION['idUser'];
        $pDias = $_POST["diasAluguel"];

        $query = "INSERT INTO aluguel (FK_Livro_idLivro, FK_Usuario_idUser, prazoAluguel) VALUES ('$pIdLivro', '$pIdUsuario', '$pDias')";
        
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