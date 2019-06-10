<?php
    //Chamado do configuração da pagina 
    include 'setup/setupConfig.php';

    if((empty($_POST['nomeJogo'])) || empty($_POST['jogoEstudio']) || (empty($_POST['jogoLancado'])) || (empty($_POST['jogoPlayers'])) || (empty($_POST['jogoTag']))|| (empty($_POST['jogoDesc']))|| (empty($_POST['jogoClass'])))
    {        
        echo "<script>
        alert('Todos os campos são obrigatorios.');
            window.history.back();
        </script>";
    }
    else
    {
        $pIdUsuario = $_SESSION['idUser'];

        $pNomeLivro = $_POST['nomeLivro'];
        $pEditoraLivro = $_POST['editoraLivro'];
        $pDataLivro = $_POST['dataLivro'];
        $pLocalLivro = $_POST['localLivro'];
        $pTagLivro = $_POST['tagLivro'];
        $pDescLivro = $_POST['descLivro'];
        $pClassLivro = $_POST['classLivro'];

        // verifica se foi enviado um arquivo
        if (isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) 
        {
            $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
            $nome = $_FILES[ 'arquivo' ][ 'name' ];
        
            // Pega a extensão
            $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        
            // Converte a extensão para minúsculo
            $extensao = strtolower ( $extensao );
        
            // Somente imagens, .jpg;.jpeg;.gif;.png
            // Aqui eu enfileiro as extensões permitidas e separo por ';'
            // Isso serve apenas para eu poder pesquisar dentro desta String
            if ( strstr ( '.jpg', $extensao ) ) {
                // Cria um nome único para esta imagem
                // Evita que duplique as imagens no servidor.
                // Evita nomes com acentos, espaços e caracteres não alfanuméricos
                $novoNome = $pNomeLivro.".".$extensao;
        
                // Concatena a pasta com o nome
                $destino = 'idVisual/Livros/'.$novoNome;
        
                // tenta mover o arquivo para o destino
                if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) 
                {
                    $query2 = "INSERT INTO livro 
                            (nomeLivro, lancLivro, contLivro, descLivro, localLivro, classLivro, editoraLivro, generoLivro)
                     VALUES ($pNomeLivro, $pDataLivro, NULL, $pDescLivro, $pLocalLivro, $pClassLivro, $pEditoraLivro, $pTagLivro)";


                    if($link->query($query2) === TRUE)
                    {
                    }
                    else
                    {
                        echo "<br>"."Erro: ".$query2."<br>".$link->error;
                    }
                    $link->close();
                    echo "<script>
                        window.history.back();
                    </script>";
                }
                else
                echo "<script>
                alert('Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita!');
                    window.history.back();
                </script>";
            }
            else            
                echo "<script>
                alert('Você poderá enviar apenas arquivos *.jpg;!');
                    window.history.back();
                </script>";
            }
        else
        {
            echo "<script>
            alert('Você não enviou nenhum arquivo!');
                window.history.back();
            </script>";
        }
    }
?>