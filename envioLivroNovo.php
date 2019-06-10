<?php
    //Chamado do conexão da pagina
    include 'setupSESSION.php';
    include 'setupConectaBanco.php';

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
        $pNomeJogo = $_POST['nomeJogo'];
        $pJogoLancado = $_POST['jogoLancado'];
        $pJogoPlayers = $_POST['jogoPlayers'];
        $pJogoTag = $_POST['jogoTag'];
        $pJogoDesc = $_POST['jogoDesc'];
        $pJogoClass = $_POST['jogoClass'];
        $pIdEstudio = $_POST['jogoEstudio'];
        $data = date("Y-m-d");

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
                $novoNome = $pNomeJogo.".".$extensao;
        
                // Concatena a pasta com o nome
                $destino = 'idVisual/Livros/'.$novoNome;
        
                // tenta mover o arquivo para o destino
                if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) 
                {
                    $query2 = "INSERT INTO jogos 
                            (nome_Jogo, dataLanca, players, descricao, tag, classificacao, FK_Usuario_id_Usuario, dataAddJogo, codLibera, nomeEstudio)
                     VALUES ('$pNomeJogo','$pJogoLancado','$pJogoPlayers','$pJogoDesc','$pJogoTag','$pJogoClass','$pIdUsuario','$data', '0', '$pIdEstudio')";
                    
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