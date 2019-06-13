<?php
    //Chamado do configuração da pagina 
    include 'setup/setupConfig.php';

    if((empty($_POST['classLivro'])) || (empty($_POST['autorLivro'])) || (empty($_POST['nomeLivro'])) || empty($_POST['editoraLivro']) || (empty($_POST['dataLivro'])) || (empty($_POST['localLivro'])) || (empty($_POST['tagLivro']))|| (empty($_POST['descLivro']))|| (empty($_POST['custoLivro'])))
    {        
        echo "<script>
        alert('Todos os campos são obrigatorios.');
            window.history.back();
        </script>";
    }
    else
    {
        $pIdUsuario = $_SESSION['idUser'];

        $pAutorLivro = $_POST['autorLivro'];
        $pNomeLivro = $_POST['nomeLivro'];
        $pEditoraLivro = $_POST['editoraLivro'];
        $pDataLivro = $_POST['dataLivro'];
        $pLocalLivro = $_POST['localLivro'];
        $pTagLivro = $_POST['tagLivro'];
        $pDescLivro = $_POST['descLivro'];
        $pClassLivro = $_POST['classLivro'];
        $pCustoLivro = $_POST['custoLivro'];

        // verifica se foi enviado um arquivo
        if (isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) 
        {
            $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
            $nome = $_FILES[ 'arquivo' ][ 'name' ];

            $arquivoEpub_tmp = $_FILES[ 'arquivoEpub' ][ 'tmp_name' ];
            $nomeEpub = $_FILES[ 'arquivoEpub' ][ 'name' ];
        
            // Pega a extensão
            $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
            $extensaoEpub = pathinfo ( $nomeEpub, PATHINFO_EXTENSION );
        
            // Converte a extensão para minúsculo
            $extensao = strtolower ( $extensao );
            $extensaoEpub = strtolower ( $extensaoEpub );
        
            // Somente imagens, .jpg;.jpeg;.gif;.png
            // Aqui eu enfileiro as extensões permitidas e separo por ';'
            // Isso serve apenas para eu poder pesquisar dentro desta String
            if ( strstr ( '.jpg', $extensao ) ) 
            {
                // Cria um nome único para esta imagem
                // Evita que duplique as imagens no servidor.
                // Evita nomes com acentos, espaços e caracteres não alfanuméricos
                $novoNome = $pNomeLivro.".".$extensao;
                $novoNomePub = $pNomeLivro.".".$extensaoEpub;

                // Concatena a pasta com o nome
                $destino = 'idVisual/Livros/'.$novoNome;
                $destinoPub = 'Base/'.$novoNome;
        
                // tenta mover o arquivo para o destino
                if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) 
                {
                    $query2 = "INSERT INTO livro (nomeLivro, lancLivro, descLivro, localLivro, classLivro, editoraLivro, generoLivro, custoLivro, autorLivro)
                    VALUES ($pNomeLivro, $pDataLivro, $pDescLivro, $pLocalLivro, $pClassLivro, $pEditoraLivro, $pTagLivro, $pCustoLivro, $pAutorLivro)";


                    if($link->query($query2) === TRUE)
                    {
                    }
                    else
                    {
                        echo "<br>"."Erro: ".$query2."<br>".$link->error;
                    }
                    $link->close();
                    /*echo "<script>
                        window.history.back();
                    </script>";

                    
                    if ( strstr ( '.epub', $extensaoEpub ) ) 
                    {                
                        if ( @move_uploaded_file ( $arquivoEpub_tmp, $destinoPub ) ) 
                        {

                        }
                    }
                    else
                    {
                        echo "<script>
                        alert('Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita!');
                            window.history.back();
                        </script>";
                    }
                    */
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