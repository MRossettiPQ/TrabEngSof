<?php
    //Chamado do configuração da pagina 
    include 'setup/setupConfig.php';

    if((empty($_POST['autorLivro'])) || (empty($_POST['nomeJogo'])) || empty($_POST['jogoEstudio']) || (empty($_POST['jogoLancado'])) || (empty($_POST['jogoPlayers'])) || (empty($_POST['jogoTag']))|| (empty($_POST['jogoDesc']))|| (empty($_POST['jogoClass'])))
    {        
        echo "<script>
        alert('Todos os campos são obrigatorios.');
            window.history.back();
        </script>";
    }
    else
    {
        $pIdUsuario = $_SESSION['idUser'];
        $idLivro = $_GET['idLivro'];
        $pAutorLivro = $_POST['autorLivro'];
        $pNomeLivro = $_POST['nomeLivro'];
        $pEditoraLivro = $_POST['editoraLivro'];
        $pDataLivro = $_POST['dataLivro'];
        $pLocalLivro = $_POST['localLivro'];
        $pTagLivro = $_POST['tagLivro'];
        $pDescLivro = $_POST['descLivro'];
        $pClassLivro = $_POST['classLivro'];
        $pCustoLivro = $_POST['custoLivro'];

        $query_1 = "UPDATE livro SET (nomeLivro=$pNomeLivro, lancLivro= $pDataLivro, descLivro=$pDescLivro, localLivro=$pLocalLivro, classLivro=$pClassLivro, editoraLivro=$pEditoraLivro , generoLivro=$pTagLivro, custoLivro=$pCustoLivro, autorLivro=$pAutorLivro) WHERE idLivro=$idLivro";

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
            window.location.href = 'mostraPrincipal.php';
        </script>";
    }
?>