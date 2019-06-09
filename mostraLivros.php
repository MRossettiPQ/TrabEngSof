<html>
    <body bgcolor=#d8dfea>
        <?php
            //Chamado do configuração da pagina 
            include 'setup/setupConfig.php';

            $pIdUsuario = $_SESSION['idUser'];          //Disponibilizado pela sessão criada
            $pIdLivro = $_GET['idLivro'];               //Enviado pelo formulario da pagina mostraBiblioteca.php

            //QUERY INFORMAÇÕES LIVRO
            $query_1 = "SELECT nome_Jogo, dataLanca, players, descricao, tag, classificacao, FK_Usuario_id_Usuario, dataAddJogo, nomeEstudio FROM jogos WHERE id_Jogo = $pId";
            $result_1 = mysqli_query($link, $query_1);

            //QUERY INFORMAÇÕES COMENTARIOS
            $query_4 = "SELECT id_Comentario, comentario, nota, FK_Usuario_id_Usuario, dataComentario FROM comentarios WHERE FK_Jogos_id_Jogo='$pId'";
            $result_4 = mysqli_query($link, $query_4);

            $query_8 = "SELECT nota FROM comentarios WHERE FK_Jogos_id_Jogo='$pId'";
            $result_8 = mysqli_query($link, $query_8);

            //percorrimento das linhas retornadas pela query
            while (list($nome_Jogo, $dataLanca, $players, $descricao, $tag, $classificacao, $FK_Usuario_id_Usuario, $dataAddJogo, $nomeEstudio) = mysqli_fetch_row($result_1))
            {
                //CALCULA A MEDIA BASEADO NAS NOTAS
                if(empty($result_4) === FALSE)
                {
                    $soma = 0;
                    $cont = 0;
                    $media = 0;
                    while (list($nota) = mysqli_fetch_row($result_8))
                    {
                        $soma = $soma + $nota;
                        $cont = $cont + 1;
                    }
                    if($cont >= 1)
                    {
                        $media = $soma/$cont;
                    }
                }

                echo "
                <center>
                <table border='comentarios' bgcolor=#afbdd4>
                <tr>  
                    <td valign='center' style='width:1185px'>
                        <table border='cartaoJogo' bgcolor=#afbdd4>
                            <tr>
                                <td valign='top'>
                                    <img src='Imagens/Jogos/".$nome_Jogo.".jpg' alt='Capa' style='width:323px;height:476px;'>
                                </td>
                                <td valign='top' style='width:723px;height:476px;'>
                                    <table border='dadosJogo' bgcolor=#afbdd4>
                                        <tr>
                                            <td style='width:720px;height:50px;'>
                                            <center><b>".$nome_Jogo."</b></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign='top' style='width:720px;height:372px;'>
                                                <table border='dadosBasico' bgcolor=#afbdd4>
                                                    <tr>
                                                        <td valign='center' style='width:177.5px;height:65px;'>
                                                            <center><b>Estudio</center></b>
                                                        </td>
                                                        <td valign='center' style='width:177.5px;height:65px;'>
                                                                <center>".$nomeEstudio."</center>
                                                            </td>
                                                        <td valign='center' style='width:177.5px;height:65px;'>
                                                            <center><b>Lançamento</center></b>
                                                        </td>
                                                        <td valign='center' style='width:177.5px;height:65px;'>                    
                                                            <center>".$dataLanca."</center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign='center' style='width:177.5px;height:65px;'>
                                                            <center><b>Maximo Players</center></b>
                                                        </td>
                                                        <td valign='center' style='width:177.5px;height:65px;'>
                                                            <center>".$players."</center>
                                                        </td>
                                                        <td valign='center' style='width:177.5px;height:65px;'>
                                                            <center><b>Genero</center></b>
                                                        </td>
                                                        <td valign='center' style='width:177.5px;height:65px;'>                    
                                                            <center>".$tag."</center>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table border='dadosBasico' bgcolor=#afbdd4>
                                                    <tr>
                                                        <td valign='center' style='width:703px;height:35px;'>
                                                            <center><b>Descrição</center></b>
                                                        </td>
                                                        <tr>
                                                            <td valign='top' style='width:703px;height:241px;'>
                                                                <center>".$descricao."</center>
                                                            </td>
                                                        </tr>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='width:720px;height:35px;'>
                                                <table border='dadosSugerido' bgcolor=#afbdd4>
                                                    <tr>";
                                                        //QUERY INFORMAÇÕES USUARIO ADD JOGO
                                                        $query_2 = "SELECT usuario  FROM usuario WHERE id_Usuario = '$FK_Usuario_id_Usuario'";
                                                        $result_2 = mysqli_query($link, $query_2);
                                                        //QUERY INFORMAÇÕES EDIÇÃO JOGO
                                                        $query_6 = "SELECT FK_Usuario_id_Usuario, dataEditado  FROM editoujogo WHERE FK_Jogos_id_Jogo='$pId'";
                                                        $result_6 = mysqli_query($link, $query_6);

                                                        while (list($usuario) = mysqli_fetch_row($result_2))
                                                        {
                                                            echo "<td valign='center' style='width:177.5px;height:35px;'>
                                                                <center><b>Sugestão: ".$usuario."</center></b>
                                                            </td>";
                                                        }
                                                        echo "<td valign='center' style='width:177.5px;height:35px;'>
                                                            <center><b>Data adição:</b>".$dataAddJogo."</center>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td valign='top' style='width:123px;height:476px;'>
                                    <table border='lateralDireita' bgcolor=#afbdd4>
                                        <tr>
                                            <td style='width:120px;height:50px;'>
                                                <center>
                                                <b>NOTA</b>
                                                </center>
                                            </td>
                                        </tr>                            
                                        <tr>
                                            <td style='width:120px;height:100px;'>
                                                <input type='submit' style = 'width:118px; height:98px;' value='".$media."'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='width:120px;height:325px;'>

                                            </td>
                                        </tr>        
                                        <tr>
                                            <td style='width:120px;height:42px;'>
                                                <center><b>Indicado:</b>".$classificacao." anos<center>
                                            </td>
                                        </tr>          
                                    </table>
                                </td>
                            </tr>
                        </table>       
                    </td>
                </tr>
                <tr>
                    <td style='width:1185px;height:42px;'>
                        <center><b>COMENTAR</b><center> 
                    </td>
                </tr>
                <tr>
                   <form name='comentar' action='envioComentarioNovo.php?idJogo=".$pId."' method='post'>
                    <td style='width:1185px;height:62px;'>
                        <table border='comentarioNovo' bgcolor=#afbdd4>
                            <tr>
                                <td style='width:960px;height:62px;'>
                                    <input name='comentarioNovo' value= 'Diga oque pensa sobre este jogo e de sua nota'type='Text' align='center' style='width:960px;height:62px;' margin='0' >
                                </td>
                                <td style='width:70px;height:62px;'>
                                    <center>
                                    <b>NOTA</b>
                                    </center>
                                </td>
                                <td style='width:70px;height:62px;'>
                                    <input name='notaNova' value='0' type='number' align='center' style='width:70px;height:62px;'>
                                </td>";
                                if(($_SESSION['idProfiles'] == 3)||($_SESSION['idProfiles'] == 2)||($_SESSION['idProfiles'] == 1))
                                {
                                    echo "
                                    <td style='width:80px;height:62px;'>
                                    <input type='submit' value ='Comentar'align = 'center' margin='0' style='width:80px;height:62px;'>";
                                }
                                else
                                {
                                    echo "</form>
                                    <form name='comentar' action='mostraLogar.php' method='post'>
                                    <td style='width:80px;height:62px;'>
                                    
                                        <input type='submit' value ='Logar'align = 'center' margin='0' style='width:80px;height:62px;'>";
                                }
                                echo "</td>
                                </form>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style='width:1185px;height:42px;'>
                        <center><b>COMENTADOS</b><center> 
                    </td>
                </tr>
                <tr>
                    <td valign='top' style='width:1185px;height:600px;'>";
                    if(empty($result_4) === FALSE)
                    {
                        while (list($id_Comentario, $comentario, $nota, $FK_Usuario_id_Usuario, $dataComentario) = mysqli_fetch_row($result_4))
                        {
                            //QUERY INFORMAÇÕES ESTUDIO
                            $query_5 = "SELECT usuario  FROM usuario WHERE id_Usuario = '$FK_Usuario_id_Usuario'";
                            $result_5 = mysqli_query($link, $query_5);

                            while (list($usuario) = mysqli_fetch_row($result_5))
                            {
                                echo "<table border='comentarios' bgcolor=#afbdd4>
                                    <tr>
                                        <td style='width:180px;height:62px;'>
                                            <center>
                                            ".$usuario."
                                            </center>
                                        </td>
                                        <td style='width:880px;height:62px;'>
                                            <center>
                                            ".$comentario."
                                            </center>
                                        </td>
                                        <td style='width:70px;height:62px;'>
                                            <center>
                                            <b>".$nota."</b>
                                            </center>
                                        </td>";
                                        if($FK_Usuario_id_Usuario == $pIdUsuario)
                                        {
                                            echo "<form name='editar' action='mostraEditarComentario.php?idComentario=".$id_Comentario."&nomeJogo=".$nome_Jogo."' method='post' >
                                                <td style='width:78px;height:62px;'>   
                                                            <input type='submit' style = 'width:78px; height:62px;' value='editar'>
    
                                                </td>";
                                        }
                                        else
                                        {
                                        echo "
                                        <td style='width:80px;height:62px;'>   

                                        </td>";
                                        }
                                        echo "
                                        </form>
                                    </tr>
                                </table>";
                            }
                        }
                    }
                    echo "</td>
                </tr>
            </table>";
            }
            echo "<br>";
        ?>
    </body>
</html>